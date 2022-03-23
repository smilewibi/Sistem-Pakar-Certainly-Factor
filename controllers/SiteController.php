<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Aturan;
use app\models\Gejala;
use app\models\Diagnosa;
use app\models\HasilKonsultasi;
//use app\models\HasilKonsultasuSearch;
use app\models\Konsultasi;
use yii\data\Pagination;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'],
                'rules' => [
                    [
                        //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
/*
    public function actionMulai($id)
    {
        $idaturan=Aturan::find()->orderBy('id_aturan')->one()->id_aturan;
		if($idaturan){
			return $this->redirect(['aturan/vuser', 'id' => $idaturan]);
		}
    }
*/
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $countgejala = Gejala::find()->count();
        $countdiagnosa = Diagnosa::find()->count();
        $counthasil = HasilKonsultasi::find()->count();
        $countkonsultasi = Konsultasi::find()->count();
        return $this->render('index',[
            'countgejala'=>$countgejala,
            'countdiagnosa'=>$countdiagnosa,
            'counthasil'=>$counthasil,
            'countkonsultasi'=>$countkonsultasi,
        ]);
    }

     /**
     * Displays konsultasi.
     *
     * @return string
     */

    public function actionKonsultasi()
    {
        $this->layout='main2';
        $model = new \app\models\Konsultasi();

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal=date('Y-m-d H:i:s');
            $model->id_user=1;
            $model->kkode_diagnosa=Null;
			$model->hasil_cf=Null;
            if($model->save()){
				if(Yii::$app->session['id_konsultasi']){
					unset(Yii::$app->session['id_konsultasi']);
				}
				Yii::$app->session['id_konsultasi'] = $model->id_konsultasi;
				return $this->redirect(['riwayat', 'id' => $model->id_konsultasi, 'page'=>"1"]);
			}
        }

        return $this->render('konsultasi', [
            'model' => $model,
        ]);
    }

    /**
     * Displays Riwayat.
     *
     * @return string
     */

    public function actionRiwayat()
    {
        $this->layout='main2';
        $model = new \app\models\HasilKonsultasi();
        $id = $_GET['id'];
        $hal=$_GET['page'];
        $db = Yii::$app->db;

        $query = Konsultasi::find()
                ->select(['id_konsultasi', 'nama_penderita', 'jenkel', 'usia_penderita', 'alamat_penderita'])
                ->where(['id_konsultasi'=>$id]);
        $data = $query->orderBy('id_konsultasi')->all();

        $gejala = Gejala::find();
        $countgejala = Gejala::find()->count();
        $pages = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => $gejala->count()
        ]);
        $tampilgejala = $gejala->orderBy('kode_gejala')
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $query2 = $db->createCommand("SELECT * FROM hasil_konsultasi, gejala
                                    WHERE hasil_konsultasi.hid_konsultasi=".$id."
                                    AND hasil_konsultasi.jawaban='1'
                                    AND hasil_konsultasi.hkode_gejala=gejala.kode_gejala
                                    ORDER BY hasil_konsultasi.id_hasil_konsultasi")->queryAll();
        $query3 = $db->createCommand("SELECT * FROM hasil_konsultasi, gejala
                                    WHERE hasil_konsultasi.hid_konsultasi=".$id."
                                    AND hasil_konsultasi.jawaban='0'
                                    AND hasil_konsultasi.hkode_gejala=gejala.kode_gejala
                                    ORDER BY hasil_konsultasi.id_hasil_konsultasi")->queryAll();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['riwayat','id'=>$id,'page'=>$hal+1 ]);
        }

        return $this->render('riwayat', [
            'model' => $model,
            'data' => $data,
            'countgejala' => $countgejala,
            'pages' => $pages,
            'tampilgejala' => $tampilgejala,
            'query2'=> $query2,
            'query3'=> $query3,
            'id'=>$id,
        ]);
    }

    /**
     * Displays Hasilkonsultasi page.
     *
     * @return string
     */
    public function actionHasilkonsultasi()
    {
        $this->layout='main2';
        $id = $_GET['id'];
        $db = Yii::$app->db;
        $query = Konsultasi::find()
                ->select(['id_konsultasi', 'nama_penderita', 'jenkel', 'usia_penderita', 'alamat_penderita'])
                ->where(['id_konsultasi'=>$id]);
        $data = $query->orderBy('id_konsultasi')->all();
        $queryMB = $db->createCommand("SELECT id_hasil_konsultasi, hkode_gejala, kode_gejala, nama_gejala,   jawaban, evidence, kode_diagnosa, nama_diagnosa, solusi
        FROM hasil_konsultasi
        join gejala on hkode_gejala = kode_gejala
        join pakar on kode_gejala = pkode_gejala
        join diagnosa on kode_diagnosa = pkode_diagnosa
        WHERE hasil_konsultasi.hid_konsultasi=$id and jawaban = 1  
        ORDER BY `hasil_konsultasi`.`hkode_gejala` ASC")->queryAll();
        $queryDB = $db->createCommand("SELECT id_hasil_konsultasi, hkode_gejala, kode_gejala, nama_gejala,   jawaban, evidence, kode_diagnosa, nama_diagnosa, solusi
        FROM hasil_konsultasi
        join gejala on hkode_gejala = kode_gejala
        join pakar on kode_gejala = pkode_gejala
        join diagnosa on kode_diagnosa = pkode_diagnosa
        WHERE hasil_konsultasi.hid_konsultasi=$id and jawaban = 0  
        ORDER BY `hasil_konsultasi`.`hkode_gejala` ASC")->queryAll();
        $query3 = $db->createCommand("SELECT kode_gejala,nama_gejala,jawaban, evidence FROM `hasil_konsultasi` 
        join gejala on hkode_gejala = kode_gejala
        join pakar on pkode_gejala = kode_gejala
        where hid_konsultasi = $id
        group by pkode_gejala")->queryAll();

                                    

        return $this->render('hasilkonsultasi',[
            'data' => $data,
            'queryMB'=>$queryMB,
            'queryDB'=>$queryDB,
            'query3'=>$query3,
            'id'=>$id,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout='main2';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionTentangkami()
{
    $this->layout = 'main2';
    return $this->render('tentangkami');
}
}
 

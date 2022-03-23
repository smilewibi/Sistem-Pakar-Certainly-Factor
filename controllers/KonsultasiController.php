<?php

namespace app\controllers;

use Yii;
use app\models\HasilKonsultasi;
use app\models\Konsultasi;
use app\models\KonsultasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use app\models\Aturan;
use app\models\Gejala;
use app\models\Diagnosa;
use app\models\Pakar;
use yii\data\Pagination;

/**
 * KonsultasiController implements the CRUD actions for Konsultasi model.
 */
class KonsultasiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Konsultasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KonsultasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Konsultasi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Konsultasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Konsultasi();

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal=date('Y-m-d H:i:s');
            $model->id_user=Yii::$app->user->id;
            $model->kkode_diagnosa=Null;
			$model->hasil_cf=Null;
            if($model->save()){
				if(Yii::$app->session['id_konsultasi']){
					unset(Yii::$app->session['id_konsultasi']);
				}
				Yii::$app->session['id_konsultasi'] = $model->id_konsultasi;
				return $this->redirect(['konsultasi', 'id' => $model->id_konsultasi,'page'=>1]);
			}
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Konsultasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Konsultasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

        /**
     * Deletes an existing Konsultasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete2($del)
    {
        $id=$_GET['id'];
        $hal=$_GET['page'];
        //$q1=Konsultasi::findOne($id);
        $query=HasilKonsultasi::findOne($del);
        $query->delete();

        return $this->redirect(['konsultasi','id'=>$id,'page'=>$hal ]);
    }

    /**
     * Displays konsultasi.
     *
     * @return string
     */
    public function actionKonsultasi($id)
    {
        $model = $this->findModel($id);
        $model1 = new \app\models\HasilKonsultasi();
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
        if ($model1->load(Yii::$app->request->post()) && $model1->save()) {
            return $this->redirect(['konsultasi','id'=>$id,'page'=>$hal+1 ]);
        }

        return $this->render('konsultasi', [
            'model' => $model,
            'model1' => $model1,
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
        $id = $_GET['id'];
        $db = Yii::$app->db;
        $query = Konsultasi::find()
                ->select(['id_konsultasi', 'nama_penderita', 'jenkel', 'usia_penderita', 'alamat_penderita'])
                ->where(['id_konsultasi'=>$id]);
        $data = $query->orderBy('id_konsultasi')->all();
        $diagnosa = Diagnosa::find()->all();
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
            'id'=>$id,
            'diagnosa'=>$diagnosa,
            'query3'=>$query3,
            //'pakar'=>$pakar,
            //'result'=>$result,
        ]);
    }

    /**
     * Finds the Konsultasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Konsultasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Konsultasi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

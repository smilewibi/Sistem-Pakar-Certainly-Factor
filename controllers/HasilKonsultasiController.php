<?php

namespace app\controllers;

use Yii;
use app\models\HasilKonsultasi;
use app\models\HasilKonsultasuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HasilKonsultasiController implements the CRUD actions for HasilKonsultasi model.
 */
class HasilKonsultasiController extends Controller
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
     * Lists all HasilKonsultasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new HasilKonsultasuSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $db = Yii::$app->db;
        // $query = Konsultasi::find()
        //         ->select(['id_konsultasi', 'nama_penderita', 'jenkel', 'usia_penderita', 'alamat_penderita'])
        //         ->where(['id_konsultasi'=>$id]);
        // $data = $query->orderBy('id_konsultasi')->all();
        $dataProvider = $db->createCommand("SELECT id_hasil_konsultasi, nama_penderita, jenkel, usia_penderita, nama_diagnosa FROM `hasil_konsultasi`
        join konsultasi on hid_konsultasi = id_konsultasi
        join pakar on pkode_gejala = hkode_gejala
        join diagnosa on kode_diagnosa = pkode_diagnosa
        group by id_hasil_konsultasi")->queryAll();
        // var_dump($dataProvider);
        // return;
        return $this->render('index', [
            // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

        /**
     * Displays a single HasilKonsultasi model.
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
     * Creates a new HasilKonsultasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HasilKonsultasi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_hasil_konsultasi]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing HasilKonsultasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_hasil_konsultasi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing HasilKonsultasi model.
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
     * Finds the HasilKonsultasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HasilKonsultasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HasilKonsultasi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

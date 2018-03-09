<?php

namespace app\controllers;

use app\models\HotelsSearchForm;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\Response;
use app\components\OffersService;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel    = new HotelsSearchForm();
        $instance       =  OffersService::getInstance();
        $params         =[];



        if($searchModel->load(Yii::$app->request->get())){
            $params = $searchModel->attributes;
        }
        $hotels       = $instance->GetOffers($params);
        $dataProvider = new ArrayDataProvider([
            'models' => $hotels,
            'totalCount' => count($hotels),
            'pagination' => [
                'pageSize' => count($hotels),
                'totalCount' => count($hotels),
                'forcePageParam' => true,
            ]
        ]);

        return $this->render('index',['searchModel'=>$searchModel,'dataProvider'=>$dataProvider]);
    }

}

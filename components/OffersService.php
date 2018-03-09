<?php
namespace app\components;

use linslin\yii2\curl;
use yii\helpers\Json;

class OffersService{
    private static $_instance = null;

    /* Required API GET Params*/
    protected $requiredApiParams =[
        'scenario'      => 'deal-finder',
        'page'          => 'foo',
        'uid'           => 'foo',
        'productType'   => 'Hotel'
    ];

    private function __construct(){

    }
    private function __clone(){

    }
    public static function getInstance(){
        if (self::$_instance == null) {
            self::$_instance = new OffersService();
        }
        return self::$_instance;
    }

    public function GetOffers($params = []){
        $curl       = new curl\Curl();
        $params     = array_merge($params,$this->requiredApiParams);
        $response   = $curl->setGetParams($params)->get(\Yii::$app->params['OFFERS_API_URL']);

        if ($curl->errorCode === null) {
            return Json::decode($response,true);
        } else {
            throw new Exception('Error in CURL');
        }

    }

}
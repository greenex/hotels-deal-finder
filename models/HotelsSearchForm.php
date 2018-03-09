<?php

namespace app\models;

use app\components\OffersService;
use Yii;
use yii\base\Model;

class HotelsSearchForm extends Model
{
    public $destinationName;

    public $minTripStartDate;
    public $maxTripStartDate;

    public $lengthOfStay;

    public $minStarRating   ;
    public $maxStarRating   ;

    public $minTotalRate   ;
    public $maxTotalRate    ;

    public $minGuestRating  ;
    public $maxGuestRating  ;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['destinationName', 'string'],
            [['minTripStartDate','maxTripStartDate'],'date','format' => 'yyyy-MM-dd'],
            //['minTripStartDate', 'compare', 'compareAttribute' => 'maxTripStartDate', 'operator' => '<='],
            [['lengthOfStay'],'integer' ,'min' => 1],
            [['minStarRating','maxStarRating'],'integer' ,'min' => 0],
            [['minTotalRate','maxTotalRate'],'integer' ,'min' => 0],
            [['minGuestRating','maxGuestRating'],'integer' ,'min' => 0],
        ];
    }

    public function attributeLabels(){
        return [
            'destinationName'=> 'Destination Name',
            'minTripStartDate'=> 'Check In Date',
            'maxTripStartDate'=> 'Check Out Date',
        ];
    }

    public function search(){
        $service = OffersService::getInstance();
        return $service->GetOffers($this->attributes);
    }


}

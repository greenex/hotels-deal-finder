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

    public $lengthOfStay = 1;

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
            [['destinationName','minTripStartDate','lengthOfStay'], 'required'],
            ['destinationName', 'string'],
            [['minTripStartDate','maxTripStartDate'],'date','format' => 'yyyy-MM-dd','min'=>date('Y-m-d')],
            [['minTripStartDate','maxTripStartDate'],'validatePastDates'],
            ['maxTripStartDate', 'yii\validators\CompareValidator', 'compareAttribute' => 'minTripStartDate', 'operator' => '>=' ],
            ['minTripStartDate', 'yii\validators\CompareValidator', 'compareAttribute' => 'maxTripStartDate', 'operator' => '<=', ],
            [['lengthOfStay'],'integer' ,'min' => 1],
            [['minStarRating','maxStarRating'],'integer' ,'min' => 0],
            [['minTotalRate','maxTotalRate'],'integer' ,'min' => 0],
            [['minGuestRating','maxGuestRating'],'integer' ,'min' => 0],
        ];
    }

    public function validatePastDates($attribute){
        if (strtotime($this->$attribute) < strtotime(date('Y-m-d 00:00:00')) ) {
            $this->addError($attribute, 'The date should be today to in future');
        }
    }
    public function attributeLabels(){
        return [
            'destinationName'=> 'Destination Name',
            'minTripStartDate'=> 'Min Check In Date',
            'maxTripStartDate'=> 'max Check In Date',
        ];
    }

    public function search(){
        $service = OffersService::getInstance();
        return $service->GetOffers($this->attributes);
    }


}

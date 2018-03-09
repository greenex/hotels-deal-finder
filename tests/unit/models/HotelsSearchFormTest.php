<?php

namespace tests\models;

use app\models\HotelsSearchForm;

class HotelsSearchFormTest extends \Codeception\Test\Unit
{
    public function testDateValidation(){
        $form  = new HotelsSearchForm();
        $form->minTripStartDate =date('Y-m-d',strtotime('+1 day'));
        $form->maxTripStartDate = date('Y-m-d');
        $form->destinationName = 'bla bla bla';

        expect_not($form->validate());

    }

    public function testPastDates(){
        $form  = new HotelsSearchForm();
        $form->minTripStartDate =date('Y-m-d',strtotime('-1 day'));
        $form->maxTripStartDate = date('Y-m-d');
        $form->destinationName = 'bla bla bla';
        expect_not($form->validate());

    }

    public function testEmptyDestination(){
        $form  = new HotelsSearchForm();
        expect_not($form->validate(['destinationName']));
    }

    public function testNonNumericlengthOfStay(){
        $form  = new HotelsSearchForm();
        $form->lengthOfStay = 'asdsad';
        expect_not($form->validate(['lengthOfStay']));
    }


}

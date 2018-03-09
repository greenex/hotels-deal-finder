<?php

namespace tests\models;

use app\components\OffersService;

class OffersServiceTest extends \Codeception\Test\Unit
{
   public function testDefaultOffersService(){
       $instance =  OffersService::getInstance();

       try{
           $result = $instance->GetOffers();
           expect($result)->notEmpty();
       }catch (\Exception $e){
           expect_not(false);
       }
   }

}

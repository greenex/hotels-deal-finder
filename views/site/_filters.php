<?php
use yii\bootstrap\ActiveForm;
use PetraBarus\Yii2\GooglePlacesAutoComplete\GooglePlacesAutoComplete;
use yii\jui\SliderInput;
?>

<div class="container form">
    <?php $form = ActiveForm::begin([
        'method'                    => 'get',
        'enableAjaxValidation'      => false,
        'enableClientValidation'    => true
    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?=  $form->field($searchModel, 'destinationName')->widget(GooglePlacesAutoComplete::className())->textInput(); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($searchModel, 'minTripStartDate')->widget(\yii\jui\DatePicker::className(), [
                'clientOptions' => [
                    'defaultDate' => date('Y-m-d'),
                    'minDate' => date('Y-m-d'),
                    'maxDate' => date('Y-m-d', strtotime('+1 year')),
                ],
                'dateFormat' => 'yyyy-MM-dd'
            ])->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($searchModel, 'maxTripStartDate')->widget(\yii\jui\DatePicker::className(), [
                'clientOptions' => [
                    'defaultDate' => date('Y-m-d',time()+3*24*60*60),
                    'minDate' => date('Y-m-d'),
                    'maxDate' => date('Y-m-d', strtotime('+1 year')),
                ],
                'dateFormat' => 'yyyy-MM-dd'
            ])->textInput() ?>
        </div>
        <div class="col-md-3">
            <?=  $form->field($searchModel, 'lengthOfStay')->textInput(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($searchModel, 'minStarRating')->hiddenInput()->label(false);?>
            <?= $form->field($searchModel, 'maxStarRating')->hiddenInput()->label(false);?>
            <label>min/max Star Rating</label>
            <?=  SliderInput::widget([
                'name' => 'star-rating',
                'clientOptions' => [
                    'min' => 0,
                    'max' => 5,
                    'values'=>[$searchModel->minStarRating,$searchModel->maxStarRating],
                    'tooltip'=>'always',
                    'step'=>1,
                    'range'=>true,
                    'slide'=> new yii\web\JsExpression("function( event, ui ) {
                        $('#hotelssearchform-minstarrating' ).val( ui.values[ 0 ]);
                        $('#hotelssearchform-maxstarrating' ).val( ui.values[ 1 ]);
                    }"),
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($searchModel, 'minTotalRate')->hiddenInput()->label(false);?>
            <?= $form->field($searchModel, 'maxTotalRate')->hiddenInput()->label(false);?>
            <label>min/max Total Rating</label>
            <?=  SliderInput::widget([
                'name' => 'total-rating',
                'clientOptions' => [
                    'min' => 0,
                    'max' => 5,
                    'values'=>[$searchModel->minTotalRate,$searchModel->maxTotalRate],
                    'tooltip'=>'always',
                    'step'=>1,
                    'range'=>true,
                    'slide'=> new yii\web\JsExpression("function( event, ui ) {
                        $('#hotelssearchform-mintotalrate' ).val( ui.values[ 0 ]);
                        $('#hotelssearchform-maxtotalrate' ).val( ui.values[ 1 ]);
                    }"),
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($searchModel, 'minGuestRating')->hiddenInput()->label(false);?>
            <?= $form->field($searchModel, 'maxGuestRating')->hiddenInput()->label(false);?>
            <label>min/max Client Rating</label>
            <?=  SliderInput::widget([
                'name' => 'client-rating',
                'clientOptions' => [
                    'min' => 0,
                    'max' => 5,
                    'values'=>[$searchModel->minGuestRating,$searchModel->maxGuestRating],
                    'tooltip'=>'always',
                    'step'=>1,
                    'range'=>true,
                    'slide'=> new yii\web\JsExpression("function( event, ui ) {
                        $('#hotelssearchform-minguestrating' ).val( ui.values[ 0 ]);
                        $('#hotelssearchform-maxguestrating' ).val( ui.values[ 1 ]);
                    }"),
                ],
            ]); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group align-center">
            <?= \yii\bootstrap\Html::submitButton('Search', ['class' => 'btn btn-lg btn-default']) ?>
        </div>
    </div>




    <?php ActiveForm::end(); ?>
</div>
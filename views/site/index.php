<?php

/* @var $this yii\web\View */

$this->title = 'Expedia - Deals Finder';
?>
<div class="site-index">
    <?=$this->render('_filters',['searchModel'=>$searchModel])?>


    <?= \yii\widgets\ListView::widget(
            [
                'dataProvider' => $dataProvider,
                'itemView'     =>  '_hotelItem',
            ])
    ?>


</div>

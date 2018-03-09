<?php use kartik\rating\StarRating; ?>
<a href="<?= urldecode($model['hotelUrls']['hotelInfositeUrl'] )?>" target="_blank">
    <div class="row item-box" >
        <div class="col-md-2">
            <?= \yii\helpers\Html::img($model['hotelInfo']['hotelImageUrl']) ?>
        </div>

        <div class="col-md-7">
            <h3><?= $model['hotelInfo']['hotelName'] ?></h3>
            <?php
            echo StarRating::widget(['name' => 'rating_'.$model['hotelInfo']['hotelId'],
                'value' => $model['hotelInfo']['hotelStarRating'],
                'pluginOptions' => [
                    'size' => 'l',
                    'stars' => 5,
                    'readonly' => true,
                    'showClear' => false,
                    'showCaption' => false,
                ]
            ]);
            ?>
            <br>
            <a href="http://maps.google.com/maps?q=<?= $model['hotelInfo']['hotelLatitude'] .','.$model['hotelInfo']['hotelLongitude']?>" target="_blank">
                <?= $model['hotelInfo']['hotelLongDestination'] ?><br>
                <?= $model['hotelInfo']['hotelStreetAddress'] ?>
            </a>


        </div>

        <div class="col-md-3 pricing">
            <div class="row">
                <div class="col-md-5 original"><h3><?= $model['hotelPricingInfo']['originalPricePerNight'] ?> </h3></div>
                <div class="col-md-7" ><h3 style="float: right;"><?= $model['hotelPricingInfo']['averagePriceValue'] ?> <?= $model['hotelPricingInfo']['currency'] ?></h3></div>
            </div>
            <div class="col-md-5 " style="float: right;"><h5>avg/night </h5></div>

            <div class="row">
                <div class="col-md-12"><h4  style="float: right;"><?= $model['hotelPricingInfo']['totalPriceValue'] ?> <?= $model['hotelPricingInfo']['currency'] ?></h4></div>
            </div>
            <div class="col-md-5 " style="float: right;"><h5>Total Price </h5></div>
        </div>
    </div>
</a>
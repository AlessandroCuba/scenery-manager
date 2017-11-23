<?php
use yii2mod\rating\StarRating;
use yii\helpers\ArrayHelper;
use yeesoft\helpers\FA;
use kartik\helpers\Html;
use yii\helpers\StringHelper;

use backend\modules\scenery\models\Scenery;
?>

<div class="col-md-3">
    <div class="single-product">
        <figure>
            <?php 
            $imageId = join(', ', ArrayHelper::map($model->attachment, 'id', 'id'));
            if(!empty($imageId)){
                $imagesUrl = Yii::getAlias('@images').DIRECTORY_SEPARATOR.Scenery::getSubDirs($imageId); 
            }else {
                $imagesUrl = Yii::getAlias('@images').DIRECTORY_SEPARATOR.'noimage'.DIRECTORY_SEPARATOR.'no_image.png';
            }

            echo Html::img($imagesUrl, [
                    'class' => 'img-responsive img-rounded',
                    'title' => $model['icao'],
                    'style' => 'border: 1px solid #'.$model->simulator->color,
            ]);?>
            <div class="rating">
                <?= StarRating::widget([
                    'name' => 'ranking',
                    'value' => $model->ranking,
                    'clientOptions' => [
                        'displayOnly' => true, 
                        'readOnly' => true,
                        'class' => 'rating',
                    ]
                ]) ?>
                <p><?= $model->simulator->catsimulator ?></p>
            </div>
            <figcaption>
                <div class="view">
                    <?= Html::a(FA::icon('eye').'View', ['scenery/view/'.$model->id]) ?>
                </div>
            </figcaption>
        </figure>
        <div class="sub-detail">
            <h6><?= Html::badge($model->icao)?></h6>
            <h6><?= FA::icon('globe').' '.StringHelper::truncateWords($model->airport->Name, ['asHtml' => true]) ?></h6>
            <h6><?= FA::icon('user').' '.$model->creator?></h6>
        </div>
    </div>
</div>
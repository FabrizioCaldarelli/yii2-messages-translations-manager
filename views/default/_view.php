<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

$attributes = [
    'id',
    'category',
    'message:ntext',
];

foreach($languages as $l)
{
    $attributes[] = [
        'label' => ('Lang '.$l),
        'value' => ArrayHelper::getValue($model->languages, $l)
    ];
}

?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$attributes = [
    'id',
    'category',
    'message:ntext',
];

foreach($languages as $l)
{
    $attributes[] = [
        'label' => ('Lang '.$l),
        'value' => $model->languages[$l]
    ];
}

?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>


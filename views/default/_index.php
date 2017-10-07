<?php

use yii\helpers\Html;
use yii\grid\GridView;

$columns = [
    //['class' => 'yii\grid\SerialColumn'],

    'id',
    'category',
    'message:ntext',

];

foreach($languages as $l)
{
    $columns[] = sprintf('lang_%s', $l);
}

$columns[] = ['class' => 'yii\grid\ActionColumn'];

?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>
    

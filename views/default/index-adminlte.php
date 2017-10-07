<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel sfmobile\ext\messagesTranslationsManager\models\SourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Source Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success btn-xs']) ?>

    </h1>
<?php $this->endBlock() ?>


<div class="box">
    <div class="box-body" style="overflow-x:auto">

    <?= $this->render('_index', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel, 'languages' => $languages]); ?>

    
    </div>
</div>

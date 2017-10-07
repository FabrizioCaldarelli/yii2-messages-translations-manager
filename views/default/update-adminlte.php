<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model sfmobile\ext\messagesTranslationsManager\models\SourceMessage */

$this->title = 'Update Source Message: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Source Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?php $this->beginBlock('content-header') ?>
    <h1><?= Html::encode($this->title) ?></h1>
<?php $this->endBlock() ?>

<div class="box">

    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
    ]) ?>

    </div>

</div>

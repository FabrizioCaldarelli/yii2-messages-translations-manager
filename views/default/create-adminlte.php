<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model sfmobile\ext\messagesTranslationsManager\models\SourceMessage */

$this->title = 'Create Source Message';
$this->params['breadcrumbs'][] = ['label' => 'Source Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

  </div><!-- /.box-body -->

</div><!-- /.box --


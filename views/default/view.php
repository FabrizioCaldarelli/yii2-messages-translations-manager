<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model sfmobile\ext\messagesTranslationsManager\models\SourceMessage */

$this->title = sprintf('%s - %s', $model->category, $model->message);
$this->params['breadcrumbs'][] = ['label' => 'Source Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= $this->render('_viewToolbar', ['model' => $model]); ?>
    </p>

    <?= $this->render('_view', ['model' => $model]); ?>


</div>

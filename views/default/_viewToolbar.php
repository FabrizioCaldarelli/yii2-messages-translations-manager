<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model sfmobile\ext\messagesTranslationsManager\models\SourceMessage */

?>
<?= Html::a('Create with same category', ['create', 'SourceMessageForm[category]' => $model->category], ['class' => 'btn btn-success']) ?>

<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

<?= Html::a('Delete', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
]) ?>

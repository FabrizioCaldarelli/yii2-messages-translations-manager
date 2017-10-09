<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model sfmobile\ext\messagesTranslationsManager\models\SourceMessage */

$this->title = sprintf('%s - %s', $model->category, $model->message);
$this->params['breadcrumbs'][] = ['label' => 'Source Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content-header') ?>
    <h1>
        <?= Html::encode($this->title) ?>
        
        <br />
        
        <div style="margin-top:8px">
            <?= $this->render('_viewToolbar', ['model' => $model]); ?>
        </div>       
    </h1>
<?php $this->endBlock() ?>

<div class="box">
    
    <div class="box-body">

    <?= $this->render('_view', ['model' => $model]); ?>
    
    </div>

</div>

<?php

/**
 * @copyright Copyright &copy; Fabrizio Caldarelli, sfmobile.it, 2017
 * @package yii2-messages-translations-manager
 * @version 1.0.0
 */

namespace sfmobile\ext\messagesTranslationsManager\controllers;

use Yii;
use sfmobile\ext\messagesTranslationsManager\models\Message;
use sfmobile\ext\messagesTranslationsManager\models\SourceMessage;
use sfmobile\ext\messagesTranslationsManager\models\SourceMessageForm;
use sfmobile\ext\messagesTranslationsManager\models\SourceMessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Messages Translations Manager provides an UI interface to handle messages translation based on `source message` and `message` tables.
 *
 * @author Fabrizio Caldarelli <fabriziocaldarelli@negusweb.it>
 * @since 1.0
 * @see https://github.com/FabrizioCaldarelli/yii2-messages-translations-manager
 */
class DefaultController extends Controller
{
    /**
     * Prepare data per index action
     * @return mixed
     */
    private function dataIndexQuery()
    {
        // Input
        $sourceMessageTable = \Yii::$app->controller->module->sourceMessageTable;
        $messageTable = \Yii::$app->controller->module->messageTable;
        $languages = \Yii::$app->controller->module->languages;

        // Query
        $query = (new \yii\db\Query())
        ->select(['sm.*'])
        ->from($sourceMessageTable.' as sm');
        
        foreach($languages as $l)
        {
            $query->addSelect(sprintf('t_%s.translation as lang_%s', $l, $l));
            $query->leftJoin(sprintf('%s as t_%s', $messageTable, $l), sprintf('sm.id = t_%s.id AND t_%s.language = "%s"', $l, $l, $l));    
        }
        
        return $query;
        
    }
    
    /**
     * Show all source message with all translations defined by languages[] configuration
     * @return mixed
     */
    public function actionIndex()
    {
        // Input
        $languages = \Yii::$app->controller->module->languages;
        $isAdminLteLayout = \Yii::$app->controller->module->isAdminLteLayout;
        
        $query = $this->dataIndexQuery();
        $sql = $query->createCommand()->getRawSql();

        $dataProvider = new \yii\data\SqlDataProvider([
            'sql' => $sql,
            'key' => 'id',
            
            'sort' => [
                'attributes' => [
                    'id',
                    'category',
                    'message',
                ],
            ],            
        ]);
        
        $viewFile = ($isAdminLteLayout)?'index-adminlte':'index';
        
        return $this->render($viewFile, [
            'languages' => $languages,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * View single source message with all translations defined by languages[] configuration
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        // Input
        $isAdminLteLayout = \Yii::$app->controller->module->isAdminLteLayout;
        
        $viewFile = ($isAdminLteLayout)?'view-adminlte':'view';
        
        
        return $this->render($viewFile, [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Save source message model with all translations defined by languages[] configuration
     * @param SourceModel $model
     * @param String[] $languages
     * @return mixed
     */
    private function saveModel($model, $languages)
    {
        $retSave = $model->save();
        
        if($retSave)
        {
            foreach($languages as $l)
            {
                $message = Message::find()->where(['id' => $model->id, 'language' => $l])->one();
                if(isset($model->languages[$l])&&($model->languages[$l]!=null))
                {
                    if($message!=null)
                    {
                        $message->translation = $model->languages[$l];
                    }
                    else
                    {
                        $msg = new Message();
                        $msg->id = $model->id;
                        $msg->language = $l;
                        $msg->translation = $model->languages[$l];
                        $msg->save();
                    }
                }
                else
                {
                    if($message!=null)
                    {
                        $message->delete();
                    }
                    
                }
            }
        }
        
        return $retSave;
    }

    /**
     * Creates a new SourceMessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // Input
        $languages = \Yii::$app->controller->module->languages;
        $isAdminLteLayout = \Yii::$app->controller->module->isAdminLteLayout;
        
        
        $model = new SourceMessageForm();
        
        $model->load(\Yii::$app->request->get());

        if ($model->load(Yii::$app->request->post()) && $this->saveModel($model, $languages)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        
        $viewFile = ($isAdminLteLayout)?'create-adminlte':'create';
        
        return $this->render($viewFile, [
            'model' => $model,
            'languages' => $languages,
        ]);
    }

    /**
     * Updates an existing SourceMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        // Input
        $languages = \Yii::$app->controller->module->languages;
        $isAdminLteLayout = \Yii::$app->controller->module->isAdminLteLayout;
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $this->saveModel($model, $languages)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        
        $viewFile = ($isAdminLteLayout)?'update-adminlte':'update';
        
        return $this->render($viewFile, [
            'model' => $model,
            'languages' => $languages,
        ]);
    }

    /**
     * Deletes an existing SourceMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SourceMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SourceMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SourceMessageForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

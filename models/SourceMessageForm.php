<?php

namespace sfmobile\ext\messagesTranslationsManager\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SourceMessageForm extends SourceMessage
{
    public $languages;

    public function afterFind()
    {
        parent::afterFind();
        
        $this->languages = [];
        foreach($this->messages as $m)
        {
            $this->languages[$m->language] = $m->translation;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            // email has to be a valid email address
            [['languages'], 'safe'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'verifyCode' => 'Verification Code',
        ]);
    }

}

<?php

/**
 * @copyright Copyright &copy; Fabrizio Caldarelli, sfmobile.it, 2017
 * @package yii2-messages-translations-manager
 * @version 1.0.0
 */

namespace sfmobile\ext\messagesTranslationsManager;

/**
 * messagesTranslations module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @var message table name
     */
    public $messageTable = 'message';

    /**
     * @var source message table name
     */
    public $sourceMessageTable = 'source_message';

    /**
     * @var check if adminLTE layout is needed
     */
    public $isAdminLteLayout = false;

    /**
     * @var supported languages
     */
    public $languages = [];
    
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'sfmobile\ext\messagesTranslationsManager\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        // Other customizations
        
    }
}

Messages Translations Manager
=============================
Messages Translations Manager

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist fabriziocaldarelli/yii2-messages-translations-manager "*"
```

or add

```
"fabriziocaldarelli/yii2-messages-translations-manager": "*"
```

to the require section of your `composer.json` file.


Requisites   
---------- 

Check that you have configured i18n component  :

```php
'components' => [
    
    'i18n' => [
        'translations' => [
            '*' => [
                'class' => 'yii\i18n\DbMessageSource',

                // Same table name of messagesTranslationsManager message table name
                'messageTable' => 'i18n_message',

                // Same table name of messagesTranslationsManager source message table name
                'sourceMessageTable' => 'i18n_source_message',
            ],
        ],
    ],	
        
],
```

Usage
-----

Once the extension is installed, simply configure it in config\main.php  :

```php
'modules' => [
    'messagesTranslationsManager' => [
        'class' => 'sfmobile\ext\messagesTranslationsManager\Module',

        // Replace message table name
        'messageTable' => 'i18n_message',

        // Replace source message table name
        'sourceMessageTable' => 'i18n_source_message',

        // If you are using AdminLTE, you can activate right format of view files
        'isAdminLteLayout' => true,

        // List of supported languages
        'languages' => ['it', 'en'],
    ],
],    
```

Test
----

Finally point to http://hosting-url/messagesTranslationsManager and you should see Translations

![schermata 2017-10-07 alle 11 59 45](https://user-images.githubusercontent.com/4108673/31306775-353c7db6-ab57-11e7-8375-c05802ecb4bc.png)

<?php

return [

    /*
     * The source of supported locales on the application
     * Available selection "array", "database". Default array
     */
    'source' => 'database',

    /*
     * If you choose array selection, you should add all supported translation on it as "code"
     */
    'locales' => [
        'sk'
    ],

    'required' => 'required_lang:sk',

    /*
     * If you choose database selection, you should choose the model responsible for retrieving supported translations
     * And choose the 'code_field' for example "en", "fr", "es"...
     */
    'database' => [
        'model' => 'App\\Models\\Language',
        'code_field' => 'code',
    ],

    /*
     * If you want to save the tab in the last selected language for the whole project, set this "true".
     * But if you want to use in one place call the saveLastSelectedLang(true|false) method
     */
    'save_last_selected_lang' => false,
];

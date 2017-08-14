yii2-codefellow-giigenerators
------------
New personalized GII's generators:
1. Model
2. CRUD

Installation
------------
To install, either run

$ php composer.phar require kartik-v/yii2-widget-datetimepicker "*"

    $ php composer.phar require codefellow/giigenerators "@dev"

or add

    "codefellow/giigenerators": "@dev"


Usage
-----
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [ //here
            'codefellow-model' => [ // generator name
                'class' => 'codefellow\giigenerators\model\Generator', // generator class
            ],
            'codefellow-crud' => [ // generator name
                'class' => 'codefellow\giigenerators\crud\Generator', // generator class
                'templates' => [ //setting for out templates
                    't-translation' => '@app/codefellow/generators/crud/t-translation', // template name => path to template
                ]
            ]
        ],
    ];


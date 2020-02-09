<?php

return [
    'template'        =>[

        'wrapper_start'  => TEMP_PATH . 'wrapperstart.php',
        'header'         => TEMP_PATH . 'header.php',
        'nav'            => TEMP_PATH . 'nav.php',
        ':view'          => ':action_view',
        'wrapper_end'    => TEMP_PATH . 'wrapperend.php'
    ],
    'header_resources'=>[

        'css'         =>[

            'normalize'  => CSS . 'normalize.css',
            'fawsome'    => CSS . 'fawsome.min.css',
            'gicons'     => CSS . 'googleicons.css',
            'mainen'     => CSS . 'mainen.css',
            'mainar'     => CSS . 'mainar.css'            
        ],

        'js'          =>[

            'modernizer' => JS . 'vendor/modernizr-2.8.3.min.js',
        ]
        ],
    'footer_resources'=>[

        'jquery'         => JS . 'vendor/jquery-1.12.0.min.js',
        'helper'         => JS . 'helper.js',
        // 'datatableen'      => JS . 'datatablesen.js',
        'datatablear'      => JS . 'datatablesar.js',
        'main'           => JS . 'main.js'
    ]    
];
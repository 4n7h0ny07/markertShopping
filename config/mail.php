<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    | Esta opción controla el correo predeterminado que se utiliza para enviar cualquier correo electrónico.
    | mensajes enviados por su aplicación. Se pueden configurar correos alternativos
    | y utilizado según sea necesario; sin embargo, este correo se utilizará de forma predeterminada.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers to be used while
    | sending an e-mail. You will specify which one you are using for your
    | mailers below. You are free to add additional mailers as required.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "log", "array", "failover"
    |
    | Aquí puede configurar todos los correos utilizados por su aplicación más
    | sus respectivas configuraciones. Se han configurado varios ejemplos para
    | usted y usted son libres de agregar el suyo propio según lo requiera su aplicación.
    |
    | Laravel admite una variedad de controladores de "transporte" de correo que se pueden utilizar mientras
    | enviando un correo electrónico. Especificarás cuál estás usando para tu
    | anuncios publicitarios a continuación. Usted es libre de agregar anuncios publicitarios adicionales según sea necesario.
    |
    | Compatible con: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    | "matasellos", "registro", "matriz", "conmutación por error"
    */

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME',),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'mailgun' => [
            'transport' => 'mailgun',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    | Es posible que desee que todos los correos electrónicos enviados por su aplicación se envíen desde
    | la misma dirección. Aquí puede especificar un nombre y una dirección que sea
    | Se utiliza globalmente para todos los correos electrónicos que envía su aplicación.
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    | Si está utilizando la representación de correo electrónico basada en Markdown, puede configurar su
    | rutas de temas y componentes aquí, lo que le permite personalizar el diseño
    | de los correos electrónicos. ¡O simplemente puedes seguir con los valores predeterminados de Laravel!
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];

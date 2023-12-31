<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'site.title',
                'display_name' => 'Site Title',
                'value' => 'Site Title',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Site',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'site.description',
                'display_name' => 'Site Description',
                'value' => 'Site Description',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Site',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'site.logo',
                'display_name' => 'Site Logo',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Site',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'display_name' => 'Google Analytics Tracking ID',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'admin.bg_image',
                'display_name' => 'Admin Background Image',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 5,
                'group' => 'Admin',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'admin.title',
                'display_name' => 'Admin Title',
                'value' => 'Fassid Shop',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'admin.description',
                'display_name' => 'Admin Description',
                'value' => 'Welcome to Voyager. The Missing Admin for Laravel',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Admin',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'admin.loader',
                'display_name' => 'Admin Loader',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Admin',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'admin.icon_image',
                'display_name' => 'Admin Icon Image',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Admin',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
            'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'page.paginas',
                'display_name' => 'pages',
                'value' => NULL,
                'details' => NULL,
                'type' => 'text',
                'order' => 6,
                'group' => 'Page',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'page.sliders',
                'display_name' => 'slider',
                'value' => '',
                'details' => NULL,
                'type' => 'image',
                'order' => 7,
                'group' => 'Page',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'emailconfig.protocolo',
                'display_name' => 'MAIL_MAILER',
                'value' => 'SMTP',
                'details' => NULL,
                'type' => 'text',
                'order' => 8,
                'group' => 'EmailConfig',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'emailconfig.Servidor',
                'display_name' => 'MAIL_HOST',
                'value' => 'mail.moxos.com.bo',
                'details' => NULL,
                'type' => 'text',
                'order' => 9,
                'group' => 'EmailConfig',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'emailconfig.puerto',
                'display_name' => 'MAIL_PORT',
                'value' => '465',
                'details' => NULL,
                'type' => 'text',
                'order' => 10,
                'group' => 'EmailConfig',
            ),
            15 => 
            array (
                'id' => 17,
                'key' => 'emailconfig.encriptacion',
                'display_name' => 'MAIL_ENCRYPTION',
                'value' => 'SSL/TLS',
                'details' => '{
"default":"SSL/TLS",
"options":{
"SSL":"SSL",
"TLS":"TLS",
"SSL/TLS":"SSL/TLS"
}
}',
                'type' => 'select_dropdown',
                'order' => 11,
                'group' => 'EmailConfig',
            ),
            16 => 
            array (
                'id' => 19,
                'key' => 'emailconfig.nameuser',
                'display_name' => 'MAIL_USERNAME',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 12,
                'group' => 'EmailConfig',
            ),
            17 => 
            array (
                'id' => 20,
                'key' => 'emailconfig.passworduser',
                'display_name' => 'MAIL_PASSWORD',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 13,
                'group' => 'EmailConfig',
            ),
        ));
        
        
    }
}
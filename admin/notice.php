<?php

class Contact360_Admin_Notice {

    const TITLE = '<strong>[Contact360]</strong> ';

    public static function missing_configuration()
    {
        echo '<div class="notice notice-warning"><p>'.self::TITLE.'<a href="'.menu_page_url( 'contact360-settings', false ).'">Skonfiguruj plugin</a> w celu zakończenia integracji (Client ID).</p></div>';
    }
    public static function missing_api_config()
    {
        echo '<div class="notice notice-error is-dismissible"><p>'.self::TITLE.'Aby korzystać z integracji formularzy, <a href="'.menu_page_url( 'contact360-settings', false ).'">skonfiguruj zmienne</a> (Client ID i API secret).</p></div>';
    }

    public static function missing_dependency_wpcf()
    {
        $link = '/wp-admin/plugin-install.php?s=Contact+Form+7&tab=search';
        echo '<div class="notice notice-error is-dismissible"><p>'.self::TITLE.'Aby korzystać z integracji formularzy, zainstaluj <a href="'.$link.'">wtyczkę Contact Form 7</a>.</p></div>';
    }



}
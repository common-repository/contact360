<?php

class Contact360_Admin {

    private static $_instance = null;

    public static function getInstance()
    {
        if(self::$_instance === null){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    private function __construct()
    {
        require_once 'notice.php';

        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'admin_menu'));
        add_filter('whitelist_options', array($this, 'whitelist_options'));
        add_filter('plugin_action_links_contact360/index.php', array($this, 'plugin_action_links'), 10);
    }

    public function init()
    {
        //check for configuration
        if(!get_option('contact360-client-id') || (!get_option('contact360-api-secret') || get_option('contact360-api-secret') === 'secret')){
            add_action( 'admin_notices', array('Contact360_Admin_Notice', 'missing_configuration') );
        }

        //check for dependencies
//        if(!defined('WPCF7_VERSION')){
//            add_action( 'admin_notices', array('Contact360_Admin_Notice', 'missing_dependency_wpcf') );
//        }
    }

    public function plugin_action_links($actions)
    {
        array_unshift($actions, '<a href="'.menu_page_url( 'contact360-settings', false ).'">Ustawienia</a>');
        return $actions;
    }

    public function whitelist_options($whitelist_options)
    {
        $whitelist_options['contact360-settings'] = array(
            'contact360-endpoint-url', 'contact360-client-id', 'contact360-api-secret'
        );
        return $whitelist_options;
    }

    public function admin_menu()
    {
        add_submenu_page(
            'options-general.php',
            'Plugin Contact360 - ustawienia',
            'Contact360',
            'manage_options',
            'contact360-settings',
            function(){
                Contact360_Helper::render_view('admin.settings');
            }
        );
    }

}

Contact360_Admin::getInstance();

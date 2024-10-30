<?php
/*
Plugin Name: Contact360
Description: Contact360 integration
Version: 1.3.0
Author: Michał Stelmak
Author URI: mailto:biuro@stelsoft.pl
*/
use Contact360\API;

//require additional files
require 'vendor/autoload.php';
require_once 'helper.php';
require_once 'admin/index.php';

class Contact360WP
{
    const VERSION = '1.3.0';

    private static $_instance = null;
    private $_endpoint;

    public $api = null;


    private function __construct()
    {
        //@todo try to send all queued requests
        $this->_endpoint = trim(get_option('contact360-endpoint-url')?get_option('contact360-endpoint-url'):API::PANEL_URL, '/');

        //register actions
        if(get_option('contact360-client-id')){
            add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));

            $this->api = new API(get_option('contact360-client-id'), get_option('contact360-api-secret'), false, false, $this->_endpoint);

            //form integrations
            add_action('wpcf7_mail_sent', array($this, 'wpcf7_mail_sent'));
            add_action('elementor_pro/forms/new_record', array($this, 'elementor_pro_forms_new_record'), 10, 2);
            add_action( 'wpforms_process_entry_save', [$this, 'wpforms_process_entry_save'], 10, 4);
        }
    }

    public static function getInstance()
    {
        if(self::$_instance === null){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function wp_enqueue_scripts()
    {
        wp_enqueue_script('contact360-integration', $this->_endpoint . '/cdn/contact360-integration.js?id=' . get_option('contact360-client-id'), array(), self::VERSION, true);
    }

    public function wpcf7_mail_sent($contact_form)
    {
        $submission = WPCF7_Submission::get_instance();
        $posted_data = array();
        if ($submission) {
            $posted_data = $submission->get_posted_data();
        }
        $mail = $contact_form->prop( 'mail' );
        $body = wpcf7_mail_replace_tags($mail['body'], $posted_data);

        if(!$this->api->insertContactForm($contact_form->title(), $body, $posted_data)){
            //@TODO queue up for later
        }
    }

    /**
     * @param ElementorPro\Modules\Forms\Classes\Form_Record $record
     * @param ElementorPro\Modules\Forms\Classes\Ajax_Handler $handler
     */
    public function elementor_pro_forms_new_record($record, $handler)
    {
        $settings = $record->get('form_settings');
        $posted_data = $record->get('sent_data');
        if(!$this->api->insertContactForm(isset($settings['form_name'])?$settings['form_name']:'Formularz', '', $posted_data)){
            //@TODO queue up for later
        }
    }

    public function wpforms_process_entry_save($fields, $entry, $form_id, $form_data)
    {
        $data_to_send = array();
        foreach($fields as $field){
            $data_to_send[strtolower($field['name'])] = $field['value'];
        }
        if(!$this->api->insertContactForm(isset( $form_data['settings']['form_title'])? $form_data['settings']['form_title']:'Formularz', '', $data_to_send)){
            //@TODO queue up for later
        }
    }
}

Contact360WP::getInstance();

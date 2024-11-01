<?php

/* protected */
if (!defined('ABSPATH'))
    exit;

/**  copyRight by Nsstheme  */

//class define
class nssUser_style {

    //construct
    public function __construct() 
    {
        add_action('wp_enqueue_scripts', array($this, 'nss_reg_mix_added'));
        add_action('init',array($this,'nss_reg_active_http_falback'));
    }

    //check http
    function nss_reg_active_http_falback()
    {
        if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
        {   
            $scheme = 'http';}else{$scheme = 'https';
        }
        return $scheme;
    }

    //methods
    function nss_reg_mix_added() 
    {
        wp_register_style('nssTheme-style', NSS_UR_PLUGIN_URL . 'nssUser_assets/css/nssTheme-style.css');
        wp_enqueue_style('nssTheme-style');

        wp_enqueue_script('jquery');

        wp_register_script('style-google-recaptcha-js', $this->nss_reg_active_http_falback().'://www.google.com/recaptcha/api.js', array('jquery'), time(), TRUE);
        wp_enqueue_script('style-google-recaptcha-js');

        wp_register_script('nssUser_custom', NSS_UR_PLUGIN_URL . 'nssUser_assets/js/nssUser_custom.js', array('jquery'), '', TRUE);
        wp_enqueue_script('nssUser_custom');

        wp_localize_script('nssUser_custom', 'nssUser_ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
    }

}//end class

//object
new nssUser_style();

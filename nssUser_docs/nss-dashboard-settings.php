<?php

/* protected */
if (!defined('ABSPATH'))
exit;

class nss_reg_dashboard_manager{
    //construct
    function __construct()
    {
        if( is_admin() ):
            add_action( 'admin_menu', array( $this, 'nss_reg_admin_meue_wp' ) );
            add_action( 'admin_init', array( $this, 'nss_reg_page_init_wp' ) );
        endif;
    }

    //method
    function nss_reg_admin_meue_wp()
    {
        add_options_page(
            'Settings', 
            'Registration Setting Wp', 
            'manage_options', 
            'nss-reg-setting-admin', 
            array( $this, 'nss_admin_page_method_wp' )
        ); 
    }
    //admin form
    function nss_admin_page_method_wp()
    {
        $this->options = get_option( 'nss_reg_opt_name_wp' );
        ?>
        <form method="post" action="options.php">
            <?php
                settings_fields('nss_reg_opt_group_wp');
                do_settings_sections('nss_reg_sett_admin');
                submit_button();
            ?>
        </form>
        <?php
    }
    //page
    function nss_reg_page_init_wp()
    {
        register_setting(
            'nss_reg_opt_group_wp',
            'nss_reg_opt_name_wp',
            array($this,'sanitize')
        );

        add_settings_section(
            'nss_reg_sett_id',
            'Registration Field Settings',
            array($this,'nss_reg_section_info'),
            'nss_reg_sett_admin'
        );

        add_settings_field(
            'site_key_id',
            'Site Key Here',
            array($this, 'site_key_callback'),
            'nss_reg_sett_admin',
            'nss_reg_sett_id'
        );

        add_settings_field(
            'secret_key_id',
            'Secret Key Here',
            array($this, 'secret_key_callback'),
            'nss_reg_sett_admin',
            'nss_reg_sett_id'
        );

    }
    //sanitize field
    function sanitize($input){
        $new_input = array();
        if( isset( $input['site_key_id'] ) )
            $new_input['site_key_id'] = sanitize_text_field( $input['site_key_id'] );

        if( isset( $input['secret_key_id'] ) )
            $new_input['secret_key_id'] = sanitize_text_field( $input['secret_key_id'] );

        return $new_input;
    }
    //display setting message 
    function nss_reg_section_info(){
        print 'Enter your settings below:<br>'. PHP_EOL;
        print '<h4><a target="_blank" href="https://codex.wordpress.org/Shortcode_API">How to user Shortcode</a>, Copy this below code and past it page content</h4>'.'<br/>';
        print '[nssUser_getForm]';
    }
    //field callback
    function site_key_callback(){
        printf(
            '<input type="text" class="regular-text" id="site_key" name="nss_reg_opt_name_wp[site_key_id]" value="%s" />',
            isset( $this->options['site_key_id'] ) ? esc_attr( $this->options['site_key_id']) : ''
        );
    }
    //field callback
    function secret_key_callback(){
        printf(
            '<input type="text" class="regular-text" id="secret_key" name="nss_reg_opt_name_wp[secret_key_id]" value="%s" />',
            isset( $this->options['secret_key_id'] ) ? esc_attr( $this->options['secret_key_id']) : ''
        );
    }

}
new nss_reg_dashboard_manager();

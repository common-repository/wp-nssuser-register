<?php

/* protected */
if (!defined('ABSPATH'))
    exit;

/**  copyRight by Nsstheme **/

function nssTheme_ajax_regfrom() 
{
    global $wpdb;
    $name = sanitize_text_field($_POST['rgName']);
    $uEmail = sanitize_email($_POST['rgEmail']);
    $fName = sanitize_text_field($_POST['rgFname']);
    $lName = sanitize_text_field($_POST['rgLname']);
    $uRole = sanitize_text_field($_POST['rgRole']);
    $uPass = sanitize_text_field($_POST['rg_pass']);

    //wp user meta
    $nssUserMeta  = '';
    if (is_user_logged_in())
    {
        $nssUserMeta = array(
            'user_login' => $name,
            'user_email' => $uEmail,
            'first_name'=>$fName,
            'last_name'=>$lName,
            'role' => $uRole,
            'user_pass' => $uPass
        );
    }
    else
    {
        $nssUserMeta = array(
            'user_login' => $name,
            'user_email' => $uEmail,
            'first_name'=>$fName,
            'last_name'=>$lName,
            'user_pass' => $uPass
        );
    }
    //wp insert user
    $user_id = wp_insert_user($nssUserMeta);
    if($user_id)
    {
        echo '<p>successful, just Check this: </p>';
        ?>
            <a href="<?php echo wp_login_url(); ?>" title="Login"><?php echo esc_html("Login"); ?></a>
        <?php
    }
    die();
}

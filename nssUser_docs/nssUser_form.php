<?php
/* protected */
if (!defined('ABSPATH'))
    exit;

/**   copyRight by Nsstheme **/
class nssUser_form 
{
//construct
    public function __construct() 
    {
        add_shortcode('nssUser_getForm', array($this, 'nssTheme_shortcode_view'));
        add_action('init', array($this,'nss_reg_active_http_check'));
    }   
    //active http check
    public function nss_reg_active_http_check()
    {
        if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){ 
            $scheme = 'http';}else{$scheme = 'https';
        }
        return $scheme;
    }
    //method
    public function nssTheme_shortcode_view() 
    {
        if (is_user_logged_in())
        {
            ob_start();
            ?>  
            <div class="nssTheme-form-creator">
            <h3 class="nssTheme_header"><?php echo esc_html__('Register New Account','nssuser-reg'); ?></h3>     
            <div class="nssSumbit_view">             
            </div>
            <form id="nssTheme_registration_form" class="nssTheme_form" action="" method="POST">
                <fieldset>
                    <p>
                        <label for="nssTheme_user_Login"><?php _e('Username','nssuser-reg'); ?></label>
                        <input id="uName" class="userLog" name="nssTheme_user_login" id="nssTheme_user_login" class="required" type="text"/>
                        <label class="error" for="nssTheme_user_login" id="name_error"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="nssTheme_user_email"><?php _e('Email','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_email" id="Uemail" class="useMail" type="email"/>
                        <label class="error" for="nssTheme_user_email" id="email_error"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="nssTheme_user_first"><?php _e('First Name','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_first" id="nssTheme_ufName" type="text"/>
                        <label class="error" for="nssTheme_user_first" id="user_first_error"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="nssTheme_user_last"><?php _e('Last Name','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_last" value="" id="nssTheme_ulName" type="text"/>
                        <label class="error" for="nssTheme_user_last" id="user_last_error"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>  
                        <label for="role_set"><?php _e('Role','nssuser-reg'); ?></label><br/>
                        <select class="role_user" id="nssRole" name="nssrole_set">
                            <option value="Select"><?php _e('Select Role','nssuser-reg'); ?></option>
                            <option value="subscriber"><?php _e('Subscriber','nssuser-reg'); ?></option>  
                            <option value="author"><?php _e('Author','nssuser-reg'); ?></option>
                            <option value="contributor"><?php _e('Contributor','nssuser-reg'); ?></option>                                                      
                        </select>
                        <label class="error" for="nssrole_set" id="user_role"><?php _e('Does not select any role?','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="password"><?php _e('Password','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_pass" id="password" class="required" type="password"/>
                        <label class="error" for="nssTheme_user_pass"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="password_again"><?php _e('Password Again','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_pass_confirm" id="password_again" class="required" type="password"/>
                        <label class="error" for="nssTheme_user_pass_confirm" id="pass_confirm_error"></label>
                    </p>
                    <p>
                        <input type="hidden" name="nssTheme_register_nonce" value="<?php echo wp_create_nonce('nssTheme-register-nonce'); ?>"/>
                        <input class="button" id="submit_btn" type="submit" value="<?php _e('Register Your Account'); ?>"/>
                    </p>
                </fieldset>                
            </form> 
            </div>       
            <?php
            return ob_get_clean();
        }
        else
        {
            ob_start();
            ?>	
            <div class="nssTheme-form-creator">
            <h3 class="nssTheme_header"><?php echo esc_html__('Register New Account','nssuser-reg'); ?></h3>     
            <div class="nssSumbit_view">
                
            </div>
            <form id="nssTheme_registration_form" class="nssTheme_form" action="" method="POST">
                <fieldset>
                    <p>
                        <label for="nssTheme_user_Login"><?php _e('Username','nssuser-reg'); ?></label>
                        <input id="uName" class="userLog" name="nssTheme_user_login" id="nssTheme_user_login" class="required" type="text"/>
                        <label class="error" for="nssTheme_user_login" id="name_error"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="nssTheme_user_email"><?php _e('Email','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_email" id="Uemail" class="useMail" type="email"/>
                        <label class="error" for="nssTheme_user_email" id="email_error"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="nssTheme_user_first"><?php _e('First Name','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_first" id="nssTheme_ufName" type="text"/>
                        <label class="error" for="nssTheme_user_first" id="user_first_error"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="nssTheme_user_last"><?php _e('Last Name','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_last" value="" id="nssTheme_ulName" type="text"/>
                        <label class="error" for="nssTheme_user_last" id="user_last_error"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="password"><?php _e('Password','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_pass" id="password" class="required" type="password"/>
                        <label class="error" for="nssTheme_user_pass"><?php _e('This field is required.','nssuser-reg'); ?></label>
                    </p>
                    <p>
                        <label for="password_again"><?php _e('Password Again','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_pass_confirm" id="password_again" class="required" type="password"/>
                        <label class="error" for="nssTheme_user_pass_confirm" id="pass_confirm_error"></label>
                    </p>
                    <p>
                        <?php 
                            $google_site_key = get_option( 'nss_reg_opt_name_wp' );
                            $site_key = (isset($google_site_key['site_key_id']) && ($google_site_key['site_key_id']) !='') ? $google_site_key['site_key_id'] : '';
                            $secret_key = (isset($google_site_key['secret_key_id']) && ($google_site_key['secret_key_id']) !='') ? $google_site_key['secret_key_id'] : '';
                            ?>
                            <div class="g-recaptcha" data-sitekey="<?php echo esc_html($site_key); ?>"></div>
                            <?php
                            $captcha = (isset($_POST['g-recaptcha-response']) && ($_POST['g-recaptcha-response']) !='') ? sanitize_text_field($_POST['g-recaptcha-response']) : '';     
                            $url = $this->nss_reg_active_http_check().'://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$captcha;
                            $response = wp_remote_get($url);
                            $responseData = json_decode(json_encode($response),true);
                            
                            if($responseData["response"]["message"] == 'OK')
                            {
                                //echo 'Your contact request have submitted successfully.';
                            }else{
                                echo 'Robot verification failed, please try again.';
                            }       
                        ?>
                        <div class="clear"></div>  
                    </p>    
                    <p>
                        <input type="hidden" name="nssTheme_register_nonce" value="<?php echo wp_create_nonce('nssTheme-register-nonce'); ?>"/>
                        <input class="button" id="submit_btn" type="submit" value="<?php _e('Register Your Account'); ?>"/>
                    </p>
                </fieldset>                
            </form> 
          </div>
            <?php
            return ob_get_clean();
        }
    }
    
    
}//end class

//object
new nssUser_form();
           

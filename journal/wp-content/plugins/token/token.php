<?php
/*
Plugin Name: Token 
Plugin URI: http://onlinebizsoft.com/
Description: Update App ID & App Secret of Facebock.
Version: 1.0.1
Author: Harry Nguyen
Author URI: http://onlinebizsoft.com/
License: GPL2
*/

    /** Step 2 (from text above). */
    add_action( 'admin_menu', 'token_menu' );

    /** Step 1. */
    function token_menu() {
        $page = add_menu_page( 'Access Token', 'Token', 'manage_options', 'access-token-facebock', 'token_options' );
        add_options_page( 'Access Token', 'Token', 'manage_options', 'access-token-facebock-save', 'token_save' );
        add_action( 'admin_print_styles-' . $page, 'token_plugin_admin_assets' );
    }

    /** Step 3. */
    function token_options() {
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        echo '<div class="wrap">'.
                '<div id="wapper-token" class="wapper-token">'.
                    '<div class="token-title">App Id & App Secret</div>'.
                    '<div class="token-content">'.
                        '<form method="post" action="'.admin_url('admin.php?page=access-token-facebock').'" class="form-token">'.
                            settings_fields('action_token_save').
                            '<div class="form-groups-control">'.
                                '<label class="label-control">App ID</label>'.
                                '<div class="controls">'.
                                    '<input type="text" name="token[app_id]" id="tokenID" class="input-text" value="" />'.
                                '</div>'.
                            '</div>'.
                            '<div class="form-groups-control">'.
                                '<label class="label-control">App Secret</label>'.
                                '<div class="controls">'.
                                    '<input type="text" name="token[app_secret]" id="tokenSecret" class="input-text" value="" />'.
                                '</div>'.
                            '</div>'.
                            '<div class="form-groups-control">'.
                                '<label class="label-control"></label>'.
                                '<div class="controls">'.
                                    '<button type="submit" name="submit" id="tokenSubmit" class="button button-primary" value="Save" >Save ID&Secret</button>'.
                                '</div>'.
                            '</div>'.
                        '<form>'.
                    '</div>'.
                '</div>'.
             '</div>';
    }

    
    add_action( 'admin_init', 'register_css_token_plugin_admin_init' );
   
    function register_css_token_plugin_admin_init() {
        /* Register our token_style_admin. */
        wp_register_style( 'token_style_admin', plugins_url('css/token.admin.css', __FILE__) );
        wp_register_script( 'token_script_admin', plugins_url( 'js/token.admin.js', __FILE__ ) );
        wp_register_script( 'token_script_admin_validate', plugins_url( 'js/jquery.validate.js', __FILE__ ) );
    }
   
    function token_plugin_admin_assets() {
        wp_enqueue_style( 'token_style_admin' );
        wp_enqueue_script( 'token_script_admin_validate' );
        wp_enqueue_script( 'token_script_admin' );
    }
    function token_save(){
        include dirname(__FILE__).'/controller/admin.php';
        $Token = new TokenAdmin();
        echo '<div class="wrap">'.
                '<div id="wapper-token" class="wapper-token">'.
                    $Token->save().
                '</div>'.
             '</div>';
    }
    
?>
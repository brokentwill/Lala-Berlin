<?php
define( 'DOING_AJAX', true );
define( 'WP_ADMIN', true );



/** Load WordPress Bootstrap */
require_once( dirname( dirname( __FILE__ ) ) . '/wp-load.php' );
if ( isset($_POST) AND !empty($_POST['token']) AND $_POST['token'] == 'Update' AND !empty($_POST['type']) AND $_POST['type'] == 'Facebock' )
{
    $items = $wpdb->get_results("SELECT data FROM wp_token WHERE id = 1");
    if ( !empty($items) AND is_array($items) AND count($items) )
    {
        $items = json_decode($items[0]->data);
        $my_url = 'http://vnit.vn/test/wp-admin/token.php';
        $dialog_url = 'https://www.facebook.com/dialog/oauth?client_id=' 
        . $items->app_id . '&redirect_uri=' . urlencode($my_url) ;

        exit(json_encode(array('status'=>true, 'url'=>$dialog_url)));        
    }
}
else if ( !empty($_REQUEST["code"]) )
{
    $code = $_REQUEST["code"];
    $items = $wpdb->get_results("SELECT data FROM wp_token WHERE id = 1");
    if ( !empty($items) AND is_array($items) AND count($items) )
    {
        $items = json_decode($items[0]->data);
        $my_url = 'http://vnit.vn/test/wp-admin/token.php';
        
        // get user access_token
        $token_url = 'https://graph.facebook.com/oauth/access_token?client_id='
          . $items->app_id . '&redirect_uri=' . urlencode($my_url) 
          . '&client_secret=' . $items->app_secret 
          . '&code=' . $code;

        // response is of the format "access_token=AAAC..."
        $access_token = substr(file_get_contents($token_url), 13);
        $api = explode("&", $access_token);
        echo '<pre>';
        print_r($api);exit;

    }
}
?>
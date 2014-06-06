<?php
class TokenAdmin{
    public $table = 'wp_token';
    public function __construct(){
    }

    public function save(){
        if ( isset($_POST) AND is_array($_POST) AND !empty($_POST['token']) AND $Token = $_POST['token'] AND !empty($Token['app_id']) AND !empty($Token['app_secret']) )
        {
            global $wpdb;
            $wpdb->update( 
                $this->table, 
                array( 
                    'data' => json_encode($Token),
                    'updated_at' => strtotime(date("Y-m-d H:i:s"))
                ), 
                array( 'ID' => 1 ), 
                array( 
                    '%s',
                    '%d'
                ), 
                array( '%d' ) 
            );
            return 'Update successfully.';
        }
        return 'System overload. Please try again later.';
    }
}
?>
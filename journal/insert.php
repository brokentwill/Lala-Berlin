<?php
    define('DOING_CRON', true);
    $time = 1398183252;
    echo date('Y-m-d h:i:s', $time);exit;
    if ( !defined('ABSPATH') ) {
        /** Set up WordPress environment */
        require_once( dirname( __FILE__ ) . '/wp-load.php' );
    }
    if ( isset($json->data) AND count($json->data) )
    {
      foreach ($json->data as $data)
      {
          $wpdb->insert( 
              $wpdb->posts, 
              array( 
                  'post_author' => 1, 
                  'post_date' => date('Y-m-d h:i:s', $data->created_time),
                  'post_date_gmt' => date('Y-m-d h:i:s', $data->created_time),
                  'post_content' => $data->message,
                  'post_title' => '',
                  'post_status' =>'publish',
                  'comment_status' =>'open',
                  'ping_status' =>'open',
                  'post_modified'=> date('Y-m-d h:i:s', $data->created_time),
                  'post_modified_gmt' => date('Y-m-d h:i:s', $data->created_time),
                  'post_type' => 'post'
              ), 
              array( 
                  '%s', 
                  '%d',
                  '%d',
                  '%d',
                  '%d',
                  '%d',
                  '%d',
                  '%d',
                  '%d',
                  '%d',
                  '%d'
              ) 
          );
      }
    }
?>
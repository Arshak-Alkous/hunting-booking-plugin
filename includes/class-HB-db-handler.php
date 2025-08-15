<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
 
class HB_DB_Handler {
 
    public static function create_bookings_table() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'hunting_bookings';
        $charset_collate = $wpdb->get_charset_collate();
 
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            first_name varchar(100) NOT NULL,
            last_name varchar(100) NOT NULL,
            email varchar(100) NOT NULL,
            trip_date date NOT NULL,
            people_count int(11) NOT NULL,
            hunter_license varchar(100) DEFAULT '' NOT NULL,
            message text DEFAULT '' NOT NULL,
            status varchar(50) DEFAULT 'pending' NOT NULL,
            admin_comment text DEFAULT '' NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
 
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}
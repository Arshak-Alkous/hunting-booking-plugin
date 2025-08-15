<?php
/**
 * Plugin Name: Hunting Bookings plugin
 * Description: Saves the WPForms form data in a table dedicated to reservations.
 * Version: 1.0
 * Author: Arshak
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
 
// Loads files's pluging
require_once plugin_dir_path( __FILE__ ) . 'includes/class-HB-db-handler.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/entities/class-HB-booking.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-HB-booking-handler.php';
 
// Activation
register_activation_hook( __FILE__, [ 'HB_DB_Handler', 'create_bookings_table' ] );
 
// Run the class that captures the form data and records it in the 'hunting_bookings' table.
new HB_Booking_Handler();
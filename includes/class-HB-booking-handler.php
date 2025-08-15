<?php

class HB_Booking_Handler {

    // ID of the hunting booking WPForms form
    private $form_id = 2119; // replace with your actual form ID

    public function __construct() {
        // Hook into WPForms form submission
        add_action('wpforms_process_complete', [$this, 'save_booking'], 10, 4);
    }
/**
 * Handle the submission of the Hunting Booking form
 *
 * @param array $fields   All form fields
 * @param array $entry    Raw entry data
 * @param array $form_data Form metadata
 * @param int   $entry_id Entry ID
 */
function save_booking($fields, $entry, $form_data, $entry_id) {
   
    // Only process if this is our hunting booking form
        if ($form_data['id'] != $this->form_id) {
            return; // Skip other forms
        }
    if (is_array($fields[1]['value'])) {
    $first_name = sanitize_text_field($fields[1]['value']['first']);
    $last_name  = sanitize_text_field($fields[1]['value']['last']);
} else {
    $first_name = sanitize_text_field($fields[1]['value']);
    $last_name  = '';
}
 
    // Create a new booking object
    $booking = new HB_Booking(
        $first_name,         // First Name
         $last_name, // Last Name
        sanitize_email($fields[2]['value']),              // Email
        sanitize_text_field($fields[4]['value']),         // Trip Date
        intval($fields[5]['value']),                      // People Count
        sanitize_text_field($fields[6]['value']),         // Hunter License
        sanitize_textarea_field($fields[3]['value'])      // Message
    );
 
    // Insert booking into the database
    global $wpdb;
    $wpdb->insert(
        $wpdb->prefix . 'hunting_bookings',
        $booking->to_array() // Convert the object to array for insertion
    );
}
}
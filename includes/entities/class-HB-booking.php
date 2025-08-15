<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
 
class HB_Booking {
 
    public $first_name;
    public $last_name;
    public $email;
    public $trip_date;
    public $people_count;
    public $hunter_license;
    public $message;
    public $status;
    public $admin_comment;
    public $created_at;
 
    public function __construct($first, $last, $email, $date, $people, $license, $msg) {
        $this->first_name     = $first;
        $this->last_name      = $last;
        $this->email          = $email;
        $this->trip_date      = $date;
        $this->people_count   = $people;
        $this->hunter_license = $license;
        $this->message        = $msg;
        $this->status         = 'pending'; // Default status
        $this->admin_comment  = ''; // default empty
        $this->created_at     = current_time('mysql'); // Timestamp
    }
 
    /**
     * Convert booking object to array for database insertion
     */
    public function to_array() {
        return [
            'first_name'     => $this->first_name,
            'last_name'      => $this->last_name,
            'email'          => $this->email,
            'trip_date'      => $this->trip_date,
            'people_count'   => $this->people_count,
            'hunter_license' => $this->hunter_license,
            'message'        => $this->message,
            'status'         => $this->status,
            'admin_comment'  => $this->admin_comment,
            'created_at'     => $this->created_at
        ];
    }
}
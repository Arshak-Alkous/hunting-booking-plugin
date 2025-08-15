# Hunting Booking WPForms Handler
 
A custom WordPress plugin that integrates with **WPForms** to save hunting booking form submissions into a custom database table (`wp_hunting_bookings`).
 
## 📌 Features
- Listens to WPForms submissions using the `wpforms_process_complete` hook.
- Validates and sanitizes form data before saving.
- Saves the booking into a custom MySQL table.
- Supports first name, last name, email, trip date, people count, hunter license, and message fields.
 
## 🛠 Requirements
- WordPress 6.0+ (tested on Local WP)
- PHP 8.0+
- WPForms plugin installed and active
- A database table named `wp_hunting_bookings` with columns matching your booking fields
 
##Installation
 
1. Download or clone this repository.
2. Place the plugin folder inside wp-content/plugins/ in your WordPress installation.
3. Activate the plugin from WordPress Dashboard → Plugins.
 
##⚙ Configuration
 
-Create a WPForms form that matches the expected field IDs and order used in the plugin code.
 
-Update the form ID in the plugin file to match your WPForms form (replace 2119 with your actual form ID).
 
-Ensure the trip date field sends a valid YYYY-MM-DD format if you are saving it into a MySQL DATE column.
 
 
📝 Notes
 
If your trip date is stored as zeros (0000-00-00), check the form field type and make sure it outputs a proper date format.
 
If your WPForms field order changes, update the $fields indexes in the plugin accordingly.
 
 
📜 License
 
MIT License - feel free to modify and distribute.

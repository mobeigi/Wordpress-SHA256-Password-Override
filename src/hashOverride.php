<?php
    /*
        Plugin Name: Wordpress Login Hash Changer - SHA256 + Salt
        Description: Changes wordpress to create SHA256 hashes + Salt
        Author: Mohammad Ghasembeigi
        Version: 1.0
        Author URI: http://mohammadg.com
    */

    //Plugin will enable use of SHA256 hashing for authentication.
    //Salt used is 64 bit SECURE_AUTH_SALT string from 'wp-config.php' (ensure this is uniquely generated)

    //wp_check_password
    if( ! function_exists('wp_check_password') ) {
        function wp_check_password($password, $hash) {
           return hash_equals( hash('sha256', SECURE_AUTH_SALT . $password)  ,   $hash);
        }
    }

    if( ! function_exists('wp_hash_password') ) {
        function wp_hash_password($password) {
           return hash('sha256', SECURE_AUTH_SALT . $password);
        }
    }

?>
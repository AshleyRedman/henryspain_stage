<?php

namespace App\Forms;

class Guide
{
    public function __construct()
    {
        add_action('wp_ajax_create_guide_form', [$this, 'createGuideForm']);
    }

    public function createGuideForm()
    {
        $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
        $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $guide_name = filter_var($_POST['guide_name'], FILTER_SANITIZE_STRING);

        $admin = get_bloginfo('admin_email');
        $to = $admin;
        $subject = 'A new visitor has downloaded the '. $guide_name .'guide';
        $body = '<h3>'.$fname.' '.$lname.' has downloaded the '.$guide_name.' guide</h3><br>';
        $headers = ['Content-Type: text/html; charset=YTF-8'];

        wp_mail($to, $subject, $body, $headers);
    }
}

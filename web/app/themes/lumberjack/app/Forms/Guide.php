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
        $subject = ''.$fname.' '.$lname.' has just downloaded the '.$guide_name.' guide';
        $body = '
        <h3>The following information was completed:</h3>
        <br>
        <table>
            <tbody>
                <tr>
                    <td>First Name: </td>
                    <td>'.$fname.'</td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td>'.$lname.'</td>
                </tr>
                <tr>
                    <td>Contact Number: </td>
                    <td>'.$phone.'</td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>'.$email.'</td>
                </tr>
                <tr>
                    <td>Guide of interest: </td>
                    <td>'.$guide_name.'</td>
                </tr>
            </tbody>
        </table>
        ';
        $headers = ['Content-Type: text/html; charset=YTF-8'];

        wp_mail($to, $subject, $body, $headers);
    }
}

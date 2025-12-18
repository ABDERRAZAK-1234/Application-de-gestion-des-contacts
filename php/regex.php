<?php
$msg_name = "";
$msg2_name = "";
$msg_email = "";
$msg2_email = "";
$msg_tel = "";
$msg_password = "";
$msg_password_verify = "";

if (isset($_POST['submit'])) {

    // Username validation
    if (empty($_POST['username'])) {
        $msg_name = "You must supply your name";
    } else {
        $name_subject = $_POST['username'];
        $name_pattern = '/^[a-zA-Z-\'. ]+$/'; // Updated to allow more characters
        if (!preg_match($name_pattern, $name_subject)) {
            $msg2_name = "Only alphabets, spaces, hyphens, and apostrophes allowed";
        }
    }

    // Email validation
    if (empty($_POST['email'])) {
        $msg_email = "You must supply your email";
    } else {
        $email_subject = $_POST['email'];
        $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        preg_match($email_pattern, $email_subject, $email_matches);
        if (!$email_matches[0]) {
            $msg2_email = "Must be of valid email format";
        }
    }

    // Telephone validation
    if (empty($_POST['telephone'])) {
        $msg_tel = "You must supply your telephone number";
    } else {
        $telephone = $_POST['telephone'];
        $tel_pattern = '/^\+?[0-9]{10,15}$/'; // Validate phone number
        if (!preg_match($tel_pattern, $telephone)) {
            $msg_tel = "Must be a valid phone number";
        }
    }

    // Password validation
    if (empty($_POST['password'])) {
        $msg_password = "You must supply a password";
    } else {
        $password = $_POST['password'];
        if (strlen($password) < 6) {
            $msg_password = "Password must be at least 6 characters";
        }
    }

    // Verify password
    if (empty($_POST['passwordV'])) {
        $msg_password_verify = "You must verify your password";
    } else {
        if ($_POST['password'] !== $_POST['passwordV']) {
            $msg_password_verify = "Passwords do not match";
        }
    }
}
?>

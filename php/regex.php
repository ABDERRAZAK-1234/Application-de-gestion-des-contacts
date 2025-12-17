<?php
$msg_name = "";
$msg2_name = "";
$msg_email = "";
$msg2_email = "";
if (isset($_POST['submit'])) {
    //checking name
    if (isset($_POST['username']))
        $msg_name = "You must supply your name";
    $name_subject = $_POST['username'];
    $name_pattern = '/^[a-zA-Z ]*$/';
    preg_match($name_pattern, $name_subject, $name_matches);
    if (!$name_matches[0])
        $msg2_name = "Only alphabets and white space allowed";
}

if (isset($_POST['submit'])) {
    $msg_email = "You must supply your email";
    $email_subject = $_POST['email'];
    $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    preg_match($email_pattern, $email_subject, $email_matches);
    if (!$email_matches[0])
        $msg2_email = "Must be of valid email format";
}

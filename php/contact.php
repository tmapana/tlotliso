<?php
echo "<pre>";

    if(isset($_POST['email']) && $_POST['email'] != ''){
        //then submit the form

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            $name = $_POST['name'];
            $email_from = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];

            $email_to = "mpntlo002@myuct.ac.za";
            $body = "";

            $subject = "tlotliso.com - new message from ".$name;

            $body .= "new message from: ".$name. "\r\n";
            $body .= "email address: ".$email_from. "\r\n";
            $body .= "phone number: ".$phone. "\r\n";
            $body .= "they said: ".$message. "\r\n";

            mail($email_to, $subject, $body);

            $messagesent = true;
        }

        else{
            $messagesent = false;
        }
    }

echo '</pre>';
?>
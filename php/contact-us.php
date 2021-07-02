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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="webform.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="main.js"></script>
</head>

<body>

    <?php
    if($messagesent):
    ?>
        thankyou.html
    <?php
    else:
    ?>
    <div class="container">
        <form action="webform.php" method="POST" class="form">
            <div class="form-group">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="your name" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="your email address" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="subject" class="form-label">phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="your phone number (optional)" tabindex="3">
            </div>
            <div class="form-group">
                <label for="message" class="form-label">message</label>
                <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="please write me a message..." tabindex="4"></textarea>
            </div>
            <div>
                <button type="submit" class="btn">Send Message!</button>
            </div>
        </form>
    </div>
    <?php
    endif;
    ?>
</body>

</html>
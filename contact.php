<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>


<!-- Navigation -->

<?php include "includes/navbar.php" ?>


<!-- Page Content -->

<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit'])) {


    $username = $_POST['username'];
    $email = $_POST['email'];
    $subject = $_POST['Subject'];
    $body = $_POST['body'];

    require_once "PHPMailer-master/src/PHPMailer.php";
    require_once "PHPMailer-master/src/SMTP.php";
    require_once "PHPMailer-master/src/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "mdzihad2244@gmail.com";
    $mail->Password = 'mdzihad22442211@zihad';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $username);
    $mail->addAddress("mdzihad2244@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if ($mail->send()) {
        echo "Youe Mail Was Sand Wait For Replay . Thank You " . " " . "<a class='btn' href='index.php'>Back</a> ";
    } else {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }










    // $to     = "mdzihad2244@gmail.com";
    // $subject = $_POST['Subject'];
    // $header    = $_POST['email'];
    // $body = wordwrap($_POST['body'], 70);
    // $header = "From:" . $header;
    // // the message

    // if (mail($to, $subject, $body, $header)) {
    //     echo "Yah massease was send";
    // } else {
    //     echo "Not yet";
    // }

    // // use wordwrap() if lines are longer than 70 characters

    // // send email

}



?>


<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="Username" class="sr-only">User name</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Your Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label for="Subject" class="sr-only">Subject</label>
                                <input type="text" name="Subject" id="Subject" class="form-control" placeholder="Enter Your Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="body" class="form-control" id="body" cols="50" rows="10"></textarea>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>
</div>
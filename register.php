<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"></head>
    </head>
    <body>
    <div class="container text-center">

    <form method="post" class="text-center col-6 margin_top form2">
        <img src="logo.png"><br>
        <input type="text" class="form" name="username" placeholder="Enter Username"><br>
        <input type="text" class="form" name="name" placeholder="Enter Name"><br>
        <input type="email" class="form" name="email" placeholder="Enter Email"><br>
        <input type="password" class="form" name="password" placeholder="Enter Password"><br>
        <button type="submit" class="button" name="createAccount">Sign Up</button><br>
        <button type="button" class="button2" id="back">Back</button><br>
        <div class="login_link">
          Have already an account? <a href="Login.php">Login</a>
        </div>
    </form>
    </div>
    </body>
</html>
<script>
    document.getElementById("back").addEventListener("click",function(){
        window.location.replace('login.php');
    });
</script>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    if(isset($_POST['createAccount'])){
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($name) || empty($email) || empty($password)){
        echo "<script>alert('Please complete the details!'); window.location.replace('register.php');</script>";
        return;
        }
        include_once('connection.php');
        $otp = uniqid();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if(mysqli_query($conn,"insert into user_tb(username, name, email, otp, password) values('$username','$name','$email','$otp','$hash')")){
            //Load Composer's autoloader
            require 'vendor/autoload.php';
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug  = SMTP::DEBUG_OFF;
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'webBasedOrdering098@gmail.com'; //from //SMTP username
                $mail->Password   = 'cgzyificorxxdlau';                     //SMTP password
                $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
                $mail->Port       =  465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('webBasedOrdering098@gmail.com', 'webBasedOrdering');
                $mail->addAddress("$email");                                //sent to

                //Content
                $mail->Subject = 'OTP';
                $mail->Body    = $otp;

                $mail->send();
                echo "<script>alert('OTP sent please verify your account first!'); window.location.replace('login.php');</script>";
            }catch (Exception $e) {
                echo "<script>alert('Error: $mail->ErrorInfo');</script>";
            }
        }
        else
        echo '<script type="text/javascript">alert("failed to save to database");window.location.replace("login.php");</script>';

    }
?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
body{
  background-image: url(bg.jpg); /* #ED212D */
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  max-width: 100%;
  width: auto;
  height: auto;
  font-family: 'Josefin Sans', sans-serif;
  color: white;
}
/* Restaurant Logo */
img{
  max-width: 100%;
  height: 10%;
  width: 10%;
}
/* Container form2 */
.form2{
  background: #ED212D;
  position: absolute;
  top: 48%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 15px 50px 15px;
  height: auto;
  border-radius: 15px;
  /* box-shadow: 5px 7px #6b0e13; */
}
/* Username, Name, Email, Password */
.form{
  width: 100%;
  border-radius: 5px;
  border-color: transparent;
  padding: 10px 25px;
  cursor: pointer;
  font-size: 20px;
  margin: 10px 0 0;
}
/* Sign Up and Back Button */
button{
  width: 100%;
  border-radius: 5px;
  border-color: transparent;
  padding: 10px 25px;
  cursor: pointer;
  font-size: 18px;
  margin: 10px 0 0;
}
button:hover{
  border-color: #a6a6a6;
  transition: .2s;
}
/* Back Button */
.button2{
  display: block;
}
/* Login Link */
.login_link{
  font-size: 18px;
}
</style>

<?php


?>

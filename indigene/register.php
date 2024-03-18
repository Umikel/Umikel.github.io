<?php
session_start();
require '../config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mess = ["fname" => "", "lname" => "", "mname" => "", "email" => "", "phone" => "", "answer" => "", "password" => "", "cpassword" => "", "note" => "", "sucess" => "", "lnote" => ""];
$fname = $lname = $mname = $email = $password = $cpassword = $phone = $answer = "";

$sent_message = false;
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $question = $_POST['security'];
    $answer =  strtolower($_POST['answer']);


    // first name validattion
    if (empty($fname)) {
        $mess["fname"] = 'Enter your First Name';
    } else {

        if (!preg_match('/^[a-zA-Z]*$/', $fname)) {
            $mess['fname'] = "First Name: Letters Only!";
        }
    }
    // last first name validattion
    if (empty($lname)) {
        $mess["lname"] = 'Enter your Last Name';
    } else {

        if (!preg_match('/^[a-zA-Z]*$/', $lname)) {
            $mess['lname'] = "Last Name: Letters Only!";
        }
    }
    // answer
    if (empty($answer)) {
        $mess["answer"] = 'please enter your secret answer';
    } else {

        if (!preg_match('/^[a-zA-Z]*$/', $answer)) {
            $mess['answer'] = "answer: Letters Only!";
        }
    }

    // middle first name validattion
    if (!preg_match('/^[a-zA-Z]*$/', $mname)) {
        $mess['mname'] = "Middle Name: Letters Only!";
    }

    // email
    if (empty($email)) {
        $mess['email'] = "Email Is Required!";
    } else {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mess['email']  = "Invalid Email Format!";
        }
    }
    // number

    if (empty($phone)) {
        $mess["phone"] = 'Enter your Phone Number';
    } else {

        if (!preg_match('/^[0-9]*$/', $phone)) {
            $mess['phone'] = "Phone No: Numbers Only!";
        } elseif ($phone < 11) {
            $mess['phone'] = "Phone No: Must be 11 Digit";
        }
    }

    //passord 

    if (empty($password)) {
        $mess['password'] = "Password Required!";
    } elseif (!preg_match('#^[a-zA-z0-9\W]+$#', $password)) {
        $mess['password'] = "Password: Upper/Lowercase Letters, Numbers And Symbols!";
    }

    if (empty($cpassword)) {
        $mess['cpassword'] = "Confirm Password Required!";
    } elseif ($password != $cpassword) {
        $mess['cpassword'] = "Passwords Do Not Match!";
    } else {
        // check the email and phone
        $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");
        $check_number = mysqli_query($conn, "SELECT * FROM users WHERE  phone = '$phone'");
        if (mysqli_num_rows($check_email) > 0) {
            $mess["note"] = "Email has already used";
        } elseif (mysqli_num_rows($check_number) > 0) {
            $mess["note"] = "This Phone Number has already used";
        }
        // iserting nto database
        else {
            $sql = "INSERT INTO users (first_name, last_name, middle_name, email, phone, password, question, answer) VALUES('$fname','$lname','$mname','$email','$phone','$password','$question','$answer')";
            $put = mysqli_query($conn, $sql);

            if ($put === TRUE) {


                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'umarmikel5@gmail.com';
                $mail->Password = 'twvi srjq irnp ykcu';

                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('umarmikel5@gmail.com');

                $mail->addAddress($email);
                $mail->isHTML(true);
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                $mail->Subject = 'Email Verification';
                $mail->Body = '';
                $mail->Body .= "From: UNGOGO LOCAL GOVERNMENT" . "<br/>";
                $mail->Body .= '<h2 style="color:blue; text-align:center">UNGOGO LOCAL GOVERNMENT AREA</h2>' . "\r\n";
                $mail->Body .= '<h2>Email Verification for Ungogo Local Government Indigeneship</h2>' . "\r\n";
                $mail->Body .= "<p>Dear, " . $fname . " you have sucussful created an account for Ungogo Local 
                Government Indigeneship, follow the link below to verify your account. </p><br/>";
                $mail->Body .= "<a href='http://localhost/ungogo/indigene/verified_email.php?verified=$email'> Click Here to verify</a>";

                $mail->send($headers);

                $fname = $lname = $mname = $email = $password = $cpassword = $phone = $answer = "";
                $sent_message = true;
            } else {
                $mess["note"] = "Error to sign up: " . $conn->error;
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo 1.jfif">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../sytles.css">
    <title>Sign Up</title>
</head>

<body>

    <style>
        #noo {
            text-decoration: none;
        }

        a {
            text-decoration: none;
        }
    </style>

    <div class="loader">
        <div class="aminate">
            <h1 class="h1 p-4">Loading</h1>
            <img src="../images/logo 1.jfif" alt="">
        </div>
    </div>
    <section id="unpage">
        <div class="container-fluid p-1 bg-primary" id="spo">
            <p class="mt-0 text-light "><strong>contact us:</strong>
                <a href="mailto:ungogolga@gmail.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi text-light bi-chat-right-dots" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>

                </a>
            </p>
        </div>

        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top nav-underline rounded" aria-label="Thirteenth navbar example">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                    <a class="navbar-brand col-lg-3  text-center me-0" href="#">
                        <p class="go1">Ungogo Local <br>Government</p>
                    </a>
                    <ul class="navbar-nav col-lg-7 justify-content-lg-center">
                        <li class="nav-item">
                            <a class="nav-link fw-bold  text-primary" href="../index.php" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold  text-primary" href="../The chairman/chairman.html">The Chairman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold active text-primary" href="../indigene/indigene.php">Indigene</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../scholarship/scholarship.html">Scholarship</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../news/news.html">News & Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../Staff/Staff.php">Staff Portal</a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle fw-bold text-primary" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About us</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-primary" href="../ungogo/history.html">History of Ugg</a>
                                <a class="dropdown-item text-primary" href="../ungogo/wards.html">wards in ungogo</a>

                            </ul>
                        </li>
                    </ul>
                    <div class="d-inline-block col-lg-2 justify-content-lg-end">
                        <img src="../images/logo 1.jfif" class="img-fluid" width="60px" height="50" class="d-inline-block align-text-top">
                    </div>
                </div>
            </div>
            </div>
        </nav>


        <div class="row justify-content-center g-0 m-3 border rounded ">

            <nav>
                <div class="nav nav-tabs m-3" id="nav-tab" role="tablist">
                    <a href="indigene.php"><button class="nav-link " id="nav-home-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Registration Procedure</button></a>
                    <a href="register.php"><button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Register</button></a>
                    <a href="login.php"> <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Login</button></a>
                </div>
            </nav>
            <?php
            if ($sent_message) { ?>
                <div class="col-sm-8 p-5 rounded shadow">
                    <div class="row mt-5 ">
                        <h2 class="text-center text-primary">Registration Sucessful</h2>
                        <p class="text-center"> Dear, <?php echo $_POST['fname'] ?> you have sucessful created an account <br />
                            We sent the mail link to <?php echo $_POST['email'] ?> Check, for account verification </p>
                    </div>
                </div>





            <?php } else {
            ?>
                <div class="col-sm-8 p-3 rounded shadow">
                    <div class="row mt-5">
                        <h4 class="text-center text-primary"><i>Sign Up</i></h4>
                        <small class="text-danger text-center"><?php echo $mess['note'] ?></small>
                        <p class="text-light bg-danger rounded text-center"><?php echo $mess['sucess'] ?></p>
                        <div class="col-sm-4">
                            <form action="register.php" method="post" enctype="multipart/form-data">
                                <div class="form-floating">
                                    <input type="text" class="form-control text-center form-control-sm" placeholder="umar" name="fname" value="<?php echo $fname ?>">
                                    <label for="">First Name <b id="rew">*</b></label>
                                    <small class="text-danger text-center"><?php echo $mess['fname'] ?></small>
                                </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-floating">
                                <input type="text" class="form-control text-center form-control-sm" placeholder="surname" name="lname" value="<?php echo $lname ?>">
                                <label for="">Last Name <b id="rew">*</b></label>
                                <small class="text-danger text-center"><?php echo $mess['lname'] ?></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-floating">
                                <input type="text" class="form-control text-center form-control-sm" placeholder="middle" name="mname" value="<?php echo $mname ?>">
                                <label for="">Middle Name</label>
                                <small class="text-danger text-center"><?php echo $mess['mname'] ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <div class="form-floating">
                                <input type="email" class="form-control text-center form-control-sm" placeholder="email" name="email" value="<?php echo $email ?>">
                                <label for="">Email <b id="rew">*</b></label>
                                <small class="text-danger text-center"><?php echo $mess['email'] ?></small>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="form-floating">
                                <input type="tel" class="form-control text-center form-control-sm" placeholder="phone" name="phone" value="<?php echo $phone ?>">
                                <label for="">Phone No <b id="rew">*</b></label>
                                <small class="text-danger text-center"><?php echo $mess['phone'] ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control text-center form-control-sm" placeholder="password" name="password" value="<?php echo $password ?>">
                                <label for="">Password <b id="rew">*</b></label>
                                <small class="text-danger text-center"><?php echo $mess['password'] ?></small>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control text-center form-control-sm" placeholder="comfim" name="cpassword" value="<?php echo $cpassword ?>">
                                <label for="">Comfirm Password <b id="rew">*</b></label>
                                <small class="text-danger text-center"><?php echo $mess['cpassword'] ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mt-3">

                            <label for="">Security question<b id="rew">*</b>
                                <select class="form-select form-select form-control" name="security" id="" value="<?php ?>">
                                    <option value="What is your mother maiden name?">What is your mother maiden name? </option>
                                    <option value="What is your favorite movie?">What is your favorite movie?</option>
                                    <option value="What was your favorite sport in high school?">What was your favorite sport in high school?</option>
                                    <option value="What city were you born in?">What city were you born in?</option>

                                </select>

                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control text-center form-control-sm" placeholder="answer" name="answer" value="<?php echo $answer ?>">
                                <label for="">Answer <b id="rew">*</b></label>
                                <small class="text-danger text-center"><?php echo $mess['answer'] ?></small>
                            </div>
                        </div>
                    </div>
                    <center><button class="btn btn-primary mb-5 mt-4" name="submit" id="lo">Sign Up</button></center>
                    <p class="text-center"> <a id="noo" href="login.php"><span id="del">Already have An Account? </span>Login Here</a></p>

                    </form>
                </div>
        </div>
        </div>


        </div>

        <div class="row justify-content-center rounded g-0 text-center bg-primary text-light p-3 m-3">
            <div class="col-sm-4 p-3">
                <h3>Contact</h3>
                <hr>
                <p class="text-start" id="done"><img src="../images/new map.svg" class="img-fluid" alt="">Ungogo, Kano State Nigeria.</p>
                <p class="text-start" id="done"><img src="../images/phone.png" class="img-fluid" alt=""> 234 906 480 9729</p>
                <p class="text-start" id="done"><img src="../images/EMAIL.png" class="img-fluid" alt=""> ungogolga@gmail.com</p>
            </div>
            <div class="col-sm-4 p-3">
                <h3>Connect with us</h3>
                <hr>
                <a href="https://www.facebook.com/UngogoLocalGovernment" target="_blank"><img src="../images/facebook.svg" class="img-fluid" alt=""></a>
                <a href="https://www.twitter.com/Engr_Ramat" target="_blank"><img src="../images/twitter.svg" class="img-fluid" alt=""></a><br>
                <a href="https://www.linkedin.com" target="_blank"><img src="../images/linked.svg" class="img-fluid" alt=""></a>
                <a href="https://www.youtube.com" target="_blank"><img src="../images/youtube.svg" class="img-fluid" alt=""></a>
            </div>
            <div class="col-sm-4 p-3">
                <h3>Usefull Links</h3>
                <hr>
                <ul class="list-group text-start">
                    <a href="https://www.kanostate.gov.ng" target="_blank" id="done">
                        <li class="list-group-item active">Kano state portal</li>
                    </a>
                    <a href="https://www.kanoemirate.org/" target="_blank" id="done">
                        <li class="list-group-item active">Kano Emirate</li>
                    </a>
                    <a href="https://www.npf.gov.ng/" target="_blank" id="done">
                        <li class="list-group-item active">Nigerian police force</li>
                    </a>
                    <a href="" id="done">
                        <li class="list-group-item active">Ramat Foundation</li>
                    </a>

                </ul>
            </div>
        </div>
        <div class="container-fluid text-light text-center bg-secondary p-3">
            Copyright 2023 © | Powered by Ramat Scholar
        </div>
    </section>
<?php } ?>
<script>
    var loader = document.querySelector(".loader")
    var unpage = document.querySelector("#unpage")
    window.addEventListener("load", () => {
        loader.classList.add("hidden");
        unpage.classList.add("visible")
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
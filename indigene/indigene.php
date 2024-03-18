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
                $mess["sucess"] = "<div class='modal-dialog modal-dialog-centered'>
                You Have been Sign up you can now Login
              </div> ";
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'umarmikel5@gmail.com';
                $mail->Password = 'twvi srjq irnp ykcu';

                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('umarmikel5@gmail.com');

                $mail->addAddress('umarmikel@gmail.com');
                $mail->isHTML(true);

                $mail->Subject = 'Email Verification';
                $mail->Body = 'click here to verify your email';
                $mail->send();
                $fname = $lname = $mname = $email = $password = $cpassword = $phone = $answer = "";
            } else {
                $mess["note"] = "Error to sign up: " . $conn->error;
            }
        }
    }
}
if (isset($_POST["llogin"])) {
    $lemail = $_POST["lemail"];
    $lpassword = $_POST["lpassword"];


    $sqlp = "SELECT * FROM users WHERE email = '$lemail' AND password = '$lpassword' ";
    $result = mysqli_query($conn, $sqlp);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['lemail'] = $lemail;
        header("Location: user_dashboard.php");
        exit();
    } else {
        $mess["lnote"] = "invail Login Details";
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
    <title>Indigene Registraton</title>
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
            <!-- <div class="col-sm-4 p-3 ">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h4 class="accordion-header">
                            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Registraton Procedure
                            </button>
                        </h4>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ol>
                                    <li id="done0">Clink On <b>Start Register.</b> </li>
                                    <li id="done0">Fill the Form and <b>submit.</b></li>
                                    <li id="done0">After submit the form clink on <b>"Pay 3,000 Certificate Fee".</b></li>
                                    <li id="done0">Make a Payment through ATM/Bank Transfer.</li>
                                    <li id="done0">After Sucessfull payment then back to the portal & <b>"click Print Acknowledment Slip.</b></li>
                                    <li id="done0">Print / Download the Acknowledment Slip.</li>
                                    <li id="done0">Process to the Local Government Secretariat for collection the Certificate.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h4 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Accordion Item #2
                            </button>
                        </h4>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-center text-primary">Registraton Procedure</h3>
            <hr>
            <ol>
                <li id="done0">Clink On <b>Start Register.</b> </li>
                <li id="done0">Fill the Form and <b>submit.</b></li>
                <li id="done0">After submit the form clink on <b>"Pay 3,000 Certificate Fee".</b></li>
                <li id="done0">Make a Payment through ATM/Bank Transfer.</li>
                <li id="done0">After Sucessfull payment then back to the portal & <b>"click Print Acknowledment Slip.</b></li>
                <li id="done0">Print / Download the Acknowledment Slip.</li>
                <li id="done0">Process to the Local Government Secretariat for collection the Certificate.</li>
            </ol>
            <h3 class="text-primary text-center">PDF Form Tamplate</h3>
            <p id="done0">You can also download/print the form template filled it and visit nearest internet cafe for online Registration.</p>
            <center><a id="lo" class="btn btn-primary mb-2" href="template.pdf">Download PDF Form</a></center> 
            </div>
            <div class="col-sm-4 p-3 border-end">
                <p class="text-light bg-danger rounded text-center"><?php echo $mess['sucess'] ?></p>

                <div class="row mt-5">
                    <h4 class="text-center text-primary"><i>Sign Up</i></h4>
                    <small class="text-danger text-center"><?php echo $mess['note'] ?></small>
                    <div class="col-sm-4">
                        <form action="indigene.php" method="post" enctype="multipart/form-data">
                            <div class="form-floating">
                                <input type="text" class="form-control text-center form-control-sm" placeholder="umar" name="fname" value="<?php echo $fname ?>">
                                <label for="">First Name </label>
                                <small class="text-danger text-center"><?php echo $mess['fname'] ?></small>
                            </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-floating">
                            <input type="text" class="form-control text-center form-control-sm" placeholder="surname" name="lname" value="<?php echo $lname ?>">
                            <label for="">Last Name </label>
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
                    <div class="col-sm-6">
                        <label for="">Phone No <b id="rew">*</b></label>
                        <input type="tel" class="form-control text-center form-control-sm" name="phone" value="<?php echo $phone ?>">
                        <small class="text-danger text-center"><?php echo $mess['phone'] ?></small>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Password <b id="rew">*</b></label>
                        <input type="text" class="form-control text-center form-control-sm" name="password" value="<?php echo $password ?>">
                        <small class="text-danger text-center"><?php echo $mess['password'] ?></small>

                    </div>
                    <div class="col-sm-6">
                        <label for="">Comfirm Password <b id="rew">*</b></label>
                        <input type="text" class="form-control text-center form-control-sm" name="cpassword" value="<?php echo $cpassword ?>">
                        <small class="text-danger text-center"><?php echo $mess['cpassword'] ?></small>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Security question<b id="rew">*</b>

                            <select class="form-select form-select-sm form-control" name="security" id="" value="<?php ?>">
                                <option value="What is your mother maiden name?">What is your mother maiden name? </option>
                                <option value="What is your favorite movie?">What is your favorite movie?</option>
                                <option value="What was your favorite sport in high school?">What was your favorite sport in high school?</option>
                                <option value="What city were you born in?">What city were you born in?</option>

                            </select>

                    </div>
                    <div class="col-sm-6">
                        <label for="">Answer <b id="rew">*</b></label>
                        <input type="text" class="form-control text-center form-control-sm" name="answer" value="<?php echo $answer ?>">
                        <small class="text-danger text-center"><?php echo $mess['answer'] ?></small>

                    </div>
                </div>
                <center><button class="btn btn-primary mb-5 mt-2" name="submit" id="lo">Sign Up</button></center>

                </form>
            </div>
            <div class="col-sm-4 border rounded p-1 text-center   ">
                <div class="col-sm-12 p-5 text-center">
                    <h4 class="text-primary">Login Details </h4>
                    <small class="text-danger text-center"><?php echo $mess['lnote'] ?></small>
                    <div class="mb-1 ">
                        <form action="indigene.php" method="post" enctype="multipart/form-data">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="lemail" id="" class="form-control text-center" placeholder="example@gmail.com" required>
                    </div>
                    <div class="mb-1 ">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="lpassword" id="" class="form-control text-center" required>
                    </div>
                    <button class="btn btn-primary mb-5 mt-2" name="llogin" id="lo">Login</button>
                    <p><a id="noo" href="forgot_p.php"><span id="del">Forgot Your Password? </span>Click Here To Reset It</a></p>
                    </form>

                </div>
            </div>

-->
            <nav>
                <div class="nav nav-tabs m-3" id="nav-tab" role="tablist">
                    <a href="indigene.php"><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Indigeneship Portal</button></a>
                    <a href="register.php"><button class="nav-link" id="nav-profile-tab" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Register</button></a>
                    <a href="login.php"><button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Login</button></a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class=" row tab-pane fade show active m-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row justify-content-center g-0 ">
                        <div class="col-sm-4  p-3">
                            <h4 class="h4 mb-3 text-primary text-center"> Registration Procedure</h4>


                            <p class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-primary bi-1-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M9.283 4.002H7.971L6.072 5.385v1.271l1.834-1.318h.065V12h1.312z" />
                                </svg> Click on <a href="register.php"> Register.</a>
                            </p>
                            <p class=" mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-primary bi-2-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.646 6.24c0-.691.493-1.306 1.336-1.306.756 0 1.313.492 1.313 1.236 0 .697-.469 1.23-.902 1.705l-2.971 3.293V12h5.344v-1.107H7.268v-.077l1.974-2.22.096-.107c.688-.763 1.287-1.428 1.287-2.43 0-1.266-1.031-2.215-2.613-2.215-1.758 0-2.637 1.19-2.637 2.402v.065h1.271v-.07Z" />
                                </svg> Enter your details to create an account.
                            </p>
                            <p class=" mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-primary bi-3-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-8.082.414c.92 0 1.535.54 1.541 1.318.012.791-.615 1.36-1.588 1.354-.861-.006-1.482-.469-1.54-1.066H5.104c.047 1.177 1.05 2.144 2.754 2.144 1.653 0 2.954-.937 2.93-2.396-.023-1.278-1.031-1.846-1.734-1.916v-.07c.597-.1 1.505-.739 1.482-1.876-.03-1.177-1.043-2.074-2.637-2.062-1.675.006-2.59.984-2.625 2.12h1.248c.036-.556.557-1.054 1.348-1.054.785 0 1.348.486 1.348 1.195.006.715-.563 1.237-1.342 1.237h-.838v1.072h.879Z" />
                                </svg> Check your registered email address for verification link.</p>
                            <p class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-primary bi-4-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M7.519 5.057c-.886 1.418-1.772 2.838-2.542 4.265v1.12H8.85V12h1.26v-1.559h1.007V9.334H10.11V4.002H8.176zM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218" />
                                </svg> After email verification, click on <a href="login.php">Login</a> to log into your dashboard.</p>
                            <p class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-primary bi-5-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-8.006 4.158c1.74 0 2.924-1.119 2.924-2.806 0-1.641-1.178-2.584-2.56-2.584-.897 0-1.442.421-1.612.68h-.064l.193-2.344h3.621V4.002H5.791L5.445 8.63h1.149c.193-.358.668-.809 1.435-.809.85 0 1.582.604 1.582 1.57 0 1.085-.779 1.682-1.57 1.682-.697 0-1.389-.31-1.53-1.031H5.276c.065 1.213 1.149 2.115 2.72 2.115Z" />
                                </svg> Upload your passport <strong>Note:</strong><small> Passport width is not greathan 150px and height is greathan 200px </small> .</p>
                            <p class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-primary bi-6-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.21 3.855c-1.868 0-3.116 1.395-3.116 4.407 0 1.183.228 2.039.597 2.642.569.926 1.477 1.254 2.409 1.254 1.629 0 2.847-1.013 2.847-2.783 0-1.676-1.254-2.555-2.508-2.555-1.125 0-1.752.61-1.98 1.155h-.082c-.012-1.946.727-3.036 1.805-3.036.802 0 1.213.457 1.312.815h1.29c-.06-.908-.962-1.899-2.573-1.899Zm-.099 4.008c-.92 0-1.564.65-1.564 1.576 0 1.032.703 1.635 1.558 1.635.868 0 1.553-.533 1.553-1.629 0-1.06-.744-1.582-1.547-1.582" />
                                </svg> Update your details</p>
                            <p class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-primary bi-7-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.37 5.11h3.972v.07L6.025 12H7.42l3.258-6.85V4.002H5.369v1.107Z" />
                                </svg> Payment for certificate fee</p>
                            <p class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-primary bi-8-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-5.03 1.803c0-1.248-.943-1.84-1.646-1.992v-.065c.598-.187 1.336-.72 1.336-1.781 0-1.225-1.084-2.121-2.654-2.121s-2.66.896-2.66 2.12c0 1.044.709 1.589 1.33 1.782v.065c-.697.152-1.647.732-1.647 2.003 0 1.39 1.19 2.344 2.953 2.344 1.77 0 2.989-.96 2.989-2.355Zm-4.347-3.71c0 .739.586 1.255 1.383 1.255s1.377-.516 1.377-1.254c0-.733-.58-1.23-1.377-1.23s-1.383.497-1.383 1.23Zm-.281 3.645c0 .838.72 1.412 1.664 1.412.943 0 1.658-.574 1.658-1.412 0-.843-.715-1.424-1.658-1.424-.944 0-1.664.58-1.664 1.424" />
                                </svg> After approved by Ungogo LG Print your Indigeneship Certificate </p>
                            </ol>

                        </div>
                        <div class="col-sm-4  ">

                            <h3 class="text-primary text-center">PDF Form Tamplate</h3>
                            <p id="done0">You can also download/print the form template filled it and visit nearest internet cafe for online Registration.</p>
                            <center><a id="lo" class="btn btn-primary mb-2" href="template.pdf">Download<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-light bi-file-earmark-pdf" viewBox="0 0 16 16">
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                        <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z" />
                                    </svg></a></center>
                        </div>
                        <div class="col-sm-4 p-3 border-start">
                            <h4 class="h4 text-center mb-3 text-primary"> Check Indigene Record</h4>
                            <div class="form-floating">
                                <input type="text" class="form-control text-center form-control-sm" placeholder="email" name="lemail">
                                <label for="">Enter Your Indigene Number </label>
                            </div>
                            <center> <button class="btn btn-primary mb-5 mt-2 text-center" name="llogin" id="lo">Check</button></center>

                        </div>
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
    <script>
        var loader = document.querySelector(".loader")
        var unpage = document.querySelector("#unpage")
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
            unpage.classList.add("visible")
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
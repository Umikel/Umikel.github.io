<?php
session_start();
require '../config.php';
$mess = ['email' => '', 'note' => '', 'answer' => ''];
$email = '';

if (!isset($_SESSION['email'])) {
    header("Location: indigene.php");
    exit();
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$req = mysqli_query($conn, $sql);
if (mysqli_num_rows($req) > 0) {
    $result = mysqli_fetch_assoc($req);
    $question = $result["question"];
    $answer =  $result['answer'];
}
if (isset($_POST["submit"])) {
    $t_answer = strtolower($_POST["answer"]);
    if (empty($t_answer)) {
        $mess["answer"] = 'please enter your secret answer';
    } else {

        if (!preg_match('/^[a-zA-Z]*$/', $t_answer)) {
            $mess['answer'] = "answer: Letters Only!";
        } else {
            if ($answer == $t_answer) {
                header("Location: update_pass.php");
            } else {
                $mess["note"] = 'Your answer does not match';
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
    <title>Indigene Registraton</title>
</head>

<body>
    <style>
        #noo {
            text-decoration: none;
        }
    </style>
    <div class="container-fluid p-1 bg-primary" id="spo">
        <p class="mt-0 text-light "><strong>contact us:</strong>
            <a href="mailto:ungogolga@gmail.com"><img src="../images/EMAIL.png" class="img-fluid" alt=""></a>

        </p>
    </div>
    <div class="container-fluid text-center bg-light p-2 text-primary">

        <h1 class="go1">Ungogo Local Government Portal</h1>

    </div>
    </div>
    <nav class="navbar navbar-expand-sm navbar-light bg-white shadow mb-1 sticky-top">
        <div class="container">

            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php" aria-current="page" id="nodi"><strong>Home </strong><span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../The chairman/chairman.html" id="nodi" aria-current="page"><strong>The Chairman</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="active" href="#"><strong>Indigene</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nodi" href="../scholarship/scholarship.html"><strong>Scholarship</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nodi" href="../news/news.html"><strong>News & Event</strong></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="nodi" href="../Staff/Staff.php"><strong>Staff Portal</strong></a>
                    </li>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="nodi" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>About us</strong></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" id="nodi" href="../ungogo/history.html">History of Ugg</a>
                            <a class="dropdown-item" id="nodi" href="../ungogo/wards.html">wards in ungogo</a>

                        </div>
                    </li>
                </ul>
                <img src="../images/logo 1.jfif" class="img-fluid" width="60px" height="50" class="d-inline-block align-text-top">
            </div>
        </div>
    </nav>
    <div class="row justify-content-center g-0 p-3">

        <div class="col-sm-4 p-3 ">
            <h3 class="text-center text-primary">Forgot Password</h3>

            <hr>
            <div class="row mt-5">
                <form action="true.php" method="post" enctype="multipart/form-data">
                    <p class="text-light bg-danger rounded text-center"><?php echo $mess['note'] ?></p>


                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Your security question <b id="rew">*</b></label>
                            <input type="email" class="form-control text-center form-control-sm" name="email" disabled readonly value="<?php echo $question ?>">

                        </div>
                        <div class="col-sm-12">
                            <label for="">Enter your answer that you choose during creating account <b id="rew">*</b></label>
                            <input type="text" class="form-control text-center form-control-sm" name="answer" value="">
                            <small class="text-danger text-center"><?php echo $mess['answer'] ?></small>


                        </div>

                    </div>
                    <center><button class="btn btn-primary mb-5 mt-2" name="submit" id="lo">Forget my password</button></center>

                </form>
            </div>

        </div>



    </div>

    <div class="row justify-content-center  g-0 text-center bg-primary text-light" id="foo">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
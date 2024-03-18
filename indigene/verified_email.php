<?php
session_start();

require '../config.php';
if (!$_GET["verified"]) {
    header("location: indigene.php");
} else {
    $email = $_GET["verified"];
}
$sql = "UPDATE users SET status = 'verified' WHERE email = '$email'";
$do_sql = mysqli_query($conn, $sql);
if ($do_sql) {
    $mess = 'you have sucessful verified email address, you can now log in to your account';
} else {
    $mess = 'you email does not verified yet';
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
            <div class="col-sm-8 p-5 rounded shadow">
                <div class="row mt-5 ">
                    <h2 class="text-center text-primary">Your Email Has Been Verified</h2>
                    <p class="text-center"> <?php echo $mess ?> </p>
                    <center> <button class="btn btn-primary mb-5 mt-2 text-center" id="lo">Back to Login</button>

                </div>
            </div>



            \

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
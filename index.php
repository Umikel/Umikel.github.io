<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo 1.jfif">
    <link rel="stylesheet" href="sytles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Ungogo Local Government</title>
</head>

<body>
    <style>



    </style>
    <div class="loader">
        <div class="aminate">
            <h1 class="h1 p-4">Loading</h1>
            <img src="images/logo 1.jfif" alt="">
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
                            <a class="nav-link fw-bold active text-primary" href="index.php" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="The chairman/chairman.html">The Chairman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="indigene/indigene.php">Indigene</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="scholarship/scholarship.html">Scholarship</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="news/news.html">News & Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="Staff/Staff.php">Staff Portal</a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle fw-bold text-primary" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About us</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-primary" href="ungogo/history.html">History of Ugg</a>
                                <a class="dropdown-item text-primary" href="ungogo/wards.html">wards in ungogo</a>

                            </ul>
                        </li>
                    </ul>
                    <div class="d-inline-block col-lg-2 justify-content-lg-end">
                        <img src="images/logo 1.jfif" class="img-fluid" width="60px" height="50" class="d-inline-block align-text-top">
                    </div>
                </div>
            </div>
            </div>
        </nav>

        <div id="carouselId" class="carousel slide m-3" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <l data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></l>
                <l data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></l>
                <l data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></l>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" data-bs-interval="4000">
                    <div class="text rounded">
                        <h1>The Chairman</h1>
                        <p>Engr Dr. Ramat</p>
                    </div>
                    <img src="images/ramat.jpg" class="w-100 d-block tales" alt="First slide">


                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/ungogo logo.jpg" class="w-100 d-block tales" alt="Second slide">

                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/mosque.jpg" class="w-100 d-block tales" alt="Third slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row justify-content-center align-items-center p-3 border kiki  m-3 rounded g-0 shadow">

            <div class="col-sm-7 text-break p-4 ">
                <div class="container-fluid text-center text-primary rounded ">
                    <h2>Welcome To Ungogo</h2>
                </div>
                <hr>

                <p class="go">Ungogo is one of the Local Government Area in kano state, Its Secretariat are in the town of Ungogo to the
                    north of the city of Kano.It has an area of 204 km2 and a population of 369,657 at the 2006 census.
                    The area’s populace made up of members of the Hausa/Fulani ethnic sub division. The Hausa language is
                    commonly spoken in the LGA while the religion of Islam is extensively practiced in the area.</p>
                <p class="go"> Notable
                    landmarks in Ungogo LGA include the Dausara Primary Health Care Center. The postal code of the area is 700105.
                    Ungogo LGA sits on a total area of 204 square kilometres and has an average temperature of 33 degrees centigrade.
                    The LGA witnesses two major seasons which are the dry and the rainy seasons with average humidity levels in the
                    area put at 28 percent.</p>
            </div>
            <div class="col-sm-5 p-2">
                <img class="img-fluid rounded " src="images/student (1).jpg" alt="">
            </div>
        </div>
        <div class="container-fluid text-center text-primary rounded p-2">
            <h2>News & Updates</h2>
        </div>
        <div class="row justify-content-center  text-center g-0 kiki border m-3 p-3 shadow">
            <div class="col-sm-3  rounded ">
                <a href="#"><img src="images/news1.JPG" class="img-fluid rounded" id="set" alt=""></a>
                <h5 class="h5 p-3" id="done">Chairman Engr.Dr Ramat sponsors
                    20 Students to study IT programmes at Lincoln University, Malaysia.</h6>
                    <small> Date: 23-February-2024</small>
            </div>
            <div class="col-sm-3 m-2 rounded ">
                <a href="#"><img src="images/student (1).jpg" class="img-fluid rounded" id="set" alt=""></a>
                <h5 class="h5 p-3" id="done">Rummawa Primary School project has reached its
                    completion phase.</h6>
                    <small> Date: 23-February-2024</small>

            </div>
            <div class="col-sm-3 m-2 rounded ">
                <a href="#"><img src="images/fam.jpeg" class="img-fluid rounded" id="set" alt=""></a>
                <h5 class="h5 p-3" id="done">Hundreds of farmers from ungogo LGA benefit from farmers program</h6>
                    <small> Date: 23-February-2024</small>

            </div>
            <div class="col-sm-2 m-1 p-1 rounded border shadow">
                <h5 class="h5 text-primary">Announcements</h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="text-primary bi bi-bell-fill" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                </svg>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Degree Scholarship for indigene of Ungogo </li>
                    <li class="list-group-item">You can get your ungogo indigeneship now online</li>

                </ul>
            </div>

            <div class="container-fluid text-center p-2">
                <a class="btn btn-primary" id="lo" href="news/news.html">Read More</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center kiki do g-0 text-center border m-3 p-3 shadow">
            <div class="col-sm-7 p-3  ">
                <h1 class="h1 text-primary p-3 gg" id="con">

                </h1>
                <h4 class="h4 gg">You can now get your Ungogo indigeneship certificate <br> online without going anywhere </h4>
                <p>Yes !! you can get your Ungogo Local Government indigeneship online </p>
                <a name="" id="lo" class="btn btn-primary" href="indigene/indigene.php" role="button">Apply for indigeneship</a>

            </div>
            <div class="col-sm-1 p-3  ">
                <svg id="ps" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi text-primary bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                </svg>

            </div>
            <div class="col-sm-4 p-3  ">
                <img id="ami" src="images/certificate.jpg" class="img-fluid " id="set" alt="">
            </div>

        </div>
        <div class="row justify-content-center align-items-center kiki do g-0 text-center border m-3 p-1 shadow">
            <div class="col-sm-7 p-3  ">
                <h1 class="h1 text-primary">Subscribe to our Bulletin for updates on news and event</h1>
            </div>

            <div class="col-sm-4 p-5 border rounded shadow ">
                <h4>Subscribe to our newsletter</h4>
                <p>Subscribe to our newsletter for regular updates about ungogo local government </p>
                <label for="">Email </label>
                <input type="email" class="form-control text-center form-control-sm" name="email">
                <center><button class="btn btn-primary mb-5 mt-2" name="submit" id="lo">Subcribe Now</button></center>


            </div>


        </div>

        <div class="row justify-content-center rounded g-0 text-center bg-primary text-light border m-3 p-3 shadow">
            <div class="col-sm-4 p-3">
                <h3>Contact</h3>
                <hr>
                <p class="text-start" id="done"><img src="images/new map.svg" class="img-fluid" alt="">Ungogo, Kano State Nigeria.</p>
                <p class="text-start" id="done"><img src="images/phone.png" class="img-fluid" alt=""> 234 906 480 9729</p>
                <p class="text-start" id="done"><img src="images/EMAIL.png" class="img-fluid" alt=""> ungogolga@gmail.com</p>
            </div>
            <div class="col-sm-4 p-3">
                <h3>Connect with us</h3>
                <hr>
                <a href="https://www.facebook.com/UngogoLocalGovernment" target="_blank"><img src="images/facebook.svg" class="img-fluid" alt=""></a>
                <a href="https://www.twitter.com/Engr_Ramat" target="_blank"><img src="images/twitter.svg" class="img-fluid" alt=""></a><br>
                <a href="https://www.linkedin.com" target="_blank"><img src="images/linked.svg" class="img-fluid" alt=""></a>
                <a href="https://www.youtube.com" target="_blank"><img src="images/youtube.svg" class="img-fluid" alt=""></a>
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
            Copyright <?php echo date('Y') ?> © | Powered by Ramat Scholar
        </div>
    </section>
    <script>
        const conte = document.querySelector("#con");
        const car = ["You Know What ???", "Guess What ???", "Now It is Easy for you !!!"];
        let carindex = 0;
        let charindex = 0;

        function undatetext() {
            charindex++
            conte.innerHTML = ` ${car[carindex]}`;

            if (charindex === car[carindex].length) {
                carindex++
                charindex = 0
            }
            if (carindex === car.length) {
                carindex = 0
            }
            setTimeout(undatetext, 100);
        }
        undatetext()

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
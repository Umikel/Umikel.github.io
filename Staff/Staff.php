<?php
require '../config.php';
session_start();
$mess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Form validation and hashing here

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $mess = "Invalid username or password.";
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
    <title>Staff portal</title>
</head>

<body>
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
                            <a class="nav-link fw-bold  text-primary" href="../indigene/indigene.php">Indigene</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../scholarship/scholarship.html">Scholarship</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="../news/news.html">News & Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold active text-primary" href="../Staff/Staff.php">Staff Portal</a>
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


        <div class="row justify-content-center align-items-center g-0 p-2 mt-5 mb-5 rounded">
            <div class="col-sm-5 p-5 kiki text-center rounded b-3">
                <h4>Staff Login </h4>
                <hr>
                <p class='text-danger'><?php echo $mess ?></p>
                <form action="staff.php" method="post">
                    <div class="mb-1 ">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" id="" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3 ">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="" required>

                    </div>
                    <button class="btn btn-primary" id="lo">Sign In</button>
            </div>

        </div>
        </form>
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
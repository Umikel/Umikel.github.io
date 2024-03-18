<?php
require '../config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: staff.php");
    exit();
}
$mess = "";
$username = $_SESSION['username'];

$sql = "SELECT * FROM admin WHERE username = '$username'";
$result_user = $conn->query($sql);

if ($result_user->num_rows > 0) {
    $row_user = $result_user->fetch_assoc();
    $full_name = $row_user['full_name'];
    $profile_pic = $row_user['profile_pic'];
    $role = $row_user['role'];
    $id = $row_user['id'];
} else {
    echo "Error fetching user details: " . $conn->error;
    exit();
}

$another =  mysqli_query($conn, "SELECT * FROM payment ");
if ($another) {
    $another2 = count(mysqli_fetch_all($another));
}

$name = mysqli_query($conn, "SELECT * FROM users_records
INNER JOIN payment ON users_records.user_id = payment.user_id LIMIT 6");








?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo 1.jfif">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../sytles.css">
    <title>Admin</title>
</head>

<body>
    <style>
        #prof {
            width: 40%;
            height: 15vh;
            border-radius: 100px;
        }

        #nod {
            font-family: Bahnschrift Light;
            font-size: 110%;
            background-color: rgba(0, 0, 255, 0.74);
            color: white;
        }

        #nod:hover {

            background-color: black;
            color: black;
        }

        @media only screen and (min-width:768px) {
            #prof {
                width: 45%;
                height: 20vh;
                border-radius: 100px;
                margin-bottom: 3vh;
            }

            #nod:hover {

                background-color: black;
                color: black;
            }

            #nod {
                font-family: Bahnschrift Light;
                font-size: 110%;
                background-color: rgba(0, 0, 255, 0.74);
                color: white;
            }

            #nodo {
                font-family: Bahnschrift Light;
                font-size: 110%;
                background-color: rgba(15, 15, 37, 0.74);
                color: white;
            }

        }
    </style>


    <nav class="navbar navbar-expand-sm navbar-light bg-white mb-1 sticky-top">
        <div class="container">

            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                </ul>

                <h5 class="m-2 "><?php echo $_SESSION['username'] ?></h5> <a class="nav-link text-danger" id="nood" href="logout.php"><strong>Logout</strong></a>
            </div>
        </div>
    </nav>
    <div class="row justify-content-center g-0   m-3">
        <div class="col-sm-3 p-3 d-sticky  flex-column flex-shrink-0 kiki rounded shadow ">
            <center><img id="prof" src="../image/<?php echo $profile_pic ?>" class="img-fluid " alt="Profile Pic" /> </center>
            <h5 class="text-center"><?php echo $full_name ?></h5>
            <h5 class="text-center">Ung/Adm/<?php echo $id ?></h5>
            <h5 class="text-center"><?php echo $role ?></h5>
            <ul class="nav nav-pills flex-column mb-auto">

                <li class="nav-item">
                    <a href="Dashboard.php" class="nav-link active bg-primary text-light" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                            <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                            <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="pending_payment.php" class="nav-link text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                        </svg>
                        Pending Payment
                    </a>
                </li>
                <li>
                    <a href="update_details.php" class="nav-link text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M16.519 16.501c.175-.136.334-.295.651-.612l3.957-3.958c.096-.095.052-.26-.075-.305a4.332 4.332 0 0 1-1.644-1.034a4.332 4.332 0 0 1-1.034-1.644c-.045-.127-.21-.171-.305-.075L14.11 12.83c-.317.317-.476.476-.612.651c-.161.207-.3.43-.412.666c-.095.2-.166.414-.308.84l-.184.55l-.292.875l-.273.82a.584.584 0 0 0 .738.738l.82-.273l.875-.292l.55-.184c.426-.142.64-.212.84-.308c.236-.113.46-.25.666-.412m5.849-5.809a2.163 2.163 0 1 0-3.06-3.059l-.126.128a.524.524 0 0 0-.148.465c.02.107.055.265.12.452c.13.375.376.867.839 1.33a3.5 3.5 0 0 0 1.33.839c.188.065.345.1.452.12a.525.525 0 0 0 .465-.148z" />
                            <path fill="currentColor" fill-rule="evenodd" d="M4.172 3.172C3 4.343 3 6.229 3 10v4c0 3.771 0 5.657 1.172 6.828C5.343 22 7.229 22 11 22h2c3.771 0 5.657 0 6.828-1.172C20.981 19.676 21 17.832 21 14.18l-2.818 2.818c-.27.27-.491.491-.74.686a5.107 5.107 0 0 1-.944.583a8.163 8.163 0 0 1-.944.355l-2.312.771a2.083 2.083 0 0 1-2.635-2.635l.274-.82l.475-1.426l.021-.066c.121-.362.22-.658.356-.944c.16-.335.355-.651.583-.943c.195-.25.416-.47.686-.74l4.006-4.007L18.12 6.7l.127-.127A3.651 3.651 0 0 1 20.838 5.5c-.151-1.03-.444-1.763-1.01-2.328C18.657 2 16.771 2 13 2h-2C7.229 2 5.343 2 4.172 3.172M7.25 9A.75.75 0 0 1 8 8.25h6.5a.75.75 0 0 1 0 1.5H8A.75.75 0 0 1 7.25 9m0 4a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 0 1.5H8a.75.75 0 0 1-.75-.75m0 4a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H8a.75.75 0 0 1-.75-.75" clip-rule="evenodd" />
                        </svg>
                        Sucessful Payment
                    </a>
                </li>
                <li>
                    <a href="payment.php" class="nav-link text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1z" />
                        </svg>
                        Payment
                    </a>
                </li>
                <li>
                    <a href="check.php" class="nav-link text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 12v5c0 1.886 0 2.828-.586 3.414C18.828 21 17.886 21 16 21H6.5a2.5 2.5 0 0 1 0-5H16c1.886 0 2.828 0 3.414-.586C20 14.828 20 13.886 20 12V7c0-1.886 0-2.828-.586-3.414C18.828 3 17.886 3 16 3H8c-1.886 0-2.828 0-3.414.586C4 4.172 4 5.114 4 7v11.5" />
                                <path stroke-linecap="round" d="m9 10l1.293 1.293a1 1 0 0 0 1.414 0L15 8" />
                            </g>
                        </svg>
                        Payment Status
                    </a>
                </li>
                <li>
                    <a href="check_details.php" class="nav-link text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M384 362.7H128V384h256zM106.7 21.3h192V128h106.7v42.7h21.3v-64L320 0H85.3v170.7h21.3V21.3zM448 192H64c-42.7 0-64 21.3-64 64v128h85.3v128h341.3V384H512V256c0-42.7-21.3-64-64-64M85.3 277.3H42.7v-42.7h42.7v42.7zm320 213.4H106.7V341.3h298.7v149.4zM384 405.3H128v21.3h256zm0 42.7H128v21.3h256z" />
                        </svg>
                        Check Indigene Details
                    </a>
                </li>
                <li>
                    <a href="update_profile.php" class="nav-link text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <g fill="none" fill-rule="evenodd">
                                <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor" d="M18.5 4a1.5 1.5 0 0 0-3 0v.5H4a1.5 1.5 0 1 0 0 3h11.5V8a1.5 1.5 0 0 0 3 0v-.5H20a1.5 1.5 0 0 0 0-3h-1.5zM4 10.5a1.5 1.5 0 0 0 0 3h1.5v.5a1.5 1.5 0 0 0 3 0v-.5H20a1.5 1.5 0 0 0 0-3H8.5V10a1.5 1.5 0 1 0-3 0v.5zM2.5 18A1.5 1.5 0 0 1 4 16.5h11.5V16a1.5 1.5 0 0 1 3 0v.5H20a1.5 1.5 0 0 1 0 3h-1.5v.5a1.5 1.5 0 0 1-3 0v-.5H4A1.5 1.5 0 0 1 2.5 18" />
                            </g>
                        </svg>
                        Settings
                    </a>
                </li>
            </ul>



        </div>

        <div class="col-sm-9 p-1 ">
            <div class="container p-2 bg-primary br-3 text-center rounded">
                <h4 class="text-light">Welcome <i><?php echo $full_name ?></i></h4>
            </div>
            <div class="row justify-content-center text-center  g-0 p-1">
                <div class="col-sm-2 rounded p-3 text-center bg-primary text-light m-3">
                    <h6>Pending Approve</h6>
                    <h1><?php echo $another2 ?></h1>
                </div>
                <div class="col-sm-2 rounded p-3 text-center bg-primary text-light m-3">
                    <h6>Pending Payment</h6>
                    <h1>64</h1>
                </div>
                <div class="col-sm-2 rounded p-3 text-center bg-primary text-light m-3">
                    <h6>Sucessful Payment</h6>
                    <h1>64</h1>
                </div>
                <div class="col-sm-2 rounded p-3 text-center bg-primary text-light m-3">
                    <h6>No of All Indigenes</h6>
                    <h1>64</h1>
                </div>
            </div>
            <div class="container p-2 br-3 text-center">
                <h4 class="text-danger"> <i>Recents Pending Approve</i></h4>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-border table-primary align-middle rounded">
                    <thead class="table-secondary">

                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Ward</th>
                            <th>DOB</th>
                            <th>Date</th>
                            <th>Approve</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <?php if (mysqli_num_rows($name) > 0) {

                        while ($sum = mysqli_fetch_assoc($name)) { ?>
                            <tbody class="table-group-divider">
                                <tr class="table-primary">
                                    <td scope="row"> <?php if (isset($sum['mname'])) {
                                                            echo $sum['fname'] . " " . $sum['lname'] . " " . $sum['mname'];
                                                        } else {
                                                            echo $sum['fname'] . " " . $sum['lname'];
                                                        } ?></td>
                                    <td><?php echo $sum['email'] ?></td>
                                    <td><?php echo $sum['phone'] ?></td>
                                    <td><?php echo $sum['ward'] ?></td>
                                    <td><?php echo $sum['dob'] ?></td>
                                    <td>Item</td>
                                    <td><button name="" id="" class="btn btn-primary " type="submit">Approve</button></td>
                                    <td><button name="" id="" class="btn btn-danger" type="submit">Delete </button></td>
                                </tr>

                            </tbody>
                            <tfoot>

                            </tfoot>
                        <?php }
                    } else { ?>
                        <center>
                            <h2> There's No Available Product</h2>
                        </center>
                    <?php }
                    ?>
                </table>
            </div>


        </div>
    </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
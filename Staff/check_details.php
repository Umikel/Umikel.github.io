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
    $mess = "Error fetching user details: " . $conn->error;
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["new_profile_pic"])) {
    $new_full_name = $_POST["new_full_name"];
    $new_username = $_POST["new_username"];
    


    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["new_profile_pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["new_profile_pic"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $mess= "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["new_profile_pic"]["size"] > 500000) {
        $mess = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $mess = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $mess = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["new_profile_pic"]["tmp_name"], $target_file)) {
            // Update the user's profile picture in the database
           
         
    $update_sql = "UPDATE admin SET full_name = '$new_full_name', profile_pic = '$target_file' WHERE username = '$username'";
        }
    }
    if ($conn->query($update_sql) === TRUE) {
        $mess = "Profile details updated successfully.";
        header("Location: dashboard.php");
        
  
    } else {
        $mess ="Error updating profile details: " . $conn->error;
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
    <style>
         #prof{
            width: 40%;
            height: 15vh;
            border-radius: 100px;
        }
        #nod{
        font-family: Bahnschrift Light;
        font-size: 110%;
        background-color: rgba(0, 0, 255, 0.74);
        color: white;
    }
    #nod:hover{
        
        background-color: black;
        color: black;
    }
          @media only screen and (min-width:768px){ 
         #prof{
            width: 45%;
            height: 20vh;
            border-radius: 100px;
            margin-bottom: 3vh;
        }
        #nod:hover{
        
        background-color: black;
        color: black;
    }
    #nod{
        font-family: Bahnschrift Light;
        font-size: 110%;
        background-color: rgba(0, 0, 255, 0.74);
        color: white;
    }
    #nodo{
        font-family: Bahnschrift Light;
        font-size: 110%;
        background-color: rgba(15, 15, 37, 0.74);
        color: white;
    }

    }
    </style>
    
    
    <nav class="navbar navbar-expand-sm navbar-light bg-white shadow mb-1 sticky-top">
          <div class="container">
            
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                   
                </ul>
               
                       <h5 class="m-2 "><?php echo $_SESSION['username']?></h5> <a class="nav-link text-danger" id="nood" href="logout.php"><strong>Logout</strong></a>
                          </div>
      </div>
    </nav>
    <div class="row justify-content-center g-0 p-3">
        <div class="col-sm-3 p-3 border-end border-primary text-center ">
              <center><img id="prof" src="../image/<?php echo $profile_pic?>" class="img-fluid " alt="Profile Pic"/> </center>
            <h5><?php echo $full_name?></h5>
            <h5>Ung/Adm/<?php echo $id?></h5>
            <h5><?php echo $role?></h5>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nod" href="Dashboard.php">Dashboard</a>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nod" href="pending_payment.php">Pending Payment</a>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nod" href="#">Pending Register</a>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nod" href="#">Sucessful Payment</a>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nodo" href="check_details.php">Check Indigene Details</a>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nod" href="update_profile.php">Edit Profile</a>

    </div>
    <div class="col-sm-9 p-3 ">
        <div class="container p-2 bg-primary br-3 text-center">
            <h4 class="text-light">Welcome <i><?php echo $full_name?></i></h4>
         </div>
         <div class="row justify-content-center text-center  g-0 p-1">
         <div class="col-sm-10 border rounded p-5 text-center  m-3">
         <form action="update_profile.php" method="post" enctype="multipart/form-data">
            <h3>Check Indigene Details </h3>
            <p class="text-danger"><?php echo $mess ?></p>
         <div class="mb-3">
            <label for="" class="form-label text-primary">Indigene Number</label>
            <input type="text" class="form-control text-center" name="new_full_name" value="" id="" />
        </div>
        
        <button name="" id="" class="btn btn-primary " type="submit">Check</button>
         </div>
</form>
         
    </div>
    </div>
    </div>
    
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
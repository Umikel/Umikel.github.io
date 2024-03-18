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
            <a class="nav-link text-light m-2 rounded p-1 "  id="nodo" href="#">Pending Payment</a>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nod" href="#">Pending Register</a>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nod" href="#">Sucessful Payment</a>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nod" href="check_details.php">Check Indigene Details</a>
            <a class="nav-link text-light m-2 rounded p-1 "  id="nod" href="update_profile.php">Edit Profile</a>

    </div>
    <div class="col-sm-9 p-3 ">
        <div class="container p-2 bg-primary br-3 text-center">
            <h4 class="text-light">Welcome <i><?php echo $full_name?></i></h4>
         </div>
         
        <div class="container p-2 br-3 text-center">
            <h4 class="text-danger"> <i>All Pending Payment</i></h4>
         </div>
        <div class="table-responsive">
            <table class="table table-hover table-border table-primary align-middle rounded">
                <thead class="table-secondary">
                
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Ward</th>
                        <th>Payment Status</th>
                        <th>Date</th>
                        <th>Approve</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-primary"
                    >
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td><button name="" id="" class="btn btn-primary " type="submit">Approve</button></td>
                        <td><button name="" id="" class="btn btn-danger" type="submit">Delete </button></td>
                    </tr>
                    
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
        </div>
        
        
    </div>
    </div>
    </div>
    
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
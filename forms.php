<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mname = $_POST["mname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$mstatus = $_POST["mstatus"];
$state = $_POST["state"];
$lga = $_POST["lga"];
$ward = $_POST["ward"];
$address = $_POST["address"];
$religion =$_POST["religion"];
$pobirth = $_POST["pobirth"];
$ffname = $_POST["ffname"];
$flname = $_POST["flname"];
$fmname = $_POST["fmname"];
$faddress = $_POST["faddress"];
$freligion =$_POST["freligion"];
$fpobirth = $_POST["fpobirth"];
$mfname = $_POST["mfname"];
$mlname = $_POST["mlname"];
$mmname = $_POST["mmname"];
$maddress = $_POST["maddress"];
$mreligion =$_POST["mreligion"];
$mpobirth = $_POST["mpobirth"];


 

        $query = "INSERT INTO indigene('fname','lname','mname','email','number','dob','gender',
        'mstatus','state','lga','ward','address','religion','pobirth','ffname','flname','fmname',
        'faddress','freligion','fpobirth','mfname','mlname','mmname','maddress','mreligion','mpobirth') 
        VALUES('$fname','$lname','$mname','$email','$phone','$dob','$gender','$mstatus','$state',
        '$lga','$ward','$address','$religion','$pobirth','$ffname','$flname','$fmname','$faddress',
        '$freligion','$fpobirth','$mfname','$mlname','$mmname','$maddress','$mreligion','$mpobirth')";
        
        $res = mysqli_query($conn,$query);
        
        
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ungogo</h1>
    <p><b>first name:</b> <?php echo $fname ?></p>
</body>
</html>

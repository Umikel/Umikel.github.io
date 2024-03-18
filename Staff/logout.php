<?php
session_start();
session_destroy();
header("Location: Staff.php");
exit();
?>
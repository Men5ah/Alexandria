<?php
include_once "../settings/connection.php";
$conn = get_connection();

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);

    $telephone = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['psswd']);

    $security_measure = password_hash($password, PASSWORD_DEFAULT);

    $insert = "INSERT INTO register(fname, lname, email, psswd, phone) values ('$fname','$lname','$email','$password','$telephone')";
    
    //execute query

    $result = mysqli_query($conn, $insert);
    
    if($result) {
        header( "location: ../views/login.php");
        exit();
    } else {
        echo "Error: ". $conn->error;
    }
}
?>
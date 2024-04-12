<?php
session_start();
include_once "../settings/connection.php";
$conn = get_connection();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selection = "SELECT * FROM register WHERE email='$email'";

    $result = mysqli_query($conn, $selection);

    if(mysqli_num_rows($result) == 0){
        echo "You are not registered with us. Please register if you don't have an account.";}
    else{
        $rows = mysqli_fetch_assoc($result);
        if(password_verify($password,$rows['psswd'])){
            $_SESSION['email'] = $rows['email'];
            $_SESSION['userID'] = $rows['userID'];
            $_SESSION['fname'] = $rows['fname'];
            $_SESSION['lname'] = $rows['lname'];
            header( 'Location: ../views/search.php');
            
        }else {
            $message = "Incorrect email or password! Try again";
            header("Location: ../views/login.php?error=" . urlencode($message));
            exit();
        }
    }
}

?>
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

            // // Echo the values of pid, fid, and email
            // echo "UserID: " . $_SESSION['userID'] . "<br>";
            // echo "First Name: " . $_SESSION['fname'] . "<br>";
            // echo "Last Name: " . $_SESSION['lname'] . "<br>";
            // echo "Email: " . $_SESSION['email'] . "<br>";

            header( 'Location: ../views/dashboard.php');
            
        }else {
            // This is in the PHP file and sends a Javascript alert to the client
            $message = "Incorrect email or password! Try again";
            header("Location: ../views/login.php?error=" . urlencode($message));
            exit(); // Terminate the script after redirection
        }
    }
}

?>
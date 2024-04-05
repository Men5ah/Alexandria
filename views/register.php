<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alexandria | Sign Up</title>
    <link rel="stylesheet" href="../css/register.css">
    <script src="../js/register.js"></script>
</head>
<body>
    <form action="../actions/register_action.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" placeholder="John">

        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" placeholder="Doe">
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="john.doe@example.com">

        <label for="tel">Telephone</label>
        <input type="tel" name="tel" id="tel" placeholder="0559038888">

        <label for="psswd">Password</label>
        <input type="password" name="psswd" id="psswd">

        <label for="repsswd">Confirm Password</label>
        <input type="password" name="repsswd" id="repsswd">

        <input type="submit" value="Sign Up">

    </form>
</body>
</html>
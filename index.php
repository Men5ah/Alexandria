<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alexandria | Sign Up</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <h1>Welcome to Alexandria, let's get you signed up!</h1>
    <form action="actions/register_action.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" placeholder="John" required>

        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" placeholder="Doe" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="john.doe@example.com" required>

        <label for="tel">Telephone</label>
        <input type="tel" name="tel" id="tel" placeholder="0559038888" required>

        <label for="psswd">Password</label>
        <input type="password" name="psswd" id="psswd" pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/" required>

        <label for="repsswd">Confirm Password</label>
        <input type="password" name="repsswd" id="repsswd" required>

        <button type="submit" id="btn">Sign Up</button>
    </form>
    <script src="js/register.js"></script>
</body>
</html>
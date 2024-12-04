<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Website ni Peruda</title>
<link rel="stylesheet" href="css/style.css">
</head>
    <body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
        <div class="content">
            <br/><br/><br/>
            <div class="login">
            <h2>Login</h2>
                <div class="login-container">
        <form>
    <p>
    <label class="label" for="fname">Email Address:</label>
    <input type="text" id="fname" placeholder="Enter your email">
    </p>
    <p>
    <label class="label" for="lname">Password:</label>
    <input type="password" id="lname" placeholder="Enter your password">
    </p>
    <p>
    <input type="submit" id="submit" name="submit" value="Login">
    </p>
    </form>
    </div>
    </div>
    </div>
    <?php include 'footer.php'; ?>
    </body>
</html>
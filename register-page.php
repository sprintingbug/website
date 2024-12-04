<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    
    <div class="content">
    <div class="registration-area">
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $errors = [];
    
            // Validate user input
            $fn = !empty(trim($_POST["fname"])) ? trim($_POST["fname"]) : $errors[] = "Please enter your first name.";
            $ln = !empty(trim($_POST["lname"])) ? trim($_POST["lname"]) : $errors[] = "Please enter your last name.";
            $e = !empty(trim($_POST["email"])) ? trim($_POST["email"]) : $errors[] = "Please enter your email.";
            $p1 = !empty(trim($_POST["psword1"])) ? trim($_POST["psword1"]) : $errors[] = "Please enter your password.";
            $p2 = !empty(trim($_POST["psword2"])) ? trim($_POST["psword2"]) : $errors[] = "Please confirm your password.";
    
            if ($p1 !== $p2) {
                $errors[] = "Your passwords do not match.";
            }
    
            if (empty($errors)) {
                require('mysqli_connect.php');
                $hashed_password = password_hash($p1, PASSWORD_DEFAULT);
    
                $q = "INSERT INTO users (fname, lname, email, psword, registration_date) VALUES ('$fn', '$ln', '$e', '$hashed_password', NOW())";
                $result = @mysqli_query($dbcon, $q);
                if ($result) {
                    header("location: register-thanks.php");
                    exit();
                } else {
                    echo '<h2>System Error</h2>
                    <p>You could not be registered due to a system error. We apologize for any inconvenience.</p>';
                    echo '<p>' . mysqli_error($dbcon) . '</p>';
                }
                mysqli_close($dbcon);
                include('footer.php');
                exit();
            } else {
                echo '<h4>System Error!</h4>
                <p>The following error(s) occurred:<br/>';
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</p><h4>Please try again.</h4><br/><br/>";
            }
        }
        ?>
        <h3>Register</h3>
        <br/>
        <form action="register-page.php" method="post">
            <p>
                <label class="label" for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" size="30" maxlength="40" value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>">
            </p>
        
            <p>
                <label class="label" for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" size="30" maxlength="40" value="<?php if(isset($_POST['lname'])) echo $_POST['lname'] ?>">
            </p>
        
            <p>
                <label class="label" for="email">Email Address:</label>
                <input type="email" id="email" name="email" size="30" maxlength="50" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
            </p>
        
            <p>
                <label class="label" for="psword1">Password:</label>
                <input type="password" id="psword1" name="psword1" size="50" maxlength="50">
            </p>
       
            <p>
                <label class="label" for="psword2">Confirm Password:</label>
                <input type="password" id="psword2" name="psword2" size="50" maxlength="50">
            </p>
        
            <p>
                <br>
                <input type="submit" id="submit" name="submit" value="Register">
            </p>
        </form>
    </div>
</div>

    <?php include 'footer.php'; ?>
</body>
</html>

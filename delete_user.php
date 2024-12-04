<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    
    <div class="content">
       <h2>Deleting Record...</h2>
       <?php 
       if ((isset($_GET['user_id'])) && (is_numeric($_GET['user_id']))) {
        $user_id = $_GET['user_id'];
       } elseif ((isset($_POST['user_id'])) && (is_numeric($_POST['user_id']))) {
        $user_id = $_POST['user_id'];
       } else {
        echo '<p>Error! Invalid ID.</p>';
        exit();
       }
       require('mysqli_connect.php');
       
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['sure'] == 'Yes') {
            $q = "DELETE FROM users WHERE user_id = $user_id LIMIT 1";
            $result = @mysqli_query($dbcon, $q);
            if (mysqli_affected_rows($dbcon) == 1) {
                echo '<p>User deleted successfully.</p>';
                echo '<a href="register-view-users.php">Back to User List</a>';
            } else {
                echo '<p>Error! User could not be deleted.</p>';
            }
        } else {
            echo '<p>Deletion Cancelled.</p>';
            echo '<a href="register-view-users.php">Back to User List</a>';
        }
       } else {
        $q = "SELECT CONCAT(fname, ' ', lname)
        FROM users WHERE user_id = $user_id";
        $result = @mysqli_query($dbcon, $q);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            echo "<div class='delete-container'>
                    <h3>Are you sure you want to delete $row[0]?</h3>
                    <form action='delete_user.php' method='post'>
                        <input id='submit-yes' type='submit' name='sure' value='Yes'>
                        <input id='submit-no' type='submit' name='sure' value='No'>
                        <input type='hidden' name='user_id' value='$user_id'>
                    </form>
                  </div>";
        } else {
            echo '<h3>Error! User not found.</h3>';
        }
       }
       mysqli_close($dbcon);
       ?>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>

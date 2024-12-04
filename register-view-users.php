<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Successfully!</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    
    <div class="content">
        <h2>Registered Users</h2>
        
        <!-- New Div for Table -->
        <div class="table-container">
            <?php
            require("mysqli_connect.php");
            $q = "SELECT user_id, fname, lname, email,
            DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat
            FROM users ORDER BY user_id ASC";
            $result = @mysqli_query($dbcon, $q);

            if ($result) {
                echo '<table class="user-table">
                <tr> 
                    <th><strong>Name</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Registered Date</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>';
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo '<tr>
                            <td>'. $row['fname'] . ' '. $row['lname'].'</td>
                            <td>'. $row['email'] .'</td>
                            <td>'. $row['regdat'] .'</td>
                            <td>
                                <a class="action-link edit" href="edit_user.php?user_id='. $row['user_id'] .'">Edit</a> | 
                                <a class="action-link delete" href="delete_user.php?user_id='. $row['user_id'] .'">Delete</a>
                            </td>
                          </tr>';
                }
                echo '</table>';
                mysqli_free_result($result);
            } else {
                echo '<p>The current registered users could not be retrieved. Please contact the system administrator</p>';
            }
            mysqli_close($dbcon);
            ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>

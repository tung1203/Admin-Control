<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
try {
    require("mysqli_connect.php");
    $query = "SELECT CONCAT(last_name,',',first_name) AS name, ";
    $query .= "DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat ";
    $query .= "FROM users ORDER BY regdat ASC";
    $result = mysqli_query($dbconn, $query);
    if ($result) {
        echo '<table class="table table-striped">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Date Registered</th>
                </tr>';
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['regdat'] . '</td>
                </tr>';
        }
        echo '</table>';
        mysqli_free_result($result); // Free up the resources.
    } else {
        echo '<p class="error">The current users could not be retrieved. We apologize';
        echo ' for any inconvenience.</p>';
        echo '<p>' . mysqli_error($dbconn) . '<br><br>Query: ' . $query . '</p>';
        exit;
    }
    mysqli_close($dbconn);
} catch (Exception $e) // We finally handle any problems here
{
    print "An Exception occurred. Message: " . $e->getMessage();
    print "The system is busy please try later";
} catch (Error $e) {
    print "An Error occurred. Message: " . $e->getMessage();
    print "The system is busy please try again later.";
}
?>
<a href="change-password.php">Change Password</a>

</body>
</html>
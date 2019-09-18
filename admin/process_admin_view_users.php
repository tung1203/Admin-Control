<?php
//$pagerows = 4;
//if ((isset($_GET['p'])) && is_numeric($_GET['p'])) {
//    $pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
//} else {
//    require("../mysqli_connect.php");
//    $query = "SELECT COUNT(userid) FROM users";
//    $stmt = $conn->stmt_init();
//    $stmt->prepare($query);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    $stmt->close();
//    if ($result->num_rows > 0) {
//        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//
//        $records = htmlspecialchars($row['COUNT(userid)'], ENT_QUOTES);
//        echo $records;
//        if ($records > $pagerows) {
//            $pages = ceil($records / $pagerows);
//        } else {
//            $pages = 1;
//        }
//    }
//    if ((isset($_GET['s'])) && is_numeric($_GET['s'])) {
//        $start = htmlspecialchars($_GET['s'], ENT_QUOTES);
//    } else {
//        $start = 0;
//    }
//    $query = "SELECT * FROM users LIMIT ?, ?";
//    $stmt = $conn->stmt_init();
//    $stmt->prepare($query);
//    $stmt->bind_param("ii", $start, $pagerows);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    $stmt->close();
//    if ($result->num_rows > 0) {
//        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//
//        echo '<pre>',
//        var_dump($result),
//        '</pre>';
//
//
//    }
//
//}
try {

    require('../mysqli_connect.php'); // Connect to the database.
    //set the number of rows per display page
    $pagerows = 4; //
    // Has the total number of pagess already been calculated?
    if ((isset($_GET['p']) && is_numeric($_GET['p']))) {
        $pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
    } else {
        $q = "SELECT COUNT(userid) FROM users";
        $result = mysqli_query($conn, $q);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        $records = htmlspecialchars($row[0], ENT_QUOTES);
        if ($records > $pagerows) {
            $pages = ceil($records / $pagerows); //
        } else {
            $pages = 1;
        }
    }

    if ((isset($_GET['s'])) && (is_numeric($_GET['s']))) {
        $start = htmlspecialchars($_GET['s'], ENT_QUOTES);
    } else {
        $start = 0;
    }
    $query = "SELECT last_name, first_name, email, ";
    $query .= "DATE_FORMAT(registration_date, '%M %d, %Y')";
    $query .= " AS regdat, userid FROM users WHERE user_level != 1 and status = 1 ORDER BY registration_date ASC";
    $query .= " LIMIT ?, ?";

    $q = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($q, $query);


    mysqli_stmt_bind_param($q, "ii", $start, $pagerows);


    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    if ($result) { // If it ran OK (records were returned), display the records.
    // Table header. 									#2
        echo '<table class="table">
                    <thead>
                    <tr>
                        <th scope="col">User Id</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Registraion Date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>';
         // Fetch and print all the records:
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            // Remove special characters that might already be in table to
            // reduce the chance of XSS exploits
            $user_id = htmlspecialchars($row['userid'], ENT_QUOTES);
            $last_name = htmlspecialchars($row['last_name'], ENT_QUOTES);
            $first_name = htmlspecialchars($row['first_name'], ENT_QUOTES);
            $email = htmlspecialchars($row['email'], ENT_QUOTES);
            $registration_date = htmlspecialchars($row['regdat'], ENT_QUOTES);
            echo '
               <tr>
                    <th class="userid" scope="row">' . $user_id . '</th>
                    <td class="firstname" >' . $first_name . '</td>
                    <td class="lastname">' . $last_name . '</td>
                    <td>' . $registration_date . '</td>
                    <td><button class="btn btn-success edit">Edit</button></td>
                    <td><a href="process-delete.php?id=' . $row['userid'] . '" class="btn btn-danger" onclick="checkDelete(event)">Delete</a></td>
                </tr>';
        }
        echo '</tbody>
                </table>'; // Close the table.
        //
        mysqli_free_result($result); // Free up the resources.
    } else { // If it did not run OK.
        // Error message:
        echo '<p class="text-center">The current users could not be retrieved. We apologize';
        echo ' for any inconvenience.</p>';
    // Debug message:
    // echo '<p>' . mysqli_error($conn) . '<br><br>Query: ' . $q . '</p>';
        exit;
    } // End of else ($result)
    // Now display the total number of records/members.
    $q = "SELECT COUNT(userid) FROM users WHERE user_level != 1 and status = 1";
    $result = mysqli_query($conn, $q);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    $members = htmlspecialchars($row[0], ENT_QUOTES);
    mysqli_close($conn); // Close the database connection.
    $echostring = "<p class='text-center'>Total membership: $members </p>";
    $echostring .= "<p class='text-center'>";
    if ($pages > 1) {//
    //What number is the current page?
        $current_page = ($start / $pagerows) + 1;
    //If the page is not the first page then create a Previous link
        if ($current_page != 1) {
            $echostring .= '<a href="admin.php?s=' . ($start - $pagerows) .
                '&p=' . $pages . '">Previous</a> ';
        }
    //Create a Next link
        if ($current_page != $pages) {
            $echostring .= ' <a href="admin.php?s=' . ($start + $pagerows) .
                '&p=' . $pages . '">Next</a> ';
        }
        $echostring .= '</p>';
        echo $echostring;
    }
//}
//mysqli_close($conn); // Close the database connection.
} //end of try
catch (Exception $e) // We finally handle any problems here
{
    // print "An Exception occurred. Message: " . $e->getMessage();
    print "The system is busy please try later";
} catch (Error $e) {
    //print "An Error occurred. Message: " . $e->getMessage();
    print "The system is busy please try again later.";
}
?>
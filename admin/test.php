<?php
require("../mysqli_connect.php");
$limit = 3;
$page = 1;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
}
$start_from = ($page - 1) * $limit;


$query = "SELECT last_name, first_name, email, ";
$query .= "DATE_FORMAT(registration_date, '%M %d, %Y')";
$query .= " AS regdat, userid FROM users WHERE user_level != 1 and status = 1 ORDER BY registration_date ASC";
$query .= " LIMIT ?, ?";

$stmt = $conn->stmt_init();
$stmt->prepare($query);
$stmt->bind_param("ii", $start_from, $limit);
$stmt->execute();
$result = $stmt->get_result();
if ($result) {
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

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
        </table>';
}
$q = "SELECT COUNT(userid) as num FROM users WHERE user_level != 1 and status = 1";
$stmt = $conn->stmt_init();
$stmt->prepare($q);
$stmt->execute();
$result = $stmt->get_result();
$total_records = $result->fetch_assoc();
$total_page = ceil($total_records['num'] / $limit);
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    if ((int)$_GET['page'] < 1 || (int)$_GET['page'] > $total_page) {
        echo "404 Not Found";

    }
}
echo '<nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">';
for ($i = 1; $i <= $total_page; $i++) {
    $active = ($i == $page ? "active" : "");
    echo '    <li class="page-item ' . $active . '">
                    <a class="page-link" href="admin.php?page=' . $i . '">' . $i . '</a>
              </li>';
}
echo '    </ul>
      </nav>';
?>
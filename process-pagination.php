<?php
require("mysqli_connect.php");
$limit = 12;
$query = "SELECT COUNT(productId) as num FROM products";
if (isset($_GET['q'])) {
    $query = "SELECT COUNT(productId) as num FROM products where productName LIKE '%" . $_GET['q'] . "%'";
}

$stmt = $conn->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$totalRecords = $result->fetch_assoc();
$total_page = ceil($totalRecords['num'] / $limit);

$page = 1;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
}


if (empty($_GET['page']) || ($_GET['page'] <= 1)) {

} else {
    $prePage = $page - 1;
    echo '<li>
            <a href="index.php?page=' . $prePage . '" class="prev">
                <i class="fa fa-angle-left"></i>
            </a>
      </li>';
}

for ($i = 1; $i <= $total_page; $i++) {
    $active = ($i == $page ? "active" : "");
    echo '<li>
                <a href="index.php?page=' . $i . '" class="normal ' . $active . '">' . $i . '</a>
            </li>';
}


if ($total_page == 1 || ($_GET['page'] == $total_page)) {

} else {
    $nextPage = $page + 1;
    echo '<li>
            <a href="index.php?page=' . $nextPage . '" class="next">
                <i class="fa fa-angle-right"></i>
            </a>
       </li>';
}
//echo '<li>
//            <a href="index.php?page=' . $nextPage . '" class="next">
//                <i class="fa fa-angle-right"></i>
//            </a>
//       </li>';

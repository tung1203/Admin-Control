<?php
try {
    $limit = 12;

    $page = 1;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = $_GET['page'];
    }
    $start_from = ($page - 1) * $limit;
    require("mysqli_connect.php");
    if (!empty($_GET['q'])) {
        $q = test_input($_GET['q']);
        $query = "SELECT * FROM products where productName LIKE CONCAT('%',?,'%') LIMIT ?, ?";
        $stmt = $conn->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param("sii", $q, $start_from, $limit);
        $stmt->execute();
    } else {
        $query = "SELECT * FROM products LIMIT ?, ?";
        $stmt = $conn->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param("ii", $start_from, $limit);
        $stmt->execute();
    }


    $result = $stmt->get_result();
    if ($stmt->affected_rows > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//            $row["price"] = money_format('%i', $row["price"]);
            echo '<div class="product">
                        <a href="">
                            <div class="product__image">
                                <img src="' . $row["productImage"] . '" alt="">
                            </div>
                            <div class="product__option">
                                <ul>
                                    <li class="active">
                                        <img src="images/dt1small.jpg" alt="">
                                    </li>
                                    <li>
                                        <img src="images/dt1small1.jpg" alt="">
                                    </li>
                                </ul>
                            </div>
                            <div class="product__title">
                                <i class="icon icon-tikinow"></i>
                                ' . $row["productName"] . '
                            </div>
                            <span class="product__sale">
                                <span class="product__sale-final">
                                    ' . number_format($row["price"]) . ' ₫
                                    <span class="product__sale-percent">
                                        -10%
                                    </span>
                                </span>
                                <span class="product__sale-regular">3.990.000 ₫</span>
                            </span>
                            <div class="product__installment">
                                Trả góp 0% chỉ 299.167 ₫/tháng
                            </div>
                            <div class="product__review">
                                <div class="product__review-start">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <span class="product__review-start-y">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="product__review-text">(252 nhận xét)</div>
                            </div>
                        </a>
                    </div>';
        }
        $conn->close();
    } else {
        echo "404 Not Found";
        exit();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

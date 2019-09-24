<?php
if (isset($_POST['uploadProduct'])) {
    $error = array();
    $productName = test_input($_POST['productName']);
    if (empty($productName)) {
        $errors[] = 'You forgot enter product name';
    }
    $productPrice = test_input($_POST['productPrice']);
    if (empty($productPrice)) {
        $errors[] = 'You forgot enter product price';
    } else {
        $productPrice = str_replace(",", "", $productPrice);
    }
//    var_dump($_POST);
//    echo $productName. "<br>";
//    echo $productPrice;


    $target_dir = "../../images/products/";
    $target_file = $target_dir . basename($_FILES['productImage']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $newName = $productName . '.' . $imageFileType; //create new name for image
    $newName = htmlspecialchars($newName);
    $newName = str_replace(" ", "-", $newName);
    $newName = str_replace("/", "-", $newName);

    $newTarget_dir = $target_dir . $newName; //create new target_dir for image
    $dir_image = "images/products/" . $newName;
    if (file_exists($target_dir . $newName)) {
        $error[] = "Sorry, file already exists.";
    }
//    else {
//        echo $target_dir . $newName;
//    }
//    echo "dir_image: " . $dir_image . "<br>";
//    echo "newName: " . $newName . "<br>";
//    echo "newTarget_dir: " . $newTarget_dir . "<br>";

    $typeAccept = ["png", "jpg", "jpeg"];
    $check = getimagesize($_FILES['productImage']['tmp_name']);
    if (!$check) {
        $error[] = "File is not an image.";
    }
    if ($_FILES['productImage']['size'] > 10000000) { // 100Mb
        $error[] = "Sorry, your file is too large.";
    }
    if (!in_array($imageFileType, $typeAccept)) {
        $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
    if (empty($error)) {
        if (move_uploaded_file($_FILES['productImage']['tmp_name'], $newTarget_dir)) {
//            echo "The file " . basename($_FILES["productImage"]["name"]) . " has been uploaded.";
            try {
                require("../../mysqli_connect.php");
                $query = "INSERT INTO products (productName, productImage, price) VALUES (?, ?, ?);";
                $stmt = $conn->stmt_init();
                $stmt->prepare($query);
                $stmt->bind_param("ssd", $productName, $dir_image, $productPrice);
                $stmt->execute();
                if ($stmt->affected_rows == 1) {
                    echo "upload success";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }else{
        foreach ($error as $v) {
            echo $v . "<br>";
        }
    }


}
//echo '<pre>',
//var_dump($error),
//'</pre>';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}
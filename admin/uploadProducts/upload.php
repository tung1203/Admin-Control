<?php include("../filter.php") ?>
<?php include("../header.php") ?>
<?php if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("process-upload.php");
} ?>
<div class="container bg-light p-5" id="addUserBox">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h1 class="text-center">Upload product</h1>
            <div class="row">
                <div class="col-12 text-center text-danger">
                    <p class="col-md-12 error"><?php if (!empty($errors)) foreach ($errors as $v) echo $v ?></p>
                </div>
            </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"
                  class="d-flex justify-content-center flex-column" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="productName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="productName" class="form-control" id="productName"
                               placeholder="Product Name"
                               value="<?php if (isset($_POST['productName'])) echo $_POST['productName'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productImage" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="productImage" class="form-control-file" id="productImage">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productPrice" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" name="productPrice" class="form-control" id="productPrice"
                               placeholder="Product Price"
                               value="<?php if (isset($_POST['productPrice'])) echo $_POST['productPrice'] ?>">
                    </div>
                </div>
                <input type="submit" value="Upload" class="btn btn-success mr-2" name="uploadProduct">
                <a href="../admin.php" class="btn" id="cancelAdd">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include("../../footer.php") ?>

<?php include("filter.php") ?>
<?php include("../header.php") ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['adduser'])) {

    include("process-adduser.php");
    
}if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['edit'])) {

    include("process-edit.php");
}
?>
    <h1 class="text-center">Welcome <?php echo $_SESSION['user']['firstname'] ?></h1>
    <p class="col-md-12 error"><?php if (!empty($errors)) foreach ($errors as $v) echo $v ?></p>
    <h3 class="text-center"><a href="../logout.php">Logout</a></h3>

    <div class="container">
        <div class="row">
            <div class="col-2">
                <a href="" class="btn btn-success mb-3" id="addUserBtn">Add user</a>
            </div>
        </div>
    </div>

    <div class="container bg-light p-5" id="addUserBox">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="text-center">Add User</h1>
                <div class="row">
                    <div class="col-12 text-center text-danger">
                        <p class="col-md-12 error"><?php if (!empty($errors)) foreach ($errors as $v) echo $v ?></p>
                    </div>
                </div>
                <form action="" method="post" class="d-flex justify-content-center flex-column">

                    <div class="form-group row">
                        <label for="addEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="addEmail" class="form-control" id="addEmail"
                                   placeholder="Email"
                                   value="<?php if (isset($_POST['addEmail'])) echo $_POST['addEmail'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addFirstname" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                            <input type="text" name="addFirstname" class="form-control" id="addFirstname"
                                   placeholder="First name"
                                   value="<?php if (isset($_POST['addFirstname'])) echo $_POST['addFirstname'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addLastname" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                            <input type="text" name="addLastname" class="form-control" id="addLastname"
                                   placeholder="Last name"
                                   value="<?php if (isset($_POST['addLastname'])) echo $_POST['addLastname'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password1" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="addPassword1" class="form-control" id="password1"
                                   placeholder="Password"
                                   value="<?php if (isset($_POST['addPassword1'])) echo $_POST['addPassword1'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addPassword2" class="col-sm-2 col-form-label">Re-Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="addPassword2" class="form-control" id="addPassword2"
                                   placeholder="Re-Password"
                                   value="<?php if (isset($_POST['addPassword2'])) echo $_POST['addPassword2'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="privilege" class="col-sm-2 col-form-label">Privilege</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="privilege" name="addPrivilege">
                                <option value="2">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" value="Add" class="btn btn-success mr-2" name="adduser">
                    <button class="btn" id="cancelAdd">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container bg-light p-5" id="editBox">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="text-center">Edit</h1>
                <form action="" method="post" class="d-flex justify-content-center flex-column">
                    <input type="text" id="userid" name="userid" style="display: none;">
                    <div class="form-group row">
                        <label for="editFirstname" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                            <input type="text" name="editFirstname" class="form-control" id="editFirstname"
                                   placeholder="First name"
                                   value="<?php if (isset($_POST['editFirstname'])) echo $_POST['editFirstname'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editLastname" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                            <input type="text" name="editLastname" class="form-control" id="editLastname"
                                   placeholder="Last name"
                                   value="<?php if (isset($_POST['editLastname'])) echo $_POST['editLastname'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editPassword1" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="editPassword1" class="form-control" id="editPassword1"
                                   placeholder="Password"
                                   value="<?php if (isset($_POST['editPassword1'])) echo $_POST['editPassword1'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editPassword2" class="col-sm-2 col-form-label">Re-Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="editPassword2" class="form-control" id="editPassword2"
                                   placeholder="Re-Password"
                                   value="<?php if (isset($_POST['editPassword2'])) echo $_POST['editPassword2'] ?>">
                        </div>
                    </div>

                    <input type="submit" value="Edit" class="btn btn-success mr-2" name="edit">
                    <button class="btn" id="cancelEdit">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
<!--                <table class="table">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th scope="col">User Id</th>-->
<!--                        <th scope="col">First name</th>-->
<!--                        <th scope="col">Last name</th>-->
<!--                        <th scope="col">Registraion Date</th>-->
<!--                        <th scope="col"></th>-->
<!--                        <th scope="col"></th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    --><?php
//                    require("../mysqli_connect.php");
//                    $query = "SELECT * FROM users where  user_level != 1 and status = 1";
//                    $stmt = $conn->stmt_init();
//                    $stmt->prepare($query);
//                    $stmt->execute();
//                    $result = $stmt->get_result();
//                    if ($result->num_rows > 0) {
//                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
////                            $disabled = $row['status'] ? "" : "disabled";
//                            $registrationDate = date_format(new DateTime($row["registration_date"]), 'Y F d');
//                            echo '
//                            <tr>
//                                <th class="userid" scope="row">' . $row["userid"] . '</th>
//                                <td class="firstname" >' . $row["first_name"] . '</td>
//                                <td class="lastname">' . $row["last_name"] . '</td>
//                                <td>' . $registrationDate . '</td>
//                                 <td><button class="btn btn-success edit">Edit</button></td>
//                                 <td><a href="process-delete.php?id=' . $row['userid'] . '" class="btn btn-danger">Delete</a></td>
//                             </tr>
//                        ';
//                        }
//                    }
//                    ?>
<!--                    </tbody>-->
<!--                </table>-->
                <?php require("process_admin_view_users.php"); ?>
            </div>
        </div>
    </div>
    <div id="overlay"></div>
<?php include("../footer.php") ?>
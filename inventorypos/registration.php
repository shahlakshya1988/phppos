<?php require_once "./header.php"; ?>
<?php
if (isset($_GET["del"])) {
    $userid = trim($_GET["del"]);
    $delete = $pdo->prepare("DELETE FROM `tbl_user` where userid=:userid LIMIT 1");
    $delete->bindParam(":userid", $userid);
    $delete->execute();
    //var_dump($delete);
    if ($delete->rowCount()) {
        ?>
        <script>
            window.addEventListener("load", function() {
                swal({
                    title: "Delete Successfull",
                    text: "User Has Been Delete From The System",
                    icon: "success",
                    button: "Ok",
                });
            });
        </script>
    <?php
    }
    header("refresh:3;registration.php");
}
if (isset($_POST["btnAddUser"])) {
    $txtname = trim($_POST["txtname"]);
    $txtemail = trim($_POST["txtemail"]);
    $password = trim($_POST["password"]);
    $role = trim($_POST["txtSelect_option"]);

    // select email from database
    $sel_email = $pdo->prepare("SELECT * FROM `tbl_user` where `useremail` = :useremail");
    $sel_email->bindParam(":useremail", $txtemail);
    $sel_email->execute();
    if (!$sel_email->rowCount()) {



        $insert = $pdo->prepare("INSERT INTO `tbl_user` (`username`,`useremail`,`password`,`role`) values(:username,:useremail,:password,:role)");
        $insert->bindParam(":username", $txtname);
        $insert->bindParam(":useremail", $txtemail);
        $insert->bindParam(":password", $password);
        $insert->bindParam(":role", $role);
        if ($insert->execute()) {
            ?>
            <script>
                window.addEventListener("load", function() {
                    swal({
                        title: "Registration Successfull",
                        text: "<?php echo $txtname; ?> Has Been Registered",
                        icon: "success",
                        button: false,
                    });
                });
            </script>

        <?php
        } else {
            ?>
            <script>
                window.addEventListener("load", function() {
                    swal({
                        title: "Registration Unsuccessful",
                        text: "Please Try Again Later",
                        icon: "warning",
                        button: "ok"
                    });
                });
            </script>
        <?php
            //echo "Registration Unsuccessfull";
        }
    } else {
        ?>
        <script>
            window.addEventListener("load", function() {
                swal({
                    title: "User Email Already Exists",
                    text: "Please Try Again With Other Email Address",
                    icon: "warning",
                    button: "ok"
                });
            });
        </script>
    <?php
    }
    // select email from database
    header("refresh:3;registration.php");
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registration
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">User Registration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
                <div class="box-body">
                    <div class="col-md-4">
                        <h2>4</h2>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="txtname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="txtemail" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="txtSelect_option" required>
                                <option value="" disabled selected>Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnAddUser" class="btn btn-info">Add User</button>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <table class="datatable table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>UserId</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = $pdo->prepare("SELECT * FROM `tbl_user` order by `userid` DESC");
                                $select->execute();
                                while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                    echo "<tr>";
                                    echo "<td>$row->userid</td>";
                                    echo "<td>$row->username</td>";
                                    echo "<td>$row->useremail</td>";
                                    echo "<td>$row->password</td>";
                                    echo "<td>$row->role</td>";
                                    echo "<td> <a href='registration.php?del={$row->userid}' role='button' class='btn btn-danger'> Delete </a> </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>UserId</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="clearfix"></div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">

                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once "./footer.php"; ?>
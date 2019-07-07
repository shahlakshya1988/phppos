<?php
if(session_status()==PHP_SESSION_NONE){
    session_start(); 
}

if($_SESSION["role"]=="User" ){
    require_once "./headeruser.php";
}elseif( $_SESSION["role"]=="Admin" ){
    require_once "./header.php"; 
}
  if(isset($_POST["btnupdate"])){
    $oldpassword = trim($_POST["txtoldpassword"]);
    $newpassword = trim($_POST["txtnewpassword"]);
    $confirmpassword = trim($_POST["txtconfirmpassword"]);
    // echo "<pre>",print_r($_POST),"</pre>";
    $select_user = $pdo->prepare("SELECT * from `tbl_user` where `useremail`=:useremail and `password` = :oldpassword");

    $select_user ->bindParam(":useremail",$_SESSION["useremail"]);
    $select_user -> bindParam(":oldpassword",$oldpassword);
    $select_user -> execute();
    // var_dump("I am here");
    // var_dump($select_user->rowCount());
    if($select_user->rowCount()){
        $row = $select_user->fetch(PDO::FETCH_OBJ);
        // var_dump($row);
        $userid = $row->userid;
        if($newpassword == $confirmpassword){
          $update_user = $pdo->prepare("UPDATE `tbl_user` SET `password`=:newpassword where `userid`=:userid");
          $update_user->bindParam(":newpassword",$newpassword);
          $update_user->bindParam(":userid",$userid);
          $update_user->execute();
         /* if($update_user->rowCount()){ */
             if($update_user->execute()){
              ?>
              <script>
                window.addEventListener("load",showSweetAlert);
                function showSweetAlert(){
                    swal({
                        title:"Success",
                        text:"Password Updated Successfully, You will be Logout. Please Login Again",
                        icon:"success",
                        showConfirmButton:false,
                        showCancelButton:false
                    });
                }
              </script>

              <?php 
              header("refresh:2;logout.php");
          }else{
              ?>
              <script type="text/javascript">
                window.addEvenListener("load",showSweetAlert);
                function showSweetAlert(){
                    swal({
                        title:"Operation Failed",
                        text:"Please Try After Some Time",
                        icon:"error",
                        button:"Try Again"
                    });
                }
              </script>
              <?php 
          }
        }else{
            //echo "Please Enter New Password and Confirm Password";
            ?>
            <script>
                window.addEventListener("load",showSweetAlert);
                function showSweetAlert(){
                    swal({
                        title:"Password Don't Match",
                        text:"New Password and Confirm Password Should Be Same",
                        icon:"error",
                        button: "Retry"
                    });
                }
            </script>
            <?php 
        }
    }else{
        //echo "Enter Correct Old Password";
        ?>
        <script type="text/javascript">
            window.addEventListener("load", showSweetAlert);
            function showSweetAlert(){
                swal({
                    title: "Old Passwrod Error",
                    text: "Enter Correct Old Password",
                    icon: "error",
                    button: "Retry",
                });
            }
        </script>
        <?php 
    }

  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
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
        <div class="row">
          <div class="col-lg-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Change Password</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="post" action="">
                <div class="box-body">
                  
                  <div class="form-group">
                    <label for="oldpassword">Old Password</label>
                    <input type="text" class="form-control" id="oldpassword" placeholder="Old Password" name="txtoldpassword" required>
                  </div>
                  <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" id="newpassword" placeholder="New Password" name="txtnewpassword" required>
                  </div>
                  <div class="form-group">
                    <label for="newpassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="newpassword1" placeholder="Confirm Password" name="txtconfirmpassword" required>
                  </div>
                  
                  
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="btnupdate">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once "./footer.php"; ?>
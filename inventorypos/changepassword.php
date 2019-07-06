<?php require_once "./header.php"; 
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
          echo $update_user->rowCount();
          die();
        }
    }else{

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
                    <input type="text" class="form-control" id="oldpassword" placeholder="Old Password" name="txtoldpassword">
                  </div>
                  <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" id="newpassword" placeholder="New Password" name="txtnewpassword">
                  </div>
                  <div class="form-group">
                    <label for="newpassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="newpassword1" placeholder="Confirm Password" name="txtconfirmpassword">
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
<?php  $pdo = new pdo("mysql:host=localhost;dbname=crud_db","root",""); ?>
<?php
	
	if(isset($_POST['editProductSubmit'])){
		$id = trim($_POST["id"]);
		$productname = trim($_POST["productname"]);
        $productprice = trim($_POST["productprice"]);
        if(!empty($productname) && !empty($productprice)){
        $update_product = $pdo->prepare("UPDATE `tbl_product` SET `productname` = :productname,`productprice`=:productprice where `id` = :tbl_product_id");
        $update_product->bindParam(":productname",$productname);
        $update_product->bindParam(":productprice",$productprice);
        $update_product->bindParam(":tbl_product_id",$id);
        $update_product->execute();
        }else{
            echo "<br>Fields Are Empty, Please Check The Fields<br>";
        }
    }
    if(isset($_GET["delete"])){
        $id = trim($_GET["delete"]);
        $delete = $pdo->prepare("DELETE FROM `tbl_product` WHERE `id` = :id");
        $delete->bindParam(":id",$id);
        $delete->execute();
    }
    if(isset($_GET['edit'])){
		$id = trim($_GET['edit']);
		$get_product = $pdo->prepare("SELECT * FROM `tbl_product` where `id` = :id");
		$get_product->bindParam(':id',$id);
		$get_product->execute();
		$result = $get_product->fetch(PDO::FETCH_OBJ);
	}
	if(isset($_POST['addProductSubmit'])){
		$productname = trim($_POST['productname']);
		$productprice = trim($_POST['productprice']);
		if(!empty($productprice) && !empty($productname)){
			$insert = $pdo -> prepare("INSERT INTO `tbl_product`(`productname`,`productprice`) values (:name,:value)");
			$insert->bindParam(":name",$productname);
			$insert->bindParam(":value",$productprice);
			$insert->execute();
			if($insert->rowCount()){
				echo "<h3>Insert Successfull</h3>";
			}else{
				echo "<h3>Fail</h3>";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Data</title>
</head>
<body>
	<div>
		<form action="" method="POST">
			<input type="text" name="productname" id="productname" value="<?php if(isset($result->productname)){ echo $result->productname; } ?>" >
			<br>
			<input type="text" name="productprice" id="productprice" value="<?php if(isset($result->productprice)){ echo $result->productprice; } ?>" >
			<br>
			<?php if(isset($result->productname,$result->productprice)){ ?>
				<input type="hidden" name="id" value="<?php echo $result->id; ?>">
				<input type="submit" value="Edit Product" name="editProductSubmit">
			<?php }else{ ?>
				<input type="submit" value="Add Product" name="addProductSubmit">
			<?php } ?>
		</form>
	</div>
	<br>
	<table style="width:100%;border-collapse: collapse;" border="1" >
		<caption>Product Table</caption>
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$select= $pdo->prepare("SELECT * FROM `tbl_product`");
				$select->execute();
				while($row = $select->fetch(PDO::FETCH_OBJ)){ ?>
					<tr>
						<td><?php echo $row->id; ?></td>
						<td><?php echo $row->productname; ?></td>
						<td><?php echo $row->productprice; ?></td>
						<td><a href="<?php echo basename($_SERVER["PHP_SELF"]); ?>?edit=<?php echo $row->id; ?>">Edit</a></td>
						<td><a href="<?php echo basename($_SERVER["PHP_SELF"]); ?>?delete=<?php echo $row->id; ?>"">Delete</a></td>
					</tr>

				<?php } ?>
		</tbody>

	</table>
</body>
</html>

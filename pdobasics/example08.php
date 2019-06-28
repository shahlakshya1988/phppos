<?php  $pdo = new pdo("mysql:host=localhost;dbname=crud_db","root",""); ?>
<?php
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
	<title>HTML Table - Displaying The Data</title>
</head>
<body>
	<div>
		<form action="" method="POST">
			<input type="text" name="productname" id="productname">
			<br>
			<input type="text" name="productprice" id="productprice">
			<br>
			<input type="submit" value="Add Product" name="addProductSubmit">
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

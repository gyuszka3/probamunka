<?php 
require 'vendor/autoload.php';
require 'class/Add.php';
if(isset($_POST["new"]))
{
	$add=new Add();
	$add->insert_new($_POST["lang_code"],$_POST["entity_type"],$_POST["full_url"],$_POST["http_code"],$_POST["action"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Próbafeladat</title>
	<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
	<script type="text/javascript" src="vendor/components/jquery/jquery.js"></script>
	<script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="container-fluid bg-dark">
	<div class="">
		<div class="row col-12 py-3 justify-content-around">
			<button class="text-center col-2 btn btn-light">Új bejegyzés létrehozása</button>
			<button class="text-center col-2 btn btn-light">Bejegyzés frissítése</button>
			<button class="text-center col-2 btn btn-light">Bejegyzés feloldása url alapján</button>
			<button class="text-center col-2 btn btn-light">Entitáshoz tartozó url-ek lekérdezése</button>
		</div>
		<div class="content" id="nav-tabContent">
			<form method="post" action="" class="form-group text-light p-2 d-none">
				<label>Nyelvi kód:</label>
				<input class="form-control" type="text" name="lang_code">
				<label>Entitás típus:</label>
				<select class="form-control" name="entity_type">
					<option value="PARTNER">PARTNER</option>
					<option value="CONTENT">CONTENT</option>
					<option value="FAMILY">FAMILY</option>
					<option value="PRODUCT">PRODUCT</option>
					<option value="USER">USER</option>
				</select>
				<label>Teljes URL:</label>
				<input class="form-control" type="text" name="full_url">
				<label>HTTP kód:</label>
				<input class="form-control" type="number" name="http_code">
				<label>Elvégezendő metodús:</label>
				<input class="form-control mb-3" type="text" name="action">
				<input class="btn btn-light form-control" type="submit" name="new" value="Hozzáad">
			</form>
		</div>
	</div>
</div>
</body>
</html>
<?php
require 'vendor/autoload.php';
require 'class/Add.php';
require 'class/Del_old.php';
require 'class/Update.php';
require 'class/Resolve.php';
require 'class/Entity_url.php';

$update=new Update();
if (isset($_POST["new"])) {
    $add=new Add();
    $add->insert_new($_POST["hostname"], $_POST["lang_code"], $_POST["entity_type"], $_POST["http_code"], $_POST["action"], $_POST["parts"]);
}
if (isset($_POST["remove"])) {
    $remove=new Del_old();
    $remove->delete();
}
if (isset($_POST["update"])) {
    $update->update($_POST["update_id"], $_POST["module_id"], $_POST["module_type"], $_POST["lang_code"], $_POST["action"], $_POST["full_url"]);
}
if (isset($_POST["resolve"])) {
    $resolve=new Resolve();
    $resolve->resolve($_POST["full_url"]);
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
            <button class="btn mb-1 btn-light">Új bejegyzés létrehozása</button>
            <button class="btn mb-1 btn-light">Bejegyzés frissítése</button>
            <button class="btn mb-1 btn-light">Idejétmúlt bejegyzések törlése</button>
            <button class="btn mb-1 btn-light">Bejegyzés feloldása url alapján</button>
            <button class="btn mb-1 btn-light">Entitáshoz tartozó url-ek lekérdezése</button>
        </div>
        <div class="content" id="nav-tabContent">
            <form method="post" action="" class="form-group text-light p-2 d-none">
                <label>Hosztnév:</label>
                <input class="form-control" type="text" name="hostname" pattern="{0,2}">
                <label>Nyelvi kód:</label>
                <input class="form-control" type="text" name="lang_code" pattern="{0,2}">
                <label>Entitás típus:</label>
                <select class="form-control" name="entity_type">
                    <option value="PARTNER">PARTNER</option>
                    <option value="CONTENT">CONTENT</option>
                    <option value="FAMILY">FAMILY</option>
                    <option value="PRODUCT">PRODUCT</option>
                    <option value="USER">USER</option>
                </select>
                <label>HTTP kód:</label>
                <input class="form-control" type="number" name="http_code">
                <label>Elvégezendő metodús:</label>
                <input class="form-control " type="text" name="action">
                <label>Részek:</label>
                <input class="form-control" type="text" name="parts[]">
                <a class="btn link mb-3">Rész hozzáadása</a>
                <input class="btn btn-light form-control" type="submit" name="new" value="Hozzáad">
            </form>
            <form method="post" action="" class="form-group text-light p-2 d-none">
                <select class="form-control" name="update_id">
        <?php
                        $result=$update->list();
        foreach ($result as $value) {
            echo "<option value=$value>$value</option>";
        }
                        unset($result);
        ?>
                </select>
                <label>Modul azonosito:</label>
                <input class="form-control" type="text" name="module_id">
                <label>Modul típus:</label>
                <input class="form-control" type="text" name="module_type">
                <label>Nyelvi kód:</label>
                <input class="form-control" type="text" name="lang_code">
                <label>Elvégzendő metodús:</label>
                <input class="form-control mb-3" type="text" name="action">
                <label>Teljes URL:</label>
                <input class="form-control mb-3" type="text" name="full_url">
                <input class="btn btn-light form-control" type="submit" name="update" value="Frissités">
            </form>
            <form method="post" action="" class="form-group text-light p-2 d-none">
                <input class="btn btn-light form-control" type="submit" name="remove" value="Törlés">
            </form>
            <form method="post" action="" class="form-group text-light p-2 d-none">
                <label>Teljes URL:</label>
                <input class="form-control mb-3" type="text" name="full_url">
                <input class="btn btn-light form-control" type="submit" name="resolve" value="Feloldás">
            </form>
            <form method="post" action="" class="form-group text-light p-2 d-none">
                <label>Entitás azonosítoja:</label>
                <input class="form-control" type="number" name="entity_id">
                <input class="btn btn-light form-control" type="submit" name="urls" value="Listázás">
            </form>
        </div>
        <div>
    <?php
    if (isset($_POST["urls"])) {
        $entity_url=new Entity_url();
        $result=$entity_url->get_ids($_POST["entity_id"]);
    }
    if (isset($result) && $result) {
        echo "<table class='table table-dark'>";
        foreach ($result as $value) {
            echo "<tr><td>".$value."</td></tr>";
        }
        echo "</table>";
    }
    ?>
        </div>
    </div>
</div>
</body>
</html>
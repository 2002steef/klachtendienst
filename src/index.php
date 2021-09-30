<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Klachtverwerking</title>
</head>
<body>
<div id='formContainer' class='container'>
    <form class="mt-3 mb-3 p-2 rounded" method='post' action='process.php'>
        <h1>Stuur je klachten hier!</h1>
        <div class="mb-3 p-2 rounded">
            <label for="inputName" class="form-label">Naam</label>
            <input name="name" type="text" class="form-control" id="inputName" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 p-2 rounded">
            <label for="inputEmail" class="form-label">Email-addres</label>
            <input name="email" type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 p-2 rounded">
            <label for="inputComplaint" class="form-label">klacht</label>
            <input name="complaint" type="text" class="form-control" id="inputComplaint" aria-describedby="emailHelp">
        </div>
        <?php
        if(isset($_SESSION["success"])) {
            $success = htmlentities(strval($_SESSION["success"]));
            echo "<div class='alert alert-success' role='alert'>$success</div>";
            unset($_SESSION["success"]);
        }
        if(isset($_SESSION["warning"])) {
            $warning = htmlentities(strval($_SESSION["warning"]));
            echo "<div class='alert alert-warning' role='alert'>$warning</div>";
            unset($_SESSION["warning"]);
        }
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

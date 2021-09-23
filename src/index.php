<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        body {
            background-color: var(--bs-dark);
        }

        form {
            background-color: var(--bs-gray-400);
            color: #000;
        }

        form > div {
            background-color: var(--bs-gray-500);
        }

        form h1 {
            text-align: center;
        }

        #formContainer {
            max-width: 35rem;
        }
    </style>
    
    <title>Klachtverwerking</title>
</head>
<body>
    <div id='formContainer' class='container'>
        <form class="mt-3 mb-3 p-2 rounded" method='post' action='process.php'>
            <h1>Stuur je kkr klachten hier!</h1>
            <div class="mb-3 p-2 rounded">
                <label for="inputName" class="form-label">Naam</label>
                <input name="name" type="text" class="form-control" id="inputName" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 p-2 rounded">
                <label for="inputEmail" class="form-label">Email-addres</label>
                <input name="email" type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 p-2 rounded">
                <label for="inputComplaint" class="form-label">Naam</label>
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

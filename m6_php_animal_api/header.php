<?php
session_start();
include './includes/functions.php';

if (!isset($_SESSION["validUserData"]) && !strpos($_SERVER['SCRIPT_FILENAME'], 'index.php'))
    ani_redirect('./');

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Animals API PHP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/styles.css">

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-success">
            <div class="container-fluid">
                <a class="navbar-brand   pe-3   " href="./home.php">Zoo-Animal WebSite</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if (isset($_SESSION["validUserData"])) :
                        $menu_items = json_decode(file_get_contents('./local_data/menu.json'));
                    ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
                        <?php foreach ($menu_items as $item) : ?>
                        <li class="nav-item  pe-3 ">
                            <a class="nav-link fw-bolder fa-solid
                                    <?= strpos($_SERVER['SCRIPT_FILENAME'], $item->script_name) ? "active" : null ?>"
                                aria-current="page" href="./<?= $item->script_name ?>">
                                <?= $item->title ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div>
                        <span class="me-3 fw-bolder fa-solid"><?= $_SESSION["vaildUserName"] ?></span>
                        <a href="./auth/logout.php" class="btn btn-danger">Logout</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <!-- The closing tag is in footer.php -->
<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <title>Привет мир!</title>
    <style>
        header {border-bottom: 1px solid gray;}
        footer {border-top: 1px solid gray; padding-top: 10px;}
        .filmList img {width: 100px; border: 1px solid gray; border-radius: 25%;}
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Date Range Picker JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

</head>
<body>

<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=$_SERVER['PHP_SELF']?>">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!--<li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo $_SERVER['PHP_SELF'];?>">Home</a>
                    </li>-->
                    <li class="nav-item">
                        <!-- Построю ссылку на себя, и передам переменную GET с именем cmd равную 1 -->
                        <a class="nav-link" aria-current="page" href="<?=$_SERVER['PHP_SELF']?>?cmd=4"> Spotify Albums </a>
                    </li>
                    <li class="nav-item">
                        <!-- Построю ссылку на себя, и передам переменную GET с именем cmd равную 1 -->
                        <a class="nav-link" aria-current="page" href="<?=$_SERVER['PHP_SELF']?>?cmd=3"> Spotify Search </a>
                    </li>
                    <li class="nav-item">
                        <!-- Построю ссылку на себя, и передам переменную GET с именем cmd равную 1 -->
                        <a class="nav-link" aria-current="page" href="<?=$_SERVER['PHP_SELF']?>?cmd=1"> AutoSearch </a>
                    </li>
                    <li class="nav-item">
                        <!-- Построю ссылку на себя, и передам переменную GET с именем cmd равную 1 -->
                        <a class="nav-link" aria-current="page" href="<?=$_SERVER['PHP_SELF']?>?cmd=2"> By DOB </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</header>

<div class="container">
    <div class="row">
        <aside class="col-3">
            <?php require_once ("aside.php"); ?>
        </aside>
        <main class="col-9" id="main">
<?php

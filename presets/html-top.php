<?php 
    require_once("isSessionUp.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="presets/css/style.css">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <title><?= $title ?></title>

    <?php 
        require("links.php");
    ?>
    <!-- <style>
        a {
            text-decoration: none;
        }
        body { 
            overflow-y: hidden;
            position: relative;
            width: 100%;
        }
        img {
            width: 100%;
            opacity: 75%;
            border-bottom: #64638F solid 5px;
            box-shadow: #8D93AB 2px 0 5px;
        }

        /* ------------------------------ */

        .navEdit {
            background-color: #F1F3F8 !important;
            box-shadow: 0 0 5px 1px #64638F;
            margin-bottom: 2em;
        }
        .txtAlign {
            font-size: 2rem;
            text-align: center !important;
            margin: 0 auto;
            color: #8D93AB !important;
        }
        .iconST {
            opacity: 35%;
        }
        .title {
                position: absolute; left: 45.3125em;
        }
        
        /* ------------------------------- */

        @media all and (max-width: 1267px) {
            .title {
                position: absolute; left: 35em;
            }
            /* 
                não é perfeito, mas ajuda com a resolução... 
                principalmente pq eu tava usando isso invés 
                de tela cheia: https://i.imgur.com/xrLc11z.png kk
            */
        }

        @media all and (max-width: 991px) {
            .title {
                position: absolute; left: 25em; bottom: 10.64em;
            }
        } 
        @media all and (max-width: 754px) {
            .title {
                position: absolute; left: 20em; bottom: 10.64em;
            }
        }

    </style> -->
</head>
<body>
    <main>
    <?php require_once("nav-bar.php"); ?>
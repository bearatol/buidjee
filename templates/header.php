<?
$arUser = OTHER\User::getUser();
define('URI', Router::getURI());
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Task book</title>

   <!-- meta -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="robots" content="noindex, nofollow">

   <!-- style -->
   <link rel="stylesheet" href="/templates/style/bootstrap.min.css">
   <link rel="stylesheet" href="/templates/style/bootstrap-grid.min.css">
   <link rel="stylesheet" href="/templates/style/bootstrap-reboot.min.css">
   <link rel="stylesheet" href="/templates/style/style.css?<?= time() ?>">

   <!-- script -->
   <script src="/templates/script/jquery-3.5.1.min.js"></script>
   <script src="/templates/script/bootstrap.min.js"></script>
   <script src="/templates/script/bootstrap.bundle.min.js"></script>
   <script src="/templates/script/script.js?<?= time() ?>"></script>

   <!-- other -->

</head>

<body>
   <div class="all_content">
      <div class="content_with_header">
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/"><i>Buidjee</i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
               <ul class="navbar-nav mr-auto">
                  <? if (!empty($arUser["login"])) : ?>
                     <li class="nav-item">
                        <a href="/user/" class="nav-link active">
                           <b><?= $arUser["login"] ?></b>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="/user/?page=logout" class="nav-link">
                           Logout
                        </a>
                     </li>
                  <? else : ?>
                     <li class="nav-item">
                        <a href="/user/?page=reg" class="nav-link <?= URI == 'user' && $_GET['page'] == 'reg'  ? 'active' : '' ?>">
                           Registration
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="/user/?page=auth" class="nav-link <?= URI == 'user' && $_GET['page'] == 'auth' ? 'active' : '' ?>">
                           Login
                        </a>
                     </li>
                  <? endif; ?>
               </ul>
            </div>
         </nav>
         <div class="content container">
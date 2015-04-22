<?php
// Start the session
session_start();
?>

<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <title><?= $data['title'] . ' - ' . SITETITLE ?></title>
   <link rel="stylesheet" href="<?= URL::STYLES('style') ?>">
   <!-- Latest compiled and minified CSS -->
   <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
   -->
   <link rel="stylesheet" href="<?= URL::STYLES('bootstrap.min') ?>">

   <!-- Optional theme -->
   <link rel="stylesheet" href="<?= URL::STYLES('bootstrap-theme.min') ?>">
   <link href="<?= URL::STYLES('font-awesome.min') ?>" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="<?= URL::DROPZONECSS('dropzone') ?>">

   <!-- Bootstrap core CSS -->
   <script src="<?= URL::SCRIPTS('jquery.min') ?>"></script>

    <!-- Custom styles for this template -->
    </head>
<body>

   <div class="container">
      <nav class="navbar navbar-default" role="navigation">
         <div class="navbar-header">
            <a class="navbar-brand" href="<?= DIR ?>">pustapu</a>
         </div>
         <form class="navbar-form navbar-right form-search" role="search" action="<?= DIR ?>products/search" method="GET">
            <div class="form-group">
               <div class="input-group">
                  <!--<input class="form-control" type="search" name="q" placeholder="Suchbegriff">
                  <span class="input-group-btn">
                     <button type="submit" class="btn btn-default">Suchen</button>
                  </span>-->
               </div><!-- /input-group -->
            </div>
         </form>
         <!--<ul class="nav navbar-nav navbar-right">
            <li><a href="<?= DIR ?>products/add">neues <strong>Produkt</strong></a></li>
         </ul>-->
      </nav>
      <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">CF</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="<?= DIR ?>sessi/set_session/ga" class="btn btn-default">GA</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">GL</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">IR</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">KV</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">KW</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">TC</a>
        </div>
      </div>
      <br>
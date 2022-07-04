<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>myWeb</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
 
    
  </head>
  <body>

    <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
      <div class="container">
        <a class="navbar-brand" href="#">Secret Keeper</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            
            <?php  if (isset($_SESSION['userId'])) {
                echo '<li class="nav-item"><a class="nav-link" href="inc/logout_inc.php">Logout</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/php-crash/feedback/about.html">About</a></li>';

            }else {
                echo  <<<EOL
                      <li class="nav-item"><a class="nav-link" href="/php-crash/feedback/about.html">About</a></li>
                      <li class="nav-item"><a class="nav-link" href="#" onclick="document.getElementById('id01').style.display='block'" >Login</a></li>
                      <li class="nav-item"><a class="nav-link" href="#" onclick="document.getElementById('id02').style.display='block'">Signup</a></li>
                      EOL;
            } ?>
            
          </ul>
        </div>
    </div>
  </nav>
  <main>
    <div class="container d-flex flex-column align-items-center form-div">
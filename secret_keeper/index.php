<?php  include_once 'includes/header.php' ?>
      
      <h2>Secret Keeper</h2>
      <p class="lead text-center">What is your secret messege..
      </p>
      <p class="lead text-center" > Secret Messege will save your secret for you.</p>
      

      

             <?php ?>

<?php  if (isset($_SESSION['userId'])) {
                echo  '<form action="inc/secretPass_inc.php" method="post" class="mt-4 w-75">
                <div class="mb-3">
                  <label for="secrets" class="form-label">Type your Messege..</label>
                   <textarea class="form-control" id="secrets" name="secrets" placeholder="Enter your secret here"></textarea>
                </div>
                
                <div class="mb-3">
                  <input type="submit" name="submit" value="Send" class="btn btn-dark w-100 ">
        
                </div>
              </form>'; 

            }else {
              echo <<<EOL
              <div class="col-md-12 text-center my-5 log-buttons align-items-center " >
                
                <a href="#" onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary btn-lg me-5 w-25 btn-light log-r log-but" role="button" aria-pressed="true">Login</a>
                <a href="#" onclick="document.getElementById('id02').style.display='block'" class="btn btn-primary btn-lg w-25 btn-light log-but" role="button " aria-pressed="true">Signup</a>
                
              </div>
              EOL;
            } ?>

      </div>
      <?php
        
        ?>

<!-- login Model -->
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="inc/login_inc.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="lname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="lpass" required>
        
      <button type="submit" class="btn btn-dark log-r"  name="submit" >Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">

      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>



<!-- signup model -->

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="inc/signup_inc.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/avatar.png" alt="Avatar" class="avatar">
    </div>
        <div>
          <?php  if(isset($GET['error'])) {
            if ($GET['error'] === 'emptyInput') {
              echo ' <p class="text-warning text-center" >fill the forms<p>';
            }else if ($GET['error'] === 'invalidEmail') {
              echo ' <p class="text-warning text-center" >invalid email<p>';
            }else if ($GET['error'] === 'invalidUid') {
              echo ' <p class="text-warning text-center" >invalid username<p>';
            }else if ($GET['error'] === 'passNotMatch') {
              echo ' <p class="text-warning text-center" >password is not matching<p>';
            }else if ($GET['error'] === 'uidExists') {
              echo ' <p class="text-warning text-center" >username is taken<p>';
            }else if ($GET['error'] === 'stfailed') {
              echo ' <p class="text-danger text-center" >something went wrong, try again!<p>';
            }
          } ?>
         
        </div>

    <div class="container">
      <label for="uname"><b>Name</b></label>
      <input type="text" placeholder="Enter Username" name="name" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter email" name="email" required>

      <label for="uid"><b>Username</b></label>
      <input type="text" placeholder="User Name" name="uid" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>
      
      <label for="pass_re"><b>Repeat Password</b></label>
      <input type="password" placeholder="Enter Password again" name="pass_rep" required>
      
      <button type="submit" name="submit" class="btn btn-dark log-r" >Signup</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

  </form>
</div>



<?php  include_once 'includes/footer.php' ?>
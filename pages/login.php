<?php
session_start();
?>
<?php
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_search = "select * from User where email= '$email' and ststus='active' ";
  $query = mysqli_query($con, $email_search);
  $email_count = mysqli_num_rows($query);

  if($email_count){
    $email_pass = mysqli_fetch_assoc($query);
    $db_pass = $email_pass['password']
    $_SESSION['username'] = $email_pass['name'];
    $pass_decode = password_verify($password, $db_pass);

    if($pass_decode){

    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" , href="./style.css" />
    <title>ComicTube</title>
  </head>
  <body>
    <section class="header">
      <div id="head">
        <h3>ComicTube</h3>
      </div>
    </section>
   <div>
   <?php
    
    if($_SESSION['status']){
      echo $_SESSION['status'];
    }
    else {
      echo $_SESSION['status'] = "Please login again";
    }
   ?>
   </div>
    

    <section id="registration">
      <div id="register-card">
        <div id="register-header">
          <h3>Login</h3>
        </div>
        <div class="form-div" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST">
          <form>
            <input
              class="field"
              type="email"
              name="email"
              placeholder="Email"
            />
            <input
              class="field"
              type="password"
              name="password"
              placeholder="Password"
            />

            <button type="submit" class="btn">Submit</button>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>

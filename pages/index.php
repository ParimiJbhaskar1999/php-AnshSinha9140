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
    <section id="registration">
      <div id="register-card">

        <div id="register-header">
            <h3>Register</h3>
        </div>
        <div class="form-div">
            <form method="POST", action="app.php">
              <input
                class="field"
                type="text"
                name="name"
                placeholder="Your Name"
             ></input>
  
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
         
              <button type="submit" name="register_btn" class="btn" >
                Submit
              </button>
  
              
            </form>
          </div>
      </div>
    </section>
  </body>
</html>

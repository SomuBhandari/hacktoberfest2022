<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../assests/css/teachers.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<section id="banner">
    <div id="regback"></div>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Hello Instructors!</h3>
                <p>Signup here for a amazing teaching experience</p>
                <p>Already hava a account? <b><a href="./login.php">Login</a> </b></p>
            </div>
            <div class="col-md-9 register-right">
                        <h3 class="register-heading">Sign Up Here</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <form action="school.php" method="post" onSubmit = "return checkPassword(this)">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="fname" placeholder="Full Name *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pass" placeholder="Password *" value="" required />
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="cpass" placeholder="Confirm Password *" value="" required/>
                                </div>
                                
                                <input type="submit" class="btnRegister" name="regsiter"  value="Register"/>
                            </div>
                            </form>
                        </div>
                
            </div>
        </div>

    </div>

</section>



</body>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    particlesJS.load('regback', '../particlesjs.json', function(){
      console.log('particlesjs-config.json loaded...');
    });
  </script>

<script> 
          
          // Function to check Whether both passwords 
          // is same or not. 
          function checkPassword(form) { 
              password1 = form.pass.value; 
              password2 = form.cpass.value; 

              // If password not entered 
              if (password1 == '') 
                  alert ("Please enter Password"); 
                    
              // If confirm password not entered 
              else if (password2 == '') 
                  alert ("Please enter confirm password"); 
                    
              // If Not same return False.     
              else if (password1 != password2) { 
                  alert ("\nPassword did not match: Please try again...") 
                  return false; 
              } 

              // If same return True. 
              else{ 
                  alert("Password Match: Welcome to Learnenmet!") 
                  return true; 
              } 
          } 
      </script> 
</html>
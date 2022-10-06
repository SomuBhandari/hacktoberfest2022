<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../assests/css/school.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php 
  
// Initialize the session 
session_start(); 
       
// Store the submitted data sent 
// via POST method, stored  
  
// Temporarily in $_POST structure. 

    
    $_SESSION['fname'] = $_POST['fname']; 

$pass = $_POST['pass'];

$_SESSION['pass'] = md5($pass);
  
$_SESSION['email'] = $_POST['email']; 

$cpass = $_POST['cpass']; 

$_SESSION['cpass'] = md5($cpass);

echo $_SESSION['fname'];

// if(isset)

           
?> 
<section id="banner">
    <div id="regback"></div>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Howdy Teachers</h3>
                <p>Signup here for a different learning experience</p>
                <p>Already hava a account? <a href="./login.html">Login</a> </p>
            </div>
            <div class="col-md-9 register-right">
                        <h3 class="register-heading">Sign Up here</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <form action="teacherreg.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="What would you like to name your class*" name="orgname" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="teacherreg.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="What would you like to teach the world*" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ssubject" placeholder="What Language you would like to teach in*" value="" required />
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <select class="form-control" name="experience">
                                                <option class="hidden"  selected disabled>Please tell us your teaching experience</option>
                                                <option value="0 years">0 years</option>
                                                <option value="1-2 years">1-2 years</option>
                                                <option value="3-5 years">3-5 years</option>
                                                <option value="5+ years">More than 5 years</option>
                                            </select>
                                </div>
                                <div class="form-group">
                                <select class="form-control" name="rating">
                                                <option class="hidden"  selected disabled>How would you rate yourself as per your online teaching confidence?</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                </div>
                                
                                <input type="submit" class="btnRegister" name="teacherreg"  value="Register"/>
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
</html>
 <!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="IGstyle.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" initial-scale="1.0 ">
      
        <title></title>
    </head>
    <body style="background-color:rgb(17, 16, 16);" >
    <div class="Form">
        <?php 
         if (isset($_POST["submit"])) {
            $Username = $_POST["Username"];
            $Password = $_POST["Password"];
            $errors = array();

             if (empty($Username) or empty($Password) ) {
                array_push($errors, "All fields are required");
             }
             
             if (strlen($Password)<8) {
                array_push($errors," Password must be atleast 8 characters long");
             }

             if (count($errors )>0) {
                foreach ($errors as $error) {
                   // echo " <div class='form-inputs'> $error</div>" ;
               
            
                }
             } else {
                require_once "IGdatabase.php";

                $sql = "INSERT INTO IG (Username, Password) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql );

                if ( $prepareStmt) {
                   mysqli_stmt_bind_param($stmt, "ss", $Username, $Password);
                   mysqli_stmt_execute($stmt);

                  // echo " <div class='form-inputs'> Login Successful</div>" ;
                } else {
                    die("Something went wrong");
                }
                
             }



         }
      
          
        ?>
        <form action="IGregistration.php" method="POST">  
       
        <div ><h class="heading">Instagram</h></div>
        <div class="form-inputs">
            <input type="text" class="form-box" placeholder="Username" name="Username">
        </div>
       
        
        <div class="form-inputs">
            <input type="password" class="form-box" placeholder="Password" name="Password">
        </div>
       
        <div class="form-inputs">
            <input type="submit" class="form-submit" value="Log in" name="submit">
        </div>
        <p class="para">Forgot your login details?<a class="hreff" href="IGregistration.php">Get help logging in.</a></p>
        <p style="text-align:center; margin-right :; color:white; font-size:20px; font-weight:bold;">OR</p><br><br><br><br><br><br><br><br><br><br><br><br>
        <hr>
        <p class="param">Don't have an account?<a class="hreff" href="IGregistration.php">sign up</a></p>

</div>

</body>
</html>
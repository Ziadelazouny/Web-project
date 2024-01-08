
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style1.css">
    <title>Travel Booking Sign In</title>
    
</head>
<body>

<div class="signin-container">
    <h2>Sign In</h2>
    <form action="#" method="post">
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <button type="submit">Sign In</button>
            <!-- <a href="main.php">Back to HomePage</a> -->
            <?php
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $DataBase = "clients";
            
                $conn = new mysqli($servername,$username,$password,$DataBase);
                
             
              
            $phone=$_POST['phone'];
              $password=$_POST['password'];
               $sql="SELECT * FROM clients WHERE password ='$password' AND phone='$phone'";
               $result=mysqli_query($conn,$sql);
             
              if(mysqli_num_rows($result) > 0){
              
                while($row = mysqli_fetch_assoc($result)) {
                    echo " <p style='color:green;'>Welcome Back ".$row['name']." ! </p>";
                  }
                echo "<script>
                setTimeout(() => {
                    window.location='main.html'
                }, 3000);
              </script>";
              }else{
                
                echo " <p style='color:red;'>Incorrect Username Or Password ! </p>";
              }
            

mysqli_close($conn);
            }

            ?>
           
        </div>
    </form>
</div>

</body>
</html>

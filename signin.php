<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Booking Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signin-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .signin-container h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
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
                $DB = "users";
            
                $conn = new mysqli($servername,$username,$password,$DB);
                
            
               if(!$conn){
                 echo"connection failed";
                     die("Connection failed: " . mysqli_connect_error());
                }
                   
              
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

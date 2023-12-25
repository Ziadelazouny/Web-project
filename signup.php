<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Booking Sign Up</title>
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

        .signup-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .signup-container h2 {
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

<div class="signup-container">
    <h2>Sign Up</h2>
    <form action="#" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Sign Up</button>
            <span>Not sure ? <a href="main.php">back to homepage </a></span>
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
       
   $name=$_POST['name'];
  $age=$_POST['age'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
$sql1="SELECT * from clients where phone='$phone'";
$result1=mysqli_query($conn,$sql1);
 $sql = "INSERT INTO  clients (name, email, phone,age,password)
 VALUES ('$name', '$email', '$phone','$age','$password')";
if ($result1->num_rows > 0){
    echo " <p style='color:red;'>This phone already exist ! </p>";

}else{
 $result=mysqli_query($conn, $sql);

if ($result) {
 
  echo " <p style='color:green;'>You have signed up successfully ! </p> 
  <span>you will be redirected to the homepage now </span>";
  echo "<script>
  setTimeout(() => {
      window.location='main.html'
  }, 3000);
</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
mysqli_close($conn);
    
}
    ?>
        </div>
    </form>

   
</div>

</body>
</html>

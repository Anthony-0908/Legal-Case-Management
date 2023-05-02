<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">
    <input type="email" name="email" placeholder="Enter Email" maxlength="50">

    <input type="password" name="password" placeholder="Enter Password" maxlength="20" minlength="8">

    <input type="submit" name="login" value="login">
</form>

<?php
include('./includes/connection.php');

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT email, password,  FROM admins WHERE email = '$email'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){
                //fetch mo muna yung user id, para ma sessidon papunta sa kabila
                 $_SESSION['email'] = $email;
                 $_SESSION['user_id'] = $row['user_id'];
                 $_SESSION['contact_number'] = $row['contact_number'];

                header("location: index.php");
                die();


            }
            else{
                echo '<script>alert("Incorrect credentials")</script>' ;
            }




}

}




}




?>

</body>
</html>

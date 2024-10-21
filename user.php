<?php
include 'connect.php' ;
if (isset($_POST['Submit'])){
    $name = $_POST ['name'];
    $email=$_POST ['email'];
    $Mobile =$_POST ['mobile'];
    $password =$_POST ['password'];

    $sql ="INSERT INTO crud (name,Email,Mobile,password) VALUES(' $name','  $email',' $Mobile',' $password')";
    $result = mysqli_query($con,$sql);
    if($result){
        // echo "Data inserted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="post" class="my-5">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required autocomplete="off">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required autocomplete="off">
            </div>
            
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="number" class="form-control" id="mobile"  placeholder="Enter your phone number" name="mobile" required autocomplete="off">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3" name="Submit">Submit</button>
        </form>
    </div>
</body>

</html>
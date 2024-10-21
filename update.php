<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `CRUD` WHERE id=$id"; // Corrected SQL statement
$result = mysqli_query($con, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    // Access values safely
    $name = isset($row['name']) ? $row['name'] : '';
    $email = isset($row['email']) ? $row['email'] : '';
    $mobile = isset($row['mobile']) ? $row['mobile'] : '';
    $password = isset($row['password']) ? $row['password'] : '';
} else {
    echo "No record found for the given ID.";
    exit; // Stop execution if no record is found
}
if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Corrected SQL statement
    $sql = "UPDATE `crud` SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Updated successfully";
        header('location:display.php');
    } 
    else {
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
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required autocomplete="off" value=<?php echo $name;?>>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required autocomplete="off" value=<?php echo $email;?> >
            </div>
            
            <div class="form-group">
                <label for="mobile">mobile</label>
                <input type="number" class="form-control" id="mobile"  placeholder="Enter your phone number" name="mobile" required autocomplete="off" value=<?php echo $mobile;?> >
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required autocomplete="off" value=<?php echo $password;?> >
            </div>
            
            
            <button type="submit" class="btn btn-primary mt-3" name="Submit">Update</button>
        </form>
    </div>
</body>

</html>
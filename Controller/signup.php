
<?php
include("connection.php");
if(isset($_POST['submit'])){
   $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);
    if($confirmpassword != $password ){
        echo "<script>alert('password does not match');window.location ='../views/signup.html'</script>";
    return;
    }

    $CheckQuery = "SELECT * FROM client WHERE email = '$email' AND password = '$password'";
    $CheckResult = mysqli_query($con, $CheckQuery);
    $CheckRows = mysqli_num_rows($CheckResult);
    if($CheckRows > 0){
        echo "<script>alert('account already exist');window.location ='../views/signup.html'</script>";
    }
    else{
        $sql ="INSERT into client( fullname, email,phonenumber,password,confirmpassword) values('$fullname', '$email', '$phonenumber', '$password', '$confirmpassword')";
    $result = mysqli_query($con, $sql);

    if($result){
        echo "<script>alert('account created successfully');window.location ='../views/login.html'</script>";

    }
    else{
        echo 'Form not saved, contact admin';
    }
    }

    
}

?>
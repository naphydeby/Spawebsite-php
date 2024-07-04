

<?php
include('connection.php');
if(isset($_POST["submit"]))
{
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$Query = "SELECT * FROM client WHERE email = '$email' AND password = '$password'";
$Result = mysqli_query($con, $Query);
$Rows = mysqli_num_rows($Result);
if($Rows > 0)
{
    // session_start();
    // $_SESSION['email'] = $email;
    
    
    echo "<script>alert('login successful');window.location ='../views/index.html'</script>";

}

else{
    echo "<script>alert('login failed');window.location ='../views/login.html'</script>";
}
}

?>
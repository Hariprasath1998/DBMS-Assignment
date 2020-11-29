<?php
    session_start();
    error_reporting(0);
    include('../includes/conn.php');
    include('../includes/header.php');
    if(isset($_POST['submit']))
{
    $username=$_POST['id'];
    $password=md5($_POST['pwd']);
    $query=mysqli_query($conn,"SELECT * FROM admin WHERE id='$username' and password='$password'");
    $num=mysqli_fetch_array($query);
    if($num>0){
        include('../includes/nav.php');
        $_SESSION['alogin']=$_POST['id'];
        $_SESSION['id']=$num['id'];
        $host=$_SERVER['HTTP_HOST'];
    }
    else{
        echo "Wrong Credentials";
        $_SESSION['errmsg']="Invalid username or password";
        $host  = $_SERVER['HTTP_HOST'];
    }
}
?>
<nav class="white z-depth-0">
    <div class="container">
        <a href="#" class="brand-logo brand-text left">Course Registration</a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
            <a href="../admin/index.php" class="btn brand z-depth-0">Admin</a>
            <a href="../student/index.php" class="btn brand z-depth-0">Student</a>
        </ul>
    </div>
</nav>

<form action="index.php" method="POST">
    <input type="text" name="id" placeholder="User ID" required="true"><br>
    <input type="password" name="pwd" placeholder="********" minlength="8" required="true"><br>
    <div class="center">
            <input type="submit" name="submit" value="Login" class="btn brand z-depth-0" >
        </div>
</form>

</body>
</html>
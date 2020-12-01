<?php
    include('../includes/conn.php');
    include('../includes/header.php');
    if(isset($_POST['submit']))
    {
    $username=$_POST['id'];
    $password=md5($_POST['pwd']);
    $query=mysqli_query($conn,"SELECT * FROM Students WHERE reg_num='$username' and password='$password'");
    $num=mysqli_fetch_array($query);
    if($num>0){
        $extra="registered.php";
        echo "Logged in";
        $_SESSION['login']=$_POST['id'];
        $_SESSION['id']=$num['reg_num'];
        $_SESSION['sname']=$num['Name'];
        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    else{
        echo "Wrong Credentials";
        $_SESSION['errmsg']="Invalid username or password";
        $extra="index.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
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

<section class="container grey-text">
    <form action="index.php" method="POST">
        
        <input type="text" name="id" placeholder="Register Number" >
        
        <input type="password" name="pwd" placeholder="********">
        
        <div class="center">
            <input type="submit" name="submit" value="Login" class="btn brand z-depth-0">
        </div>
    </form>
</section>

</body>
</html>
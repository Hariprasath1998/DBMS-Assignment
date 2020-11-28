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
        echo "Logged in";
    }
    else{
        echo "Wrong Credentials";
        $_SESSION['errmsg']="Invalid username or password";
    }
}
?>
<section class="container grey-text">
    <form action="index.php" method="POST">
        <!-- <label for="id">Register Number:</label> -->
        <input type="text" name="id" placeholder="Register Number" required="true">
        <!-- <label for="pwd">Password:</label> -->
        <input type="password" name="pwd" placeholder="********" minlength="8" required="true">
        <!-- <input type="submit" name="submit" value="submit" > -->
        <div class="center">
            <input type="submit" name="submit" value="Login" class="btn brand z-depth-0">
        </div>
    </form>
</section>

</body>
</html>
<?php
    include('../includes/conn.php');
    include('../includes/header.php');
    include('nav-admin.php');
    

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $reg=$_POST['reg'];
        $pwd=md5($_POST['pwd']);
        mysqli_query($conn,"INSERT INTO `Students` (`reg_num`, `Name`, `password`) VALUES ('$reg', '$name', '$pwd') ");
        echo $name;
        echo $reg;
        echo $pwd;
    }
    $query=mysqli_query($conn,"SELECT * FROM Students WHERE 1 ");
    $students=mysqli_fetch_all($query,MYSQLI_ASSOC);
    ?>

<section class="container grey-text">
    
    <form action="students.php" method="POST">
    <h5 class="center">Add Student:</h5>
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Student Name" >
        <label for="code">Register Number:</label>
        <input type="text" name="reg" placeholder="Register Number">
        <label for="creds">Password:</label>
        <input type="password" name="pwd" placeholder="********">
        
        <div class="center">
            <input type="submit" name="submit" value="Add" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<table class="centered">
        <thead>
          <tr>
              <th>Serial no:</th>
              <th>Name</th>
              <th>Register Number</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          $i=1;
          foreach ($students as $student) {?>
            <tr>
                <td><?php echo htmlspecialchars($i) ?></td>
                <td><?php echo htmlspecialchars($student['Name']) ?></td>
                <td><?php echo htmlspecialchars($student['reg_num']) ?></td>
                
                
          </tr>
    <?php
    
    $i+=1;
} ?>
        </tbody>

<?php include('../includes/footer.php'); ?>
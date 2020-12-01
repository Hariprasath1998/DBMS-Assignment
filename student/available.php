<?php
include('../includes/header.php');
include('../includes/conn.php');
error_reporting(0);
include('../includes/header.php');
include('nav-student.php');
$id=$_SESSION['login'];
echo "Register Number: ".$id;
$query=mysqli_query($conn,"SELECT * FROM Courses WHERE 1 ");
    $courses=mysqli_fetch_all($query,MYSQLI_ASSOC);
?>

<table class="centered">
        <thead>
          <tr>
              <th>Serial no:</th>
              <th>Name</th>
              <th>Course Code</th>
              <th>Credits</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          $i=1;
          foreach ($courses as $course) {?>
            <tr>
                <td><?php echo htmlspecialchars($i) ?></td>
                <td><?php echo htmlspecialchars($course['name']) ?></td>
                <td><?php echo htmlspecialchars($course['id']) ?></td>
                <td><?php echo htmlspecialchars($course['grade']) ?></td>
                
                
          </tr>
    <?php
    
    $i+=1;
} ?>
        </tbody>

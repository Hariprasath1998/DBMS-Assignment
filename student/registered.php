<?php

include('../includes/conn.php');
include('../includes/header.php');
include('nav-student.php');
$id=$_SESSION['login'];
echo "Register Number: ".$id;
$query=mysqli_query($conn,"SELECT * FROM log WHERE student_id='$id' ");
$courses=mysqli_fetch_all($query,MYSQLI_ASSOC);
?>

<table class="centered">
        <thead>
          <tr>
              <th>S.no:</th>
              <th>Course Code</th>
              <th>Approval</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          $i=1;
          foreach ($courses as $course) {?>
            <tr>
                <td><?php echo htmlspecialchars($i) ?></td>
                <td><?php $id=$course['course_id']; echo htmlspecialchars($id) ?></td>
                <td><?php if($course['approval']==0){
                    echo "Not yet";
                }else{echo "Approved";} ?></td>
                
                
          </tr>
    <?php
    
    $i+=1;
} ?>
        </tbody>
      </table>


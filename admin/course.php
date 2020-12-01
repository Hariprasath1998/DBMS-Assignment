<?php
    include('../includes/conn.php');
    include('../includes/header.php');
    include('nav-admin.php');
    

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $code=$_POST['code'];
        $creds=$_POST['creds'];
        mysqli_query($conn,"INSERT INTO `Courses` (`id`, `name`, `grade`) VALUES ('$code', '$name', '$creds');");
        echo $name;
        echo $code;
        echo $creds;
    }
    $query=mysqli_query($conn,"SELECT * FROM Courses WHERE 1 ");
    $courses=mysqli_fetch_all($query,MYSQLI_ASSOC);
    ?>

<section class="container grey-text">
    
    <form action="course.php" method="POST">
    <h5 class="center">Add Course:</h5>
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Course name" >
        <label for="code">Course Code:</label>
        <input type="text" name="code" placeholder="Course code">
        <label for="creds">Credits:</label>
        <input type="number" min="2" max="4" name="creds" placeholder="Credits">
        
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

<?php include('../includes/footer.php'); ?>
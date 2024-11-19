<?php include('header.php'); ?>
<?php include('dbcon.php') ?>
<div class="box1">
        <h2>All STUDENTS</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Add Students</button>

        </div>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

        </thead>
        <tbody>
           <!-- database connection -->
            <?php
            $query="select * from `students`";
            $result=mysqli_query($connection,$query);
            // Checking if the connection is successful or not
            if(!$result){
                die("Query Failed".mysqli_error());
            }
            else{
               while($row=mysqli_fetch_assoc($result)){
                ?>
                 <tr>
            <td><?php echo $row['id'];0 ?></td>
            <td><?php echo $row['first_name'];0 ?></td>
            <td><?php echo $row['last_name'];0 ?></td>
            <td><?php echo $row['age'];0 ?></td>
            <td><a href="update_page1.php?id=<?php echo $row['id'];0 ?>" class="btn btn-success">Update</a></td>
            <td><a href="delete_page1.php?id=<?php echo $row['id'];0 ?>" class="btn btn-danger">Delete</a></td>
            
            </tr>
                <?php
               }
            }

            ?>
           
           


        </tbody>
    </table>
    <?php
    if (isset($_GET['message'])) {
        echo "<h6 class='error-message'>".$_GET['message']."</h6>";
    }
    
    
    ?>
      <?php
    if (isset($_GET['insert_msg'])) {
        echo "<h6 style='color: green;'>".$_GET['insert_msg']."</h6>";
    }
    
    ?>
      <?php
    if (isset($_GET['update_msg'])) {
        echo "<h6 style='color: green;'>".$_GET['update_msg']."</h6>";
    }
    
    ?>
      <?php
    if (isset($_GET['delete_msg'])) {
        echo "<h6 style='color: red;'>".$_GET['delete_msg']."</h6>";
    }
    
    ?>
  
    <!-- Modal -->
    <form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add your form or inputs here -->
       
          <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" class="form-control" name="f_name" placeholder="Enter name" >
          </div>
          <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" class="form-control" name="l_name" placeholder="Enter name" >
          </div>

          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" placeholder="Enter age">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

    
    
<?php include('footer.php'); ?>
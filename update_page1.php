<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch student data
    $query = "SELECT * FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    // Checking if the query executed successfully
    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<!-- Handle Update Logic -->
<?php
if (isset($_POST['update_students'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['f_name']);
    $lname = mysqli_real_escape_string($connection, $_POST['l_name']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);

    // Update query
    $query = "UPDATE `students` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    // Check if update was successful
    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=You have successfully updated the data.');
        exit();
    }
}
?>

<!-- Update Form -->
<form action="update_page1.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" class="form-control" name="f_name" placeholder="Enter name" value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" class="form-control" name="l_name" placeholder="Enter name" value="<?php echo $row['last_name']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" name="age" placeholder="Enter age" value="<?php echo $row['age']; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>

<?php include('footer.php'); ?>

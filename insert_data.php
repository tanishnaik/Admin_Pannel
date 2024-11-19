<?php
include 'dbcon.php';
if (isset($_POST['add_students'])) {
    // Getting form data
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    // Checking if the first name is empty
    if ($fname == "" || empty($fname)) {
        header('location:index.php?message=You need to fill in the first name!');
    } else {
        // Corrected SQL query
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) VALUES ('$fname', '$lname', '$age')";

        // Execute the query
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            header('location:index.php?insert_msg=Your data has been added successfully');
        }
    }
}
?>

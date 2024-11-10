<?php
include 'conn.php';

if (isset($_GET['ID']) && isset($_POST['update'])) {
    $rollno = $_GET['ID'];
    $fullname = $_POST['Name'];
    $branch = $_POST['Department'];
    $salary = $_POST['Salary'];

    // Prepare and execute the update statement
    $update = "UPDATE teacher SET Name = ?, Department = ?, Salary = ? WHERE ID = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "ssss", $fullname, $branch, $salary, $rollno);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        echo "<script>alert('Update successful!'); window.location.href = 'view.php';</script>";
    } else {
        echo "<script>alert('No changes made or an error occurred.'); window.location.href = 'edit_teacher.php?ID=$rollno';</script>";
    }
} else {
    // Redirect if ID or update action is missing
    echo "<script>alert('Invalid request'); window.location.href = 'view.php';</script>";
}
?>

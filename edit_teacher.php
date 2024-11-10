<?php
include 'conn.php';

if (isset($_GET['ID'])) {
    $rollno = $_GET['ID'];

    // Prepare and execute a statement to fetch teacher details
    $select = "SELECT * FROM teacher WHERE ID = ?";
    $stmt = mysqli_prepare($conn, $select);
    mysqli_stmt_bind_param($stmt, "s", $rollno);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    // If no record found, show an error and stop script
    if (!$row) {
        die("No record found");
    }
} else {
    // Redirect if ID is missing in the URL
    echo "<script>alert('Invalid request: No ID provided'); window.location.href = 'view.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Teacher</title>
    <script>
        function validateForm() {
            let name = document.getElementById("Name").value;
            let salary = document.getElementById("Salary").value;

            if (name.trim() === "" || salary.trim() === "") {
                alert("Name and Salary cannot be empty.");
                return false;
            }
            if (isNaN(salary)) {
                alert("Salary must be a number.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <form id="Teacher_Registration" action="update_teacher.php?ID=<?php echo htmlspecialchars($rollno); ?>" method="post" onsubmit="return validateForm()">
        <div>
            <label for="ID">ID</label>
            <input value="<?php echo htmlspecialchars($row['ID']); ?>" type="text" id="ID" name="ID" readonly />
        </div><br>

        <div>
            <label for="Name">Name</label>
            <input value="<?php echo htmlspecialchars($row['Name']); ?>" type="text" id="Name" name="Name" placeholder="Enter Name" />
        </div><br>

        <div>
            <label for="Department">Department</label>
            <select name="Department" id="Department">
                <option value="CSE" <?php if ($row['Department'] == 'CSE') echo 'selected'; ?>>CSE</option>
                <option value="IT" <?php if ($row['Department'] == 'IT') echo 'selected'; ?>>IT</option>
                <option value="Mechanical" <?php if ($row['Department'] == 'Mechanical') echo 'selected'; ?>>Mechanical</option>
                <option value="Electrical" <?php if ($row['Department'] == 'Electrical') echo 'selected'; ?>>Electrical</option>
                <option value="Hotel Management" <?php if ($row['Department'] == 'Hotel Management') echo 'selected'; ?>>Hotel Management</option>
                <option value="Civil" <?php if ($row['Department'] == 'Civil') echo 'selected'; ?>>Civil</option>
            </select>
        </div><br>

        <div>
            <label>Salary</label><br>
            <input value="<?php echo htmlspecialchars($row['Salary']); ?>" type="text" name="Salary" id="Salary" placeholder="Enter Salary">
        </div><br>

        <div>
            <input type="submit" name="update" value="Update">
            <button type="button" onclick="window.location.href='view.php'">Back</button>
        </div>
    </form>
</body>
</html>

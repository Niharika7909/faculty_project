<?php
include 'conn.php';

if (isset($_GET['ID'])) {
    $rollno = $_GET['ID'];

    if ($conn) {
        // Prepare the DELETE SQL query
        $delete = "DELETE FROM teacher WHERE ID = ?";
        $stmt = mysqli_prepare($conn, $delete);

        if ($stmt) {
            // Bind the parameter and execute the query
            mysqli_stmt_bind_param($stmt, "s", $rollno);
            mysqli_stmt_execute($stmt);

            // Check if any rows were affected (deleted)
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                ?>
                <script type="text/javascript">
                    alert("Delete successful!");
                    window.location.href = 'view.php';  // Redirect to view.php
                </script>
                <?php
            } else {
                mysqli_stmt_close($stmt);
                ?>
                <script type="text/javascript">
                    alert("No record found or delete failed. Please try again.");
                    window.location.href = 'view.php';  // Redirect to view.php
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("Failed to prepare the delete statement. Please try again.");
                window.location.href = 'view.php';  // Redirect to view.php
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Database connection error.");
            window.location.href = 'view.php';  // Redirect to view.php
        </script>
        <?php
    }
} else {
    ?>
    <script type="text/javascript">
        alert("Invalid request: No ID provided.");
        window.location.href = 'view.php';  // Redirect to view.php
    </script>
    <?php
}
?>

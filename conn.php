<?php
$servername="localhost";
$username="root";
$password="";
$dbname="facultydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['ID'] ?? '';
        $fullname = $_POST['Name'] ?? '';
        $branch = $_POST['Department'] ?? '';
        $year = $_POST['Salary'] ?? '';
    
        // Validate data
        if (empty($id) || empty($fullname) || empty($branch) || empty($year)) {
            echo "Please fill all fields";
            exit;
        }
    
        $stmt = $conn->prepare("INSERT INTO teacher (ID, Name, Department, Salary) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $id, $fullname, $branch, $year);
        
        if ($stmt->execute() === TRUE) {
            echo "Registration successful";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
    

?> 
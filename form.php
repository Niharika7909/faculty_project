<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Faculty Registration</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <script>
            function validateForm() {
                var ID = document.getElementById("ID").value;
                var Name = document.getElementById("Name").value;
                var Department = document.getElementById("Department").value;
                var Salary = document.querySelector('input[name="Salary"]:checked');
                
                if (ID === "") {
                    alert("Please enter your ID");
                    return false;
                }

                if (Name === "") {
                    alert("Please enter your Full Name.");
                    return false;
                }

                if (Department === "") {
                    alert("Please select your teacher department");
                    return false;
                }

                if (Salary === "") {
                    alert("Please select salary");
                    return false;
                }

                alert("Form submitted successfully!");

                document.getElementById("registrationForm").style.display = "none";
                document.getElementById("successMessage").style.display = "block";

                return false; 
            }
        </script>
    </head>
    <body>
        <h1>Teacher Registration</h1>
        
        <form id="registrationForm" action="conn.php"method="post"
         onsubmit="return validateForm()">
            <div>
                <label for="ID">ID</label>
                <input type="text" id="ID" name="ID" placeholder="Enter ID"/>
            </div><br>

            <div>
                <label for="Name">Name</label>
                <input type="text" id="Name" name="Name" placeholder="Enter Name"/>
            </div><br>

            <div>
                <label for="Department">Department</label>
                <select name="Department" id="Department">
                    <option value="">Select Tdepartment</option>
                    <option>CSE</option>
                    <option>IT</option>
                    <option>Mechanical</option>
                    <option>Electrical</option>
                    <option>Hotel Management</option>
                    <option>Civil</option>
                </select>
            </div><br>

            <div>

                <label>Salary</label><br>
                <input type="text" name="Salary" id="Salary" placeholder="Enter salary">

            </div><br>

            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>

        </form><br>
        <script>
            function update(){
                window.open("view.php");
            }
        </script>
        <button onclick="update()">view table</button>
    </body>
</html>
<a href="form.php">Home</a>
<?php include'conn.php';?> 
<table border="1px" cellpadding="10" cellspacing="0"> 
  <tr> 
    <th>ID</th> 
    <th>Name</th> 
    <th>Department</th> 
    <th>Salary</th> 
    <th colspan="2">Action</th> 
  </tr> 
  <?php 
  $query = "SELECT * FROM teacher"; 
  $data = mysqli_query($conn, $query); 
  
  if(mysqli_num_rows($data) > 0) { 
    while($row = mysqli_fetch_array($data)) { 
  ?> 
  <tr> 
    <td><?php echo $row['ID'];?></td> 
    <td><?php echo $row['Name'];?></td> 
    <td><?php echo $row['Department'];?></td> 
    <td><?php echo $row['Salary'];?></td> 
    <td><a href="update.php?id=<?php echo $row['ID'];?>">Edit</a></td> 
    <td><a href="delete.php?id=<?php echo $row['ID'];?>">Delete</a></td> 
  </tr> 
  <?php 
    } 
  } else { 
  ?> 
  <tr> 
    <td>No Record Found</td> 
  </tr> 
  <?php 
  } 
  ?> 
</table>

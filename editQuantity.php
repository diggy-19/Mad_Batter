<?php
    // including the database connection file
    include("connect.php");
    session_start();
    $user= $_SESSION['user_name'];

    if(isset($_POST['update'])) {
        $id=$_POST['id'];
        $ingredient=$_POST['Ingredient'];
        $qty=$_POST['Quantity'];
        
        //checking empty fields
        if(empty($qty)) {	
                echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
                
        else {	
            //updating the table
            $update="UPDATE `user-pantry` SET Quantity='$qty' WHERE id='$id'";
            $result=$conn->query($update);
            if($result==TRUE) {		
                //echo "<font color='green'>Data updated successfully.";
                header("Location: UserProfile.php");
            }
            else {
                echo"Error: ".$insert."<br>".$conn->error;
            }
	    }
    }
    else {
        //getting id from url
        $id=$_GET['id'];

        //selecting data associated with this particular id
        $getdata = "SELECT * FROM `user-pantry` WHERE id='$id' ";
        $data=$conn->query($getdata);

        while($row = mysqli_fetch_assoc($data)){
            $ingredient=$row['Ingredient'];
            $qty=$row['Quantity'];
        }
    }
?>
<html>
<head>	
	<title>Edit Quantity</title>
</head>

<body>
	<a href='UserProfile.php'>Go back to my pantry</a>
	<br/><br/>
	
	<form name='form-edit' method='post' action='editQuantity.php'>
		<table border='0'>
			<tr> 
				<td>Ingredient</td>
				<td><?php echo $ingredient;?></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type='text' name='Quantity' value='<?php echo $qty;?>'></td>
            </tr>
			<tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type='submit' name='update' value='Update'></td>
			</tr>
		</table>
	</form>
</body>
</html>
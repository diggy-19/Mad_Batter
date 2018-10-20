<html>
<head>
	<title>Add Ingredient</title>
</head>

<body>
    <a href="UserProfile.php">Go back to My Pantry</a>
    <br/><br/>
    <form action="addIngredient.php" method="post" name="form-add">
        <table width="25%" border="0">
            <tr>
                <td>Ingredient</td>
                <td><input type="text" name="ingredient"></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="text" name="qty"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
<?php
//including the database connection file
include_once("connect.php");
session_start();
$user= $_SESSION['user_name'];
$getemail="SELECT EmailID from `user-profile` WHERE Username='$user'";
$result=$conn->query($getemail);
while($row = mysqli_fetch_assoc($result)){
    $email=$row['EmailID'];
}

if(isset($_POST['Submit'])) {	
	$ingredient = $_POST['ingredient'];
	$qty = $_POST['qty'];
		
	// checking empty fields
	if(empty($ingredient) || empty($qty)) {
				
		if(empty($ingredient)) {
			echo "<font color='red'>Ingredient field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
        $insert="INSERT INTO `user-pantry`(EmailID,Ingredient,Quantity) VALUES('$email','$ingredient','$qty')";
        if($conn->query($insert)==TRUE) {		
		    //display success message
            echo "<font color='green'>Data added successfully.";
            //header("Location : UserProfile.php");
        }
        else {
            echo"Error: ".$insert."<br>".$conn->error;
        }
	}
}
?>
</body>
</html>

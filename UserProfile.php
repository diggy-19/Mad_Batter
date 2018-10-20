<?php
    include('connect.php');
	session_start();
    $user= $_SESSION['user_name'];
    $getprofile="SELECT Username,FirstName,LastName,Bio,EmailID,Gender from `user-profile` where Username='$user'";
	$profile=$conn->query($getprofile);
	while($row = mysqli_fetch_assoc($profile)){
        $username=$row['Username'];
		$fname = $row['FirstName'];
		$lname=$row['LastName'];
		$bio=$row['Bio'];
		$email=$row['EmailID'];
		$gender=$row['Gender'];
    }

	// $addprofile="INSERT INTO `user-pantry` (EmailID,Ingredient,Quantity) VALUES ('$email','Flour','500')";
    // $entry=$conn->query($addprofile);
	
    $getratings="SELECT COUNT(Rating) as total_ratings from `recipe-ratings` WHERE EmailID='$email'";
    $ratings=$conn->query($getratings);
    while($row = mysqli_fetch_assoc($ratings)){
		$rating = $row['total_ratings'];
    }

    $getreviews="SELECT COUNT(Review) as total_reviews from `recipe-reviews` WHERE EmailID='$email'";
    $reviews=$conn->query($getreviews);
    while($row = mysqli_fetch_assoc($reviews)){
		$review = $row['total_reviews'];
    }

    $getrecipecount="SELECT COUNT(RecipeName) as total_recipes from `recipe` WHERE Author='$email'";
    $recipecount=$conn->query($getrecipecount);
    while($row = mysqli_fetch_assoc($recipecount)){
		$total_recipes = $row['total_recipes'];
    }

    $getingredients="SELECT * from `user-pantry` WHERE EmailID='$email'";
    $ingredients=$conn->query($getingredients);

    $getrecipes="SELECT * from `recipe` WHERE Author='$email'";
    $recipes=$conn->query($getrecipes);
	
// 	if(isset($_GET['Add']))
// 	{
// $Ingrd=$_GET['ingredient'];
// $Qty=$_GET['qty'];

// $sql = "INSERT INTO `user-pantry`(`EmailID`, `Ingredient`,`Quantity`)
//  VALUES ('$email','$Ingrd', '$Qty')";

//  if ($conn->query($sql) === TRUE) {
//     //echo "New record created successfully";
// 	header("Location:UserProfile.php");
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
// 	}

// 	if(isset($_GET['Edit']))
// 	{
// $Qtyup=$_GET['qty'];
// $Ingrdup=$_GET['ingredient'];
// $sql2 = "UPDATE `user-pantry` SET `Quantity`='$Qtyup' WHERE `Ingredient`='$Ingrdup'";

//  if ($conn->query($sql2) === TRUE) {
//     echo "New record created successfully";
	
// 	//header("Location:UserProfile.php");
// } else {
//     echo "Error: " . $sql2 . "<br>" . $conn->error;
// }
// 	}

	
// if(isset($_POST['Delete']))
// 	{
// $Ingrddel=$_POST['ingredient'];
// $sql1 = "DELETE FROM `user-pantry` WHERE `Ingredient`='$Ingrddel'";

// if(mysqli_query($conn, $sql1)){ 
//     echo "Record was deleted successfully."; 
// 	echo "Value to be deleted is:".$Ingrddel;
// }  
// else{ 
//     echo "ERROR: Could not able to execute $sql1. "  
//         . mysqli_error($conn); 
// }  	
// }	
	
echo"
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>".$username."'s Profile | Mad Batter</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Kotta One' rel='stylesheet'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    // <link rel='stylesheet' type='text/css' href='UserProfile_style.css'>
    <style>
        body {
    font-family: Montserrat, sans-serif;
    font: 400 15px;
    line-height: 1.8;
    padding:0;
    margin:0;
}

.container {
    color: #7b2e40;
}

.img-responsive {
    padding-left: 20px;
}

.col-sm-10 {
    align-content: center;
}

.h1 {
    padding-top: 20px;
    text-align: center;
}

.save-button {
    float: right;
}

.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}

.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}

.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}

.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}

.table-title .add-new i {
    margin-right: 4px;
}

table.table {
    table-layout: fixed;
}

table.table tr th,
table.table tr td {
    border-color: #e9e9e9;
}

table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}

table.table th:last-child {
    width: 100px;
}

table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}

table.table td a.add {
    color: #27C46B;
}

table.table td a.edit {
    color: #FFC107;
}

table.table td a.delete {
    color: #E34724;
}

table.table td i {
    font-size: 19px;
}

table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}

table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}

table.table .form-control.error {
    border-color: #f50000;
}

table.table td .add {
    display: none;
}

.btn-block {
    background-color: #d8494f;
    color: #fff;
}

.list-group,
.recipe-section {
    padding-top: 50px;
}

.thead-deep,
.th,
.list-group-item-title {
    background-color: #89382c;
    color: #fff;
}

.added-recipes {
    color: #7b2e40;
}


/*NAVBAR*/

.navbar {
    margin-bottom: 0;
    background-color: #7b2e40;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px; 
    border-radius: 0;
    font-family: Montserrat, sans-serif;
    font-variant: small-caps;
}

.navbar li a,
.navbar .navbar-brand {
    color: #fff !important;
}

.navbar-nav li a:hover,
.navbar-nav li.active a {
    color: #7b2e40 !important;
    background-color: #fff !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #7b2e40 !important;
}

.collapse navbar-collapse {
    border-top: none;
}


/*end of NAVBAR*/

.button {
    background-color: #7b2e40;
    color: #fff;
    border: #7b2e40;
}

.button:hover {
    background-color: #fff;
    color: #7b2e40;
}


/* footer */

footer-bs {
    position: absolute;
    background-color: #7b2e40;
    padding: 60px 40px;
    color: #7b2e40;
    margin-bottom: 20px;
    border-bottom-right-radius: 6px;
    border-top-left-radius: 0px;
    border-bottom-left-radius: 6px;
}

.footer-bs .footer-brand,
.footer-bs .footer-nav,
.footer-bs .footer-social,
.footer-bs .footer-ns {
    padding: 10px 25px;
}

.footer-bs .footer-nav,
.footer-bs .footer-social,
.footer-bs .footer-ns {
    border-color: transparent;
}

.footer-bs .footer-brand h2 {
    margin: 0px 0px 10px;
}

.footer-bs .footer-brand p {
    font-size: 12px;
    color: #7b2e40;
}

.footer-bs .footer-nav ul.pages {
    list-style: none;
    padding: 0px;
}

.footer-bs .footer-nav ul.pages li {
    padding: 5px 0px;
}

.footer-bs .footer-nav ul.pages a {
    color: #7b2e40;
    font-weight: bold;
    text-transform: uppercase;
}

.footer-bs .footer-nav ul.pages a:hover {
    color: #7b2e40;
    text-decoration: none;
}

.footer-bs .footer-nav h4 {
    font-size: 11px;
    text-transform: uppercase;
    /* letter-spacing: 3px; */
    margin-bottom: 10px;
}

.footer-bs .footer-nav ul.list {
    list-style: none;
    padding: 0px;
}

.footer-bs .footer-nav ul.list li {
    padding: 5px 0px;
}

.footer-bs .footer-nav ul.list a {
    color: #7b2e40;
}

.footer-bs .footer-nav ul.list a:hover {
    color: #7b2e40;
    opacity: 0.6;
    text-decoration: none;
}

.footer-bs .footer-social ul {
    list-style: none;
    padding: 0px;
}

.footer-bs .footer-social h4 {
    font-size: 11px;
    text-transform: uppercase;
    /* letter-spacing: 3px; */
}

.footer-bs .footer-social li {
    padding: 5px 4px;
}

.footer-bs .footer-social a {
    color: #7b2e40;
}

.footer-bs .footer-social a:hover {
    color: #7b2e40;
    opacity: 0.8;
    text-decoration: none;
}

.footer-bs .footer-ns h4 {
    font-size: 11px;
    text-transform: uppercase;
    /* letter-spacing: 3px; */
    margin-bottom: 10px;
}

.footer-bs .footer-ns p {
    font-size: 12px;
    color: #7b2e40;
    opacity: 0.7;
}

@media (min-width: 768px) {
    .footer-bs .footer-nav,
    .footer-bs .footer-social,
    .footer-bs .footer-ns {
        border-left: solid 1px rgba(255, 255, 255, 0.10);
    }
}


/*footer end*/
    </style>
    <script src='UserProfile_js.js'></script>
</head>

<body onload='checkEdits()'>
<nav class='navbar navbar-default navbar-fixed-top'>
<div class='container'>
    <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                                  <span class='icon-bar'></span>
                                  <span class='icon-bar'></span>
                                  <span class='icon-bar'></span>                        
                                </button>
        <a class='navbar-brand' href='home_login.php'>Mad Batter</a>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar'>
        <ul class='nav navbar-nav navbar'>
        <li><a href='home_login.php'>Search</a></li>
        <li><a href='home_login.php#trending-recipes'>Trending Recipes</a></li>
        <li><a href='home_login.php#category'>Categories</a></li>
        <li><a href='home_login.php#bakehacks'>BakeHacks</a> </li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
           
            <li><a href='UserProfile.php'>".$user."</a></li>
          
            <li><a href='logout.php'>Log Out</a></li>
        </ul>
    </div>
</div>
</nav><br><br><br><br>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-4'>
                <img title='profile image' class='img-circle img-responsive' src='user.png'>
                    <h1>".$fname." ".$lname."</h1><br>
                        ".$bio."<br><br>
                <button class='btn btn-lg btn-block ' type='submit '><i class='fa fa-user-plus '></i>  Follow</button>
                <ul class='list-group'>
                    <li class='list-group-item list-group-item-title '><i class='fa fa-user '></i> Profile</li>
                    <li class='list-group-item '><i class='fa fa-envelope '></i><strong> Email: </strong> ".$email."</li>
                    <li class='list-group-item '><i class='fa fa-venus-mars '><strong> Gender: </strong></i> ".$gender."</li>
                </ul>

                <ul class='list-group'>
                    <li class='list-group-item list-group-item-title '><i class='fa fa-dashboard fa-1x '></i> Activity</li>
                    <li class='list-group-item '><i class='fa fa-star '></i><strong>  Ratings</strong> ".$rating."</li>
                    <li class='list-group-item '><i class='fa fa-comment '></i><strong>  Reviews</strong> ".$review."</li>
                    <li class='list-group-item '><i class='fa fa-edit '></i><strong><a class='added-recipes' href='#recipes'> Added Recipes</a></strong> ".$total_recipes."</li>
                </ul>
            </div>
            <!--/col-3-->
			<div class='col-sm-8'>
                <div class='table-title'>
                    <h1><b>My Pantry</b></h1>
                    <div class='row'>
                        <div class='col-sm-8 '>

                        </div>
                        <div class='col-sm-4 '>
                        <a href='addIngredient.php'><i class='fa fa-plus'></i> Add New Ingredient</a><br/><br/>
                        </div>
                    </div>
                </div>
                <table class='table table-hover '>
                        <thead class='thead-deep'>
                            <tr>
                                <th>Ingredients</th>
                                <th>Quantity (in grams)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>";
                        if ($ingredients->num_rows > 0) {
                            while($row = mysqli_fetch_assoc($ingredients)){
                                $id=$row['id'];
                                $ingredient=$row['Ingredient'];
                                $qty=$row['Quantity'];
                                echo"<tr>";
                                echo"<td>".$ingredient."</td>";
                                echo"<td>".$qty."</td>";
                                echo"<td><a href=\"editQuantity.php?id=$id\"><i class='fa fa-pencil'></i></a><a href=\"deleteIngredient.php?id=$id\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash'></i></a></td>
                                </tr>";
                            }  
                        }
                        else {
                            echo "<p>You have no ingredients in your pantry!</p>";
                        }
                    echo"</tbody>
                    </table>
            <hr>
            </div>
			
            <div class='col-sm-7'>
                <h2>Recipes Added</h2>
                <div class='recipe-section' id='recipes'>";
                if ($recipes->num_rows > 0) {
                        echo"Add format for recipes</p>";
                }
                else {
                    echo"<p>No recipes added yet.</p>";
                }
                echo"</div>
           </div>
        </div>
        <!----------- Footer ------------>
        <div class='container'>
            <section style='height:80px;'></section>
            <footer class='footer-bs' style=' background-color:gr;'>
                <div class='row'>
                    <div class='col-md-3 footer-brand animated fadeInLeft'>
                        <h2 style='font-family:Dancing Script, cursive;'><strong>MAD BATTER</strong></h2>
                        <p>A baking recipes search and share portal for all your baking needs with a personalised pantry to help you keep track of your kitchen and to give you recipe recommendations on the basis of your kitchen's contents.</p>
                        <p>© 2018 PVD</p>
                    </div>
                    <div class='col-md-4 footer-nav animated fadeInUp'>
                        <h4 style='text-align:center;'>Menu </h4>
                        <div class='col-md-6'>
                            <ul class='pages'>
                                <li><a href='home_login.php#search'>Search</a></li>
                                <li><a href='home_login.php#trending-recipes'>Trending Recipes</a></li>
                                <li><a href='home_login.php#category'>Categories</a></li>
                                <li><a href='home_login.php#bakehacks'>Bake Hacks</a></li>
                                <li><a href='Userprofile.php'>".$user."</a></li>
                                <li><a href='logout.php'>Log Out</a></li>
                            </ul>
                        </div>
                        <div class='col-md-6'>
                            <ul class='list'>
                                <li><a href='#'>About Us</a></li>
                                <li><a href='#'>Contact Us</a></li>
                                <li><a href='#'>FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class='col-md-2 footer-social animated fadeInDown'>
                        <h4>Follow Us</h4>
                        <ul>
                        <li><a href='https://www.facebook.com/'>Facebook</a></li>
                        <li><a href='https://twitter.com/login'>Twitter</a></li>
                        <li><a href='https://www.instagram.com/accounts/login/?hl=en'>Instagram</a></li>
                        <li><a href='https://reader.rss.com/login'>RSS</a></li>
                        </ul>
                    </div>
                    <div class='col-md-3 footer-ns animated fadeInRight'>
                        <h4>Newsletter</h4>
                        <p>Subscribe for more bake updates!!!!</p>
                        <p>
                            <div class='input-group'>
                                <input type='text' class='form-control' placeholder='Search for...'>
                                <span class='input-group-btn'>
                                    <button class='btn btn-default' type='button'><span class='glyphicon glyphicon-envelope'></span></button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </p>
                    </div>
                </div>
            </footer>
            <section style='text-align:center; margin:10px auto;'>
                <p>Designed by Pankti. Vridhi. Dhruvi.</a>
                </p>
            </section>
        </div>
</body>
</html>";
?>
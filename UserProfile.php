<?php
    include('connect.php');
    $user='bbowlands4@linkedin.com';
    $getprofile="SELECT Username,FirstName,LastName,Bio,EmailID,Gender from `user-profile` where EmailID='$user'";
	$profile=$conn->query($getprofile);
	while($row = mysqli_fetch_assoc($profile)){
        $username=$row['Username'];
		$fname = $row['FirstName'];
		$lname=$row['LastName'];
		$bio=$row['Bio'];
		$email=$row['EmailID'];
		$gender=$row['Gender'];
    }
    
    $getratings="SELECT COUNT(Rating) as total_ratings from `recipe-ratings` WHERE EmailID='$user'";
    $ratings=$conn->query($getratings);
    while($row = mysqli_fetch_assoc($ratings)){
		$rating = $row['total_ratings'];
    }

    $getreviews="SELECT COUNT(Review) as total_reviews from `recipe-reviews` WHERE EmailID='$user'";
    $reviews=$conn->query($getreviews);
    while($row = mysqli_fetch_assoc($reviews)){
		$review = $row['total_reviews'];
    }

    $getrecipecount="SELECT COUNT(RecipeName) as total_recipes from `recipe` WHERE Author='$user'";
    $recipecount=$conn->query($getrecipecount);
    while($row = mysqli_fetch_assoc($recipecount)){
		$total_recipes = $row['total_recipes'];
    }

    $getingredients="SELECT * from `user-pantry` WHERE EmailID='$user'";
    $ingredients=$conn->query($getingredients);

    $getrecipes="SELECT * from `recipe` WHERE Author='$user'";
    $recipes=$conn->query($getrecipes);
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
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Kotta One' rel='stylesheet'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <link rel='stylesheet' type='text/css' href='UserProfile_style.css'>
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
        <a class='navbar-brand' href='#myPage'>Mad Batter</a>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar'>
        <ul class='nav navbar-nav navbar'>
            <li><a href='#search'>Search</a></li>
            <li><a href='#trending-recipes'>Trending Recipes</a></li>
            <li><a href='#category'>Categories</a></li>
            <li><a href='#bakehacks'>BakeHacks</a> </li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
            <!-- Trigger/Open The Login Modal -->
            <li><a href='#login'><button id='myBtn-login'>LogIn</button></a></li>
            <!-- Trigger/Open The Signup Modal -->
            <li><a href='#signup'><button id='myBtn-signup'>SignUp</button></a></li>
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
                    <h1><b>Pantry</b></h1>
                    <div class='row'>
                        <div class='col-sm-8 '>

                        </div>
                        <div class='col-sm-4 '>
                            <button type='button ' class='btn btn-info add-new '><i class='fa fa-plus '></i> Add New Ingredient</button>
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
                                echo"<tr>";
                                echo"<td>".$row['Ingredient']."</td>";
                                echo"<td>".$row['Quantity']."</td>";
                                echo"
                                    <td>
                                        <a class='add ' title='Add ' data-toggle='tooltip '><i class='material-icons '>&#xE03B;</i></a>
                                        <a class='edit ' title='Edit ' data-toggle='tooltip '><i class='material-icons '>&#xE254;</i></a>
                                        <a class='delete ' title='Delete ' data-toggle='tooltip '><i class='material-icons '>&#xE872;</i></a>
                                    </td>
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
                        <h2>MAD BATTER</h2>
                        <p>A baking recipes search and share portal for all your baking needs with a personlaised pantry to help you keep track of your kitchen and to give you recipe recommendations on the basis of your kitchen's contents.</p>
                        <p>© 2018 PVD</p>
                    </div>
                    <div class='col-md-4 footer-nav animated fadeInUp'>
                        <h4>Menu </h4>
                        <div class='col-md-6'>
                            <ul class='pages'>
                                <li><a href='#'>Search</a></li>
                                <li><a href='#'>Trending Recipes</a></li>
                                <li><a href='#'>Categories</a></li>
                                <li><a href='#'>Bake Hacks</a></li>
                                <li><a href='#'>My Profile</a></li>
                                <li><a href='#'>Log Out</a></li>
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
                            <li><a href='#'>Facebook</a></li>
                            <li><a href='#'>Twitter</a></li>
                            <li><a href='#'>Instagram</a></li>
                            <li><a href='#'>RSS</a></li>
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

<?php
    include("connect.php");
    $recipe='Nutella Cupcakes';
    $getdetails="SELECT Category,RecipeName,Rating,CookTime,PrepTime,Serves,SkillLevel,Description,RecipePicture,RecipeVideo from `recipe` WHERE RecipeName='$recipe'";
    $details=$conn->query($getdetails);
    while($row = mysqli_fetch_assoc($details)){
        $category=$row['Category'];
		$name = $row['RecipeName'];
		$rating=$row['Rating'];
		$cooktime=$row['CookTime'];
		$preptime=$row['PrepTime'];
        $serves=$row['Serves'];
        $skillLevel=$row['SkillLevel'];
        $description=$row['Description'];
        $picture=$row['RecipePicture'];
        $video=$row['RecipeVideo'];
    }
    $getingredients="SELECT Quantity,Ingredient FROM `recipe-ingredients` WHERE RecipeName='$recipe'";
    $ingredients=$conn->query($getingredients);

    $getsteps="SELECT Step FROM `recipe-steps` WHERE RecipeName='$recipe' ORDER BY StepNo";
    $steps=$conn->query($getsteps);

    $getreviews="SELECT Review,EmailID FROM `recipe-reviews` WHERE RecipeName='$recipe'";
    $reviews=$conn->query($getreviews);
    echo"
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <title>Recipe Page | Mad Batter</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
        <script src='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'></script>
        <link rel='stylesheet' type='text/css' href='UserProfileStyle.css'>
        <link href='https://fonts.googleapis.com/css?family=Kotta One' rel='stylesheet'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
        <link rel='stylesheet' type='text/css' href='RecipePage_style.css'>
    </head>

    <body>
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
        </nav>
        <!--HEADER-->
        <div class='header'>
            <div class='img-gradient'>
                <div class='bg-img'>
                    <img src='Nutella-Cupcakes_Header.jpeg' class='img-fluid' alt='".$name."'>
                    <div class='img-title'>
                        <h3>".$category."</h3>
                        <h1>".$name."</h1>
                    </div>
                </div>
            </div>
        </div><br><br>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-4'>
                    <!-- About -->
                    <h2 style='background-color: #89382c;color: #fff; text-align: center; box-shadow: 5px 10px 18px #888888;'>Quick-Info</h2>
                    <table class='table about-box'>
                        <tbody>
                            <tr>
                                <th>Rating : </th>
                                <td>".$rating."</td>
                            </tr>
                            <tr>
                                <th>Cook Time : </th>
                                <td>".$cooktime." m</td>
                            </tr>
                            <tr>
                                <th>Prep Time : </th>
                                <td>".$preptime." m</td>
                            </tr>
                            <tr>
                                <th>Serves : </th>
                                <td>".$serves."</td>
                            </tr>
                            <tr>
                                <th>Skill level : </th>
                                <td>".$skillLevel."</td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <h2 style='background-color: #89382c;color: #fff; text-align: center; box-shadow: 5px 10px 18px #888888;'>Ingredients</h2>
                    <table class='table ingredients-box'>
                        <tbody>";
                        while($row = mysqli_fetch_assoc($ingredients)){
                            echo"
                            <tr>
                                <th>".$row['Quantity']."g</th>
                                <td>".$row['Ingredient']."</td>
                            </tr>";
                        }
                        echo"
                        </tbody>
                    </table>
                    <br><br>
                </div>
                <!-- col-sm-4 -->
                <div class='col-sm-1'>
                </div>
                <div class='col-sm-7'>
                    <div class='description'>
                        <p>".$description."</p><br>
                        <h4><strong>Seeing is the best way of learning!<br>Watch the video  & learn: </strong></h4><br>
                    </div>
                    <div class='embed-responsive embed-responsive-16by9'>
                        <iframe class='embed-responsive-item' src='".$video."'></iframe>
                    </div>
                    <ol type='1' class='list-group' style='padding-top: 50px; color: #7b2e40;'>
                        <h2>Steps: </h2>
                        <hr class='dropdown-divider'>";
                        while($row = mysqli_fetch_assoc($steps)){
                        echo"
                            <li>".$row['Step']."</li>
                            <hr class='dropdown-divider'>";
                        }
                        echo"
                    </ol><br>
                    <h2 style='color: #7b2e40;'>Reviews </h2>";
                    if ($reviews->num_rows > 0) {
                        while($row = mysqli_fetch_assoc($reviews)){
                        $email=$row['EmailID'];
                        $getfname="SELECT FirstName FROM `user-profile` WHERE EmailID='$email'";
                        $fname=$conn->query($getfname);
                            while($i = mysqli_fetch_assoc($fname)){
                                echo"
                                <p>".$row['Review']."</p>
                                <p style='padding-left:500px;'>by ".$i['FirstName']."</p>";
                            }                    
                        }                    
                    }
                    else {
                        echo"<p>No reviews yet</p>";
                    }
                    echo"
                    <br><br>
                    <!-- Rating Bar -->
                    <div class='rating'>
                        <h2 style='color: #7b2e40;'>Rate the recipe: </h2>
                        <span class='rating-star' data-value='5'></span>
                        <span class='rating-star' data-value='4'></span>
                        <span class='rating-star' data-value='3'></span>
                        <span class='rating-star' data-value='2'></span>
                        <span class='rating-star' data-value='1'></span>
                    </div>
                    <div class='form-group'>
                        
                        <textarea class='form-control' rows='5' placeholder='Write your reviews here...'></textarea>
                    </div>
                    <button type='submit' class='btn btn-post'>Post</button><br>
                </div>
                <!-- col-sm-7 -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
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
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
        <script src='RecipePage_js.js'></script>
    </body>
    </html>";
?>

<?php
	session_start();
    include("connect.php");
	 $user= $_SESSION['user_name'];
    if(isset($_GET['id'])){
  $recipe = $_GET['id'];
 
} else {
 
}

    $getdetails="SELECT Category,RecipeName,Rating,CookTime,PrepTime,Serves,SkillLevel,Description,RecipePicture,RecipeVideo from `recipe` WHERE RecipeName LIKE '%$recipe%'";
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
	
    $getingredients="SELECT Quantity,Ingredient FROM `recipe-ingredients` WHERE RecipeName LIKE '%$recipe%'";
    $ingredients=$conn->query($getingredients);

    $getsteps="SELECT Step FROM `recipe-steps` WHERE RecipeName LIKE '%$recipe%' ORDER BY StepNo";
    $steps=$conn->query($getsteps);

    $getreviews="SELECT Review,EmailID FROM `recipe-reviews` WHERE RecipeName LIKE '%$recipe%'";
    $reviews=$conn->query($getreviews);
	
    echo"
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <title>Recipe Page | Mad Batter</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        // <link rel='stylesheet' href='RecipePage_style.css' type='text/css' >
        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
        // <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <script src='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'></script>
        <link href='https://fonts.googleapis.com/css?family=Kotta One' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
        // <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
        <style>
        body {
            font-family: Montserrat, sans-serif;
            font: 400 15px;
            line-height: 1.8;
        }
        
        
        /* The Modal (background) */
        
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 9999;
            /* Sit on top */
            padding: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }
        
        
        /* Modal Content */
        
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }
        
        
        /* The Close Button */
        
        .close {
            color: #7b2e40;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
            color: #f7a7b2;
            text-decoration: none;
            cursor: pointer;
        }
        
        
        /*submit button*/
        
        button {
            background-color: #7b2e40;
            color: #fff;
            border: #7b2e40;
        }
        
        button:hover {
            background-color: #fff;
            color: #7b2e40;
        }
        
        
        /*end submit*/
        
        .bg-img {
            position: relative;
            width: 100%;
            height: 100%;
            background: center center no-repeat;
            background-size: cover;
        }
        
        .bg-img:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(0, 0, 0, 0.9));
        }
        
        .centered {
            position: absolute;
            top: 60%;
            left: 50%;
            text-align: center;
            transform: translate(-50%, -50%);
            color: #f7a7b2;
        }
        
        .img-title {
            position: absolute;
            color: #f7a7b2;
            text-align: center;
            left: 0;
            right: 0;
            top: 60%;
            /*letter-spacing: 3px;*/
        }
        
        .thead-deep {
            background-color: #89382c;
            color: #fff;
        }
        
        .ingredients-box,
        .about-box,
        .utensils {
            background-color: #fcb6c5;
            box-shadow: 5px 10px 18px #888888;
        }
        
        .description {
            color: #7b2e40;
            font-size: 20px;
        }
        
        .dropdown-divider {
            border-top: 1px #7b2e40 dashed;
        }
        
        
        /*CSS FOR RATE BAR*/
        
        .rating {
            display: inline-block;
            color: #FFCA00;
            align-content: center;
        }
        
        .rating-star {
            padding: 0 5px;
            cursor: pointer;
            display: block;
            float: right;
            font-size: 30px;
        }
        
        .rating-star:after {
            position: relative;
            font-family: FontAwesome;
            content: '\f006';
        }
        
        .rating-star.checked~.rating-star:after,
        .rating-star.checked:after {
            content: '\f005';
        }
        
        .rating:hover .rating-star:after {
            content: '\f006';
        }
        
        .rating-star:hover~.rating-star:after,
        .rating-star:hover:after {
            content: '\f005' !important;
        }
        
        .btn-post {
            background-color: #7b2e40;
            color: #fff;
            float: right;
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
    </head>

    <body>
	<form action=\"\" method=\"GET\">
    <nav class='navbar navbar-expand-md navbar-light navbar-fixed-top'>
    <div class='container'>
    <div class='navbar-header'>
        <button type='button' class='navbar-toggler' data-toggle='collapse' data-target='#myNavbar'>
            <span class='navbar-toggler-icon'></span>                       
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
            <!-- Trigger/Open The Login Modal -->
            <li><a href='UserProfile.php'>".$user."</a></li>
            <!-- Trigger/Open The Signup Modal -->
            <li><a href='logout.php'>Log Out</a></li>
        </ul>
    </div>
</div>
</nav>
        <!--HEADER-->
        <div class='header'>
            <div class='img-gradient'>
                <div class='bg-img'>
                    <img src='".$picture."' class='img-fluid' alt='".$name."'>
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
                    <!--<h2 style='color: #7b2e40;'>Reviews </h2>-->";
                    /*if ($reviews->num_rows > 0) {
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
                    }*/
                    echo"
                    <!--<br><br>
                     Rating Bar 
                    <div class='rating'>
                        <h2 style='color: #7b2e40;'>Rate the recipe: </h2>
                        <span class='rating-star' data-value='5'></span>
                        <span class='rating-star' data-value='4'></span>
                        <span class='rating-star' data-value='3'></span>
                        <span class='rating-star' data-value='2'></span>
                        <span class='rating-star' data-value='1'></span>
                    </div>
                    <div class='form-group'>
                        
                        <textarea class='form-control' rows='5' placeholder='Write your reviews here...' name=\"postreview\"></textarea>
                    </div>
                    <button type='submit' class='btn btn-post' name=\"post\"><a href=\"RecipePage.php?id=.$name\">Post</a></button><br>-->
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
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
        <script src='RecipePage_js.js'></script>
        
    </html>";
?>
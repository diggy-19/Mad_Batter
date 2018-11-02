<?php
	session_start();	
    include('connect.php');
	 $user= $_SESSION['user_name'];
    $input=$_SESSION['recipe_name']; //INPUT FROM SEARCH BAR
    $getrecipes="SELECT RecipePicture,RecipeName,Rating,SkillLevel,CookTime,PrepTime FROM `recipe`WHERE RecipeName LIKE '%$input%'";
    $recipes=$conn->query($getrecipes);
echo"
<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Search Results | Mad Batter</title>
    <meta charset='utf-8'>
    // <link rel='stylesheet' href='searchresults.css' type='text/css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='//code.jquery.com/jquery-1.11.1.min.js'></script>
    <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
    <style>
    html {
        position: relative;
        min-height: 100%;
    }
    
    body {
        margin: 0;
        background-color: #fff;
        height: 100%;
        padding: 0;
        font: 400 15px Lato, sans-serif;
        line-height: 1.8;
        color: #7b2e40;
    }
    
    
    /*NAVBAR*/
    
    .navbar-default {
        background-color: #7b2e40;
    }
    
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
    
    
    /* The Modal (background) */
    
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
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
    
    
    /*dropdown for gender in signup modal*/
    
    select {
        font-family: Arial;
        font-size: 20px;
        color: #000;
    }
    
    
    /* card */
    
    .card {
        margin-top: 15px;
        margin-left: 15px;
        margin-right: 15px;
        height: 500px;
        width: 400px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        /* width: 40%; */
        border-radius: 5px;
    }
    
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }
    
    img {
        border-radius: 5px 5px 0 0;
    }
    
    .container .card-content {
        padding: 2px 16px;
    }
    
    .desc-content {
        font-size: 13px;
        white-space: nowrap;
        width: 45%;
        overflow: hidden;
        text-overflow: ellipsis;
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
        letter-spacing: 3px;
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
        letter-spacing: 3px;
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
        letter-spacing: 3px;
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
</nav>


    

    <!-- the search results cards -->
    <h3 style='margin:50px;'>Showing results for '".$input."'</h3>
    <div class='row'><br><br>";
        if ($recipes->num_rows > 0) {
            while($row = mysqli_fetch_assoc($recipes)){
                echo"<form action=\"\" method=\"POST\">
				<div class='col-lg-4'>
                    <div class='card'>
                        <img src='".$row['RecipePicture']."' alt='".$row['RecipeName']."' style='width:400px; height:300px;'>
                        <div class='container'>
                            <div class='card-content'>
                               <h4><strong><a href=\"RecipePage.php?id=".$row['RecipeName']."\">".$row['RecipeName']." </a></strong></h4>
                                <p class='desc-content'><strong>Rating : </strong>".$row['Rating']."<br><strong>Skill Level : </strong>".$row['SkillLevel']."<br><strong>Cook Time : </strong>".$row['CookTime']."m<br><strong>Prep Time : </strong>".$row['PrepTime']."m</p>
							</div>
                        </div>
                    </div>
                </div>
				</form>";
            }
        }

        else {
            echo "No results found!";
        }
        echo"
    </div>


    <!----------- Footer ------------>
    <div class='container'>
        <section style='height:80px;'></section>
        <footer class='footer-bs'>
            <div class='row'>
                <div class='col-md-3 footer-brand animated fadeInLeft'>
                    <h2 style='font-family:Dancing Script, cursive;'><strong>MAD BATTER</strong></h2>
                    <p>A baking recipes search and share portal for all your baking needs with a personlaised pantry to help you keep track of your kitchen and to give you recipe recommendations on the basis of your kitchen's contents.</p>
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
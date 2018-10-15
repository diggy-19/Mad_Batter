<?php
include("connect.php");
$user='bbowlands4@linkedin.com';
$recipe='Nutella Cupcakes';
    $getdetails="SELECT RecipeName,Description from `recipe` ORDER BY `Rating` LIMIT 3";
    $details=$conn->query($getdetails);
    $i=0;
    while($row = mysqli_fetch_array($details, MYSQLI_NUM))
    {
        
        $name[i] = $row['RecipeName'];
        $desc[i]=$row['Description'];  
        $i++;
    }
    echo"
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <title>Home Page | Mad Batter</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='//code.jquery.com/jquery-1.11.1.min.js'></script>
    <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' type='text/css' href='homepage_style.css'>
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
                    <!--the pantry page-->
                    <li><a href='UserProfile.php'>My profile</a></li>
                    <li><a href='#'>Log Out</a></li>
                </ul>
            </div>
        </div>
        </nav>


        <!--parallax scrolling effect-->
    <div class='bleh'>
    </div>
    <div class='search' id='search' style='color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;'>
        <div class='container'>
            <div class='row'>
                <p></p>
            </div>
            <div class='row'>
                <p></p>
            </div>
            <div class='row'>
                <p></p>
            </div>
            <div class='row'>
                <p></p>
            </div>
            <div class='row'>
                <!-- <div class='container'> -->
                <!-- <div class='row'> -->
                <div class='col-md-12'>
                    <div class='input-group' id='adv-search'>
                        <input type='text' class='form-control' placeholder='Search...' />
                        <div class='input-group-btn'>
                            <div class='btn-group' role='group'>
                                <div class='dropdown dropdown-lg'>
                                    <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><span class='caret'></span></button>
                                    <div class='dropdown-menu dropdown-menu-right' role='menu'>
                                        <form class='form-horizontal' role='form'>
                                            <div class='form-group'>
                                                <label for='filter'>Skill Level</label>
                                                <select class='form-control'>
                                                            <option value='0' selected>Newbie</option>
                                                            <option value='1'>Intermediate</option>
                                                            <option value='2'>Expert</option>
                                                        </select>
                                            </div>
                                            <div class='form-group'>
                                                <label for='filter'>Category</label>
                                                <select class='form-control'>
                                                            <option value='0' selected>Brownies</option>
                                                            <option value='1'>Cupcakes</option>
                                                            <option value='2'>Cookies</option>
                                                        </select>
                                            </div>
                                            <div class='form-group'>
                                                <label for='filter'>Prep Time</label>
                                                <select class='form-control'>
                                                            <option value='0' seleced>10-20 mins</option>
                                                            <option value='1'>20-30 mins</option>
                                                            <option value='2'>30-40 mins</option>
                                                            <option value='3'>40-50 mins</option>
                                                            <option value='3'>More than 50 mins</option>
                                                        </select>
                                            </div>
                                            <div class='form-group'>
                                                <label for='filter'>Cook Time Time</label>
                                                <select class='form-control'>
                                                            <option value='0' seleced>10-20 mins</option>
                                                            <option value='1'>20-30 mins</option>
                                                            <option value='2'>30-40 mins</option>
                                                            <option value='3'>40-50 mins</option>
                                                            <option value='3'>More than 50 mins</option>
                                                        </select>
                                            </div>
                                            <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-search' aria-hidden='true' ></span></button>
                                        </form>
                                    </div>
                                </div>background-
                                <button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-search' aria-hidden='true'></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class='row'>
        <div class='col-sm-4'>
        </div>
        <div class='col-sm-2'>
            <button class='button rounded-button'>MY  PANTRY</button>
        </div>

        <div class='col-sm-1'>
            <button class='button rounded-button'>SEARCH</button>
        </div>
        <div class='col-sm-4'></div>
    </div>
    <div class='row'>
        <p></p>
    </div>
    <div class='row'>
        <p></p>
    </div>
    </div>
    </div>

    <div class='trending-recipes' id='trending-recipes'>
        <div class='content'>
            <div class='container-fluid'>
                <h2 style='font-family: 'Dancing Script', cursive;font-size:50px;'>Trending Recipes</h2>
                <div id='myCarousel' class='carousel slide' data-ride='carousel'>
                    <!-- Indicators -->
                    <ol class='carousel-indicators'>
                        <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
                        <li data-target='#myCarousel' data-slide-to='1'></li>
                        <li data-target='#myCarousel' data-slide-to='2'></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class='carousel-inner'>
                        <div class='item active'>
                            <img src='Nutella-Cupcakes_Header.jpg' alt=".$name[0]" style='width:100%;'>
                            <div class='content'>
                                <h1 style='font-family:'Dancing Script', cursive;'>Nutella Cupcakes</h1>
                                <p>
                                    <div class='a'>
                                        ".$desc[0]"
                                    </div>
                                </p>

                            </div>
                        </div>

                        <div class='item'>
                            <img src='Marshmallow-Brownie_HEADER.jpg' alt=".$name[1]" style='width:100%;'>
                            <div class='content'>
                                <h1 style='font-family:'Dancing Script', cursive;'>Marshmallow Brownies</h1>
                                <p>
                                    <div class='a'>
                                    ".$desc[1]"
                                    </div>
                                </p>
                            </div>
                        </div>

                        <div class='item'>
                            <img src='Cinnamon-Swirl-Pancakes_Header.jpg' alt=".$name[2]" style='width:100%;'>
                            <div class='content'>
                                <h1 style='font-family:'Dancing Script', cursive;'>Cinnamon Swirl Pancakes</h1>
                                <p>
                                    <div class='a'>
                                    ".$desc[2]"
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class='left carousel-control' href='#myCarousel' data-slide='prev'>
                        <span class='glyphicon glyphicon-chevron-left'></span>
                        <span class='sr-only'>Previous</span>
                    </a>
                    <a class='right carousel-control' href='#myCarousel' data-slide='next'>
                        <span class='glyphicon glyphicon-chevron-right'></span>
                        <span class='sr-only'>Next</span>
                    </a>
                </div>

                <div class='category' id='category' style='position:relative;'>
                    <h2 style='font-family:Montserrat, sans-serif; font-variant: small-caps;'>Categories</h2>
                    <div class='horizontal_categories'>
                        <div class='horizontal__card_categories'><img class='cate_image' src='Nutella-Cupcakes_Header.jpg' alt='Nutella Cupcakes' title='nutella cupcakes'>
                            <div class='center'>Cupcakes</div>
                        </div>
                        <div class='horizontal__card_categories'><img class='cate_image' src='Marshmallow-Brownie_HEADER.jpg' alt='Marshmallow Brownies'>
                            <div class='center'>Brownies</div>
                        </div>
                        <div class='horizontal__card_categories'><img class='cate_image' src='Truvia-Chocolate-Chip-Cookies_Header.jpg' alt='Chocochip Cookies'>
                            <div class='center'>Cookies</div>
                        </div>
                        <!-- <div class='horizontal__card_categories'>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa odit obcaecati, velit commodi enim quod amet veritatis eum! Temporibus voluptates qui aspernatur quaerat rem nobis dicta similique obcaecati porro?</div>
                        <div class='horizontal__card_categories'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque deserunt labore inventore sed alias quod omnis illum perferendis quisquam sunt, maxime illo asperiores atque, dignissimos odit accusantium fuga eligendi exercitationem.</div> -->
                    </div>
                </div>

                <div class='bakehacks' id='bakehacks'>
                    <h2 style='font-family: Montserrat, sans-serif; font-variant: small-caps;'>Bake Hacks</h2>
                    <div class='horizontal_bakehacks'>
                        <div class='horizontal__card_bakehacks'>
                            <iframe src='https://www.youtube.com/embed/PSHZ3E7yIAo' width='500' height='375' style='border:none;' allowfullscreen>
                            </iframe>
                            <div class='bake-content'>New to baking? Here are <strong> 20 Genius Baking Hacks!!!</strong></div>
                        </div>
                        <div class='horizontal__card_bakehacks'>
                            <iframe src='https://www.youtube.com/embed/6RSKUxhDHqQ' width='500' height='375' style='border:none;' allowfullscreen>
                        </iframe>
                            <div class='bake-content'>Want a cake that looks professional? Here are<strong> Five Beautiful Ways To Decorate Cake</strong></div>
                        </div>
                        <div class='horizontal__card_bakehacks'>
                            <iframe src='https://www.youtube.com/embed/NkEHV9ygXFc' width='500' height='375' style='border:none;' allowfullscreen>
                        </iframe>
                            <div class='bake-content'>Missing some equipment? Here are<strong> 7 Last-Minute Baking Hacks</strong></div>
                        </div>
                    </div>
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
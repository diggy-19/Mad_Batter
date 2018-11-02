<?php
session_start();
include("connect.php");
?>
<?php
if(isset($_GET['submit1']))
{
$Email=$_GET['Email'];
$Pwd=$_GET['Password'];
$Uname=$_GET['Username'];
$Fname=$_GET['Firstname'];
$Lname=$_GET['Lastname'];
$Age=$_GET['Age'];
$Gender=$_GET['Gender'];

$sql = "INSERT INTO `user-profile`(`EmailID`, `Password`, `Username`, `FirstName`, `LastName`, `Age`, `Gender`)
 VALUES ('$Email', '$Pwd', '$Uname', '$Fname', '$Lname', '$Age', '$Gender')";

 if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

if(isset($_POST['submit']))
{
    $user = $_POST['un'];
    $pwd = $_POST['pw'];
    $query = "SELECT `Username`,`Password` FROM `user-profile` where Username='$user' and Password ='$pwd'";
    $result= mysqli_query($conn, $query);
    $total = mysqli_num_rows($result);
    if($total == true)
    {
      //echo 'Login Successful';
      $_SESSION['user_name'] = $user;
     header("Location:UserProfile.php");
    }
    else
    {
      echo 'Incorrect Username or password';

    }
}

if(isset($_POST['search']))
{
    $recipe = $_POST['recipename'];
    $query1 = "SELECT `RecipeName` FROM `recipe` where RecipeName LIKE '%$recipe%'";
    $result1= mysqli_query($conn, $query1);
    $total = mysqli_num_rows($result1);
    if($total == true)
    {
		 $_SESSION['recipe_name'] = $recipe;
      header("Location:searchlogin.php");
    }
    else
    {
      echo 'No such recipe';

    }
}

?>   
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
   <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet'>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href = "homepage_style.css" type = "text/css">
</head>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<nav class="navbar navbar-default navbar-fixed-top">
       <div class="container">
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>                       
                   </button>
               <a class="navbar-brand" href="home.php">Mad Batter</a>
           </div>
           <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav navbar">
                   <li><a href="#search">Search</a></li>
                   <li><a href="#trending-recipes">Trending Recipes</a></li>
                   <li><a href="#category">Categories</a></li>
                   <li><a href="#bakehacks">BakeHacks</a> </li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                   <!-- Trigger/Open The Login Modal -->
                   <li><a href="#login" id="login-modal">LogIn</a></li>
                   <!-- Trigger/Open The Signup Modal -->
                   <li><a href="#signup" id="signup-modal">SignUp</a></li>
               </ul>
           </div>
       </div>
   </nav>
   <br>
   <br>
   <br>
<!-- The Login Modal -->
   <div id="myModal-login" class="modal" style="z-index:9999;">

       <!-- Modal content -->
       <div class="modal-content">
           <span class="close-login">&times;</span>
           <h1>
               <center>LOGIN</center>
           </h1>

           <form action="" method="POST">
               <div class="form-group">
                   <label for="Inputname">Username</label>
                   <input type="name" class="form-control" name="un" required>
               </div>
               <div class="form-group">
                   <label for="Inputname"> Password</label>
                   <input type="password" class="form-control" name="pw" required>
               </div>
               <br>
               <center><button type="submit" name="submit">Submit</button></center>
               <center>
                   <font size=4px>New to Mad Batter?<br>Create account!</font>
               </center>
           </form>
       </div>
   </div>

   <!-- The Signup Modal -->
   <div id="myModal-signup" class="modal" style="z-index:9999;">

       <!-- Modal content -->
       <div class="modal-content">
           <span class="close-signup">&times;</span>

           <h1>
               <center>SIGNUP</center>
           </h1>
           <form action="" method="GET" onsubmit="return checkForm(this);">
               <div class="form-group">
                   <label for="Inputname"> E-mail</label>
                   <input type="name" class="form-control" name="Email" placeholder="Enter e-mail" required>
               </div>
               <div class="form-group">
                   <label for="Inputname"> Password</label>
                   <input type="password" class="form-control" name="Password" placeholder="Enter Password" minlength=8 required>
               </div>
               <div class="form-group">
                   <label for="Inputname"> Confirm Password</label>
                   <input type="password" class="form-control" name="cpw" placeholder="Re-enter Password" minlength=8 required>
               </div>
               <div class="form-group">
                   <label for="Inputname"> Username</label>
                   <input type="name" class="form-control" name="Username" placeholder="Enter User Name" required>
               </div>
               <div class="form-group">
                   <label for="Inputname"> Firstname</label>
                   <input type="name" class="form-control" name="Firstname" placeholder="Enter First Name" required>
               </div>
               <div class="form-group">
                   <label for="Inputname"> Lastname</label>
                   <input type="name" class="form-control" name="Lastname" placeholder="Enter Last Name" required>
               </div>
               <div class="form-group">
                   <label for="Inputdate">Age</label>
                   <input type="number" class="form-control" name="Age" placeholder="Enter Age">
               </div>
               <div class="dropdown">
                   <label>Gender</label><br>
                   <select name="Gender">
                       <option class="dropdown-item">Male</option>
                       <option class="dropdown-item">Female</option>
                       <option class="dropdown-item">Other</option> 
                   </select>
               </div>


               <br>
               <center>
                   <button type="submit" name="submit1">Submit</button>
               </center>
               <center>
                   <font size=4px>Already have an account?<br>Log In</font>
               </center>
           </form>
       </div>
   </div>
   <form class="form-horizontal" role="form" action="" method="POST">
    <!--parallax scrolling effect-->
    <div class="bgimg-1">
    </div>
    <div class="search" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
            <div class="row">				
                <div class="col-md-12">
				
                    <div class="input-group" id="adv-search">
                        <input type="text" class="form-control" name="recipename" placeholder="Search..." >
                    </div>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
        </div>
      

        <div class="col-lg-2">
            <button class="button rounded-button" name="search">SEARCH</button>
        </div>
        <div class="col-lg-5"></div>
    </div>
    <div class="row">
        <p></p>
    </div>
    <div class="row">
        <p></p>
    </div>
    </div>
    </div>
</form>
    <div class="trending-recipes" id="trending-recipes">
        <div class="content">
            <div class="container-fluid">
                <h2 style="font-family: 'Dancing Script', cursive;font-size:50px;">Trending Recipes</h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="Nutella-Cupcakes_Header.jpg" alt="Nutella Cupcakes" style="width:100%;">
                            <div class="content">
                                <h1 style="font-family:'Dancing Script', cursive;">Nutella Cupcakes</h1>
                                <p>
                                    <div class="a">
                                        These Nutella Cupcakes are sure to be a hit - the hazelnut flavour from the Nutella adds a new dimension. Not only are these delicious cupcakes filled with Nutella but the buttercream is subtly flavoured too. For those Nutella fans out there this is the
                                        cupcake recipe for you.
                                    </div>
                                </p>

                            </div>
                        </div>

                        <div class="item">
                            <img src="Marshmallow-Brownie_HEADER.jpg" alt="Marshmallow Brownies" style="width:100%;">
                            <div class="content">
                                <h1 style="font-family:'Dancing Script', cursive;">Marshmallow Brownies</h1>
                                <p>
                                    <div class="a">
                                        We all love a yummy brownie, but sometimes it is fun to mix things up a little and add a twist to our favourite recipes. This brownie not only includes soft and squidgy marshmallows but also Fruit Bowl yoghurt raisins, so that practically makes this one
                                        of your five a day, right?! Kids will love helping to make these brownies as much as munching the end result. They are perfect for back to school lunch boxes and for snacking during the school holidays.
                                    </div>
                                </p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="Cinnamon-Swirl-Pancakes_Header.jpg" alt="Cinnamon Swirl Pancakes" style="width:100%;">
                            <div class="content">
                                <h1 style="font-family:'Dancing Script', cursive;">Cinnamon Swirl Pancakes</h1>
                                <p>
                                    <div class="a">
                                        If like us you can't resist a Cinnamon Roll then you really have to try this Cinnamon Swirl Pancake recipe. This recipes combines the best of two delicious breakfast treats and is one the whole family will enjoy. Not only does they look great but they
                                        taste amazing too, especially when drizzled with our cream cheese icing.
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="category" id="category" style="position:relative;">
                    <h1 style="font-family:'Dancing Script', cursive; font-variant: small-caps; margin:30px;"><strong>Categories</strong></h1>
                    <div class="horizontal_categories">
                        <div class="horizontal__card_categories"><img class="cate_image" src="Nutella-Cupcakes_Header.jpg" alt="Nutella Cupcakes" title="nutella cupcakes">
                            <div class="center"><a href="#">Cupcakes</a></div>
                        </div>
                        <div class="horizontal__card_categories"><img class="cate_image" src="Marshmallow-Brownie_HEADER.jpg" alt="Marshmallow Brownies">
                            <div class="center"><a href="#">Brownies</a></div>
                        </div>
                        <div class="horizontal__card_categories"><img class="cate_image" src="https://www.handletheheat.com/wp-content/uploads/2018/02/BAKERY-STYLE-CHOCOLATE-CHIP-COOKIES-9-550x550.jpg" alt="Chocochip Cookies">
                            <div class="center"><a href="#">Cookies</a></div>
                        </div>
                        <!-- <div class="horizontal__card_categories">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa odit obcaecati, velit commodi enim quod amet veritatis eum! Temporibus voluptates qui aspernatur quaerat rem nobis dicta similique obcaecati porro?</div>
                        <div class="horizontal__card_categories">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque deserunt labore inventore sed alias quod omnis illum perferendis quisquam sunt, maxime illo asperiores atque, dignissimos odit accusantium fuga eligendi exercitationem.</div> -->
                    </div>
                </div>

                <div class="bakehacks" id="bakehacks">
                    <h1 style="font-family: 'Dancing Script', cursive;font-variant: small-caps; margin:30px;"><strong>Bake Hacks</strong></h1>
                    <div class="horizontal_bakehacks">
                        <div class="horizontal__card_bakehacks">
                            <iframe src="https://www.youtube.com/embed/PSHZ3E7yIAo" width="500" height="375" style="border:none;" allowfullscreen>
                            </iframe>
                            <div class="bake-content">New to baking? Here are <strong> 20 Genius Baking Hacks!!!</strong></div>
                        </div>
                        <div class="horizontal__card_bakehacks">
                            <iframe src="https://www.youtube.com/embed/6RSKUxhDHqQ" width="500" height="375" style="border:none;" allowfullscreen>
                        </iframe>
                            <div class="bake-content">Want a cake that looks professional? Here are<strong> Five Beautiful Ways To Decorate Cake</strong></div>
                        </div>
                        <div class="horizontal__card_bakehacks">
                            <iframe src="https://www.youtube.com/embed/NkEHV9ygXFc" width="500" height="375" style="border:none;" allowfullscreen>
                        </iframe>
                            <div class="bake-content">Missing some equipment? Here are<strong> 7 Last-Minute Baking Hacks</strong></div>
                        </div>
                    </div>
                </div>

                <!-- <div style="position:relative;">
                    
                </div> -->

                <div class="container">
                    <section style="height:80px;"></section>

                    <!----------- Footer ------------>
                    <footer class="footer-bs">
                        <div class="row">
                            <div class="col-md-3 footer-brand animated fadeInLeft">
                                <h2 style="font-family:'Dancing Script', cursive;"><strong>MAD BATTER</strong></h1>
                                <p>A baking recipes search and share portal for all your baking needs with a personalised pantry to help you keep track of your kitchen and to give you recipe recommendations on the basis of your kitchen's contents.</p>
                                <p>© 2018 PVD</p>
                            </div>
                            <div class="col-md-4 footer-nav animated fadeInUp">
                                <h4>Menu </h4>
                                <div class="col-md-6">
                                    <ul class="pages">
                                        <li><a href="#search">Search</a></li>
                                        <li><a href="#trending-recipes">Trending Recipes</a></li>
                                        <li><a href="#category">Categories</a></li>
                                        <li><a href="#bakehacks">Bake Hacks</a></li>
                                        <li><a href="#login">Log In</a></li>
                                        <li><a href="#signup">Sign up</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2 footer-social animated fadeInDown">
                                <h4>Follow Us</h4>
                                <ul>
                                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                                    <li><a href="https://twitter.com/login">Twitter</a></li>
                                    <li><a href="https://www.instagram.com/accounts/login/?hl=en">Instagram</a></li>
                                    <li><a href="https://reader.rss.com/login">RSS</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 footer-ns animated fadeInRight">
                                <h4>Newsletter</h4>
                                <p>Subscribe for more bake updates!!!!</p>
                                <p>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </p>
                            </div>
                        </div>
                    </footer>
                    <section style="text-align:center; margin:10px auto;">
                        <p>Designed by Pankti. Vridhi. Dhruvi.</a>
                        </p>
                    </section>

                </div>
                
<script>
                    //smooth scrolling to that section of the webpage
                    $(document).ready(function() {
                        // Add smooth scrolling to all links in navbar + footer link
                        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

                            // Prevent default anchor click behavior
                            event.preventDefault();

                            // Store hash
                            var hash = this.hash;

                            // Using jQuery's animate() method to add smooth page scroll
                            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                            $('html, body').animate({
                                scrollTop: $(hash).offset().top
                            }, 900, function() {

                                // Add hash (#) to URL when done scrolling (default click behavior)
                                window.location.hash = hash;
                            });
                        });

                        // Slide in elements on scroll
                        $(window).scroll(function() {
                            $(".slideanim").each(function() {
                                var pos = $(this).offset().top;

                                var winTop = $(window).scrollTop();
                                if (pos < winTop + 600) {
                                    $(this).addClass("slide");
                                }
                            });
                        });
                    })

       //login modal
       // Get the login modal
       var modal1 = document.getElementById('myModal-login');

       // Get the button that opens the modal
       var link1 = document.getElementById("login-modal");

       // Get the <span> element that closes the modal
       var span1 = document.getElementsByClassName("close-login")[0];

       // When the user clicks the button, open the modal
       link1.onclick = function() {
           modal1.style.display = "block";
       }

       // When the user clicks on <span> (x), close the modal
       span1.onclick = function() {
           modal1.style.display = "none";
       }

       // When the user clicks anywhere outside of the modal, close it
       window.onclick = function(event) {
           if (event.target == modal1) {
               modal1.style.display = "none";
           }
       }

       //end login

       //signup modal
       // Get the signup modal
       var modal2 = document.getElementById('myModal-signup');

       // Get the button that opens the modal
       var link2 = document.getElementById("signup-modal");

       // Get the <span> element that closes the modal
       var span2 = document.getElementsByClassName("close-signup")[0];

       // When the user clicks the button, open the modal
       link2.onclick = function() {
           modal2.style.display = "block";
       }

       // When the user clicks on <span> (x), close the modal
       span2.onclick = function() {
           modal2.style.display = "none";
       }

       // When the user clicks anywhere outside of the modal, close it
       window.onclick = function(event) {
           if (event.target == modal2) {
               modal2.style.display = "none";
           }
       }
	 
       function checkForm(form) {
           if (form.Password.value != form.cpw.value) {
               alert("Password does not match");
               form.Password.focus();
               return false;
           }
           if (form.Age.value <= 0) {
               alert("Age should be greater than zero");
               form.Age.focus();
               return false;
           }
           return true;
       }
       //end signup
 </script>  
</body>
</html>
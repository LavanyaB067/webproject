<?php
$servername = "localhost";  // WAMP default server
$username = "root";         // Default username for WAMP
$password = "";             // No password by default
$dbname = "service_minded"; // Your database name
$port = "3309"; 

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize success message variable
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $donation = htmlspecialchars($_POST['donation']);
    $address = htmlspecialchars($_POST['address']);
    $message = htmlspecialchars($_POST['message']);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO donations (name, mobile, donation, address, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $mobile, $donation, $address, $message);
    
    if ($stmt->execute()) {
        $successMessage = "Thank you! Your donation request has been received.";
    } else {
        $successMessage = "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Minded
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="fixed-top">

        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="#home"><font color="90EE90"><h2>Service minded🌱🤝</h2></font></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#donation">Donations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#mission-id">Missions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <div class="cont-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Contact No : <a href="tel: +9198659****59">+91 98659****59</a></p>
                    </div>
                    <div class="col-lg-6">
                        <div class="social">
                            <a href="#"><img src="img/icons/facebook.png" alt="facebook"></a>
                            <a href="#"><img src="img/icons/instagram.png" alt="inatagram"></a>
                            <a href="#"><img src="img/icons/youtube.png" alt="youtube"></a>
                            <a href="#"><img src="img/icons/linkedin.png" alt="linkedin"></a>
                            <a href="#"><img src="img/icons/gmail.png" alt="gnail"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <section class="home-sec" id="home">
        <div class="container">
            <div class="home-content">
                <div class="row">
                    <div class="col-lg-6 align-item-center">
                        <div class="home-info">
                            <h1>Alone we can do little, together we can do so much</h1>
                            <h2>We <span>Service minded</span> manage wastage for needy peoples</h2>
                            <p>an initiative by KCG college students </p>
                            <div class="buttons">
                                <a href="#contact" class="btn1">Donate now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-first order-lg-last">
                        <div class="img-sec">
                            <img src="img/img-1.png" alt="home-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="don-sec" id="donation">
        <div class="container">
            <div class="heading">
                <h2>We Manage Wastage or Donation like..</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/clothing.png" alt="img">
                        <h3>Clothes</h3>
                        
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/sneakers.png" alt="img">
                        <h3>Footware</h3>
                        
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/salary.png" alt="img">
                        <h3>Fund</h3>
                       
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/gadgets.png" alt="img">
                        <h3>Toys or Gadgets</h3>
                        
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/book.png" alt="img">
                        <h3>Stationary</h3>
                        
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/shopping-bag.png" alt="img">
                        <h3>Food</h3>
                      
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mission" id="mission-id">
        <div class="container">
            <div class="heading">
                <h2>Our Missions</h2>
                <p>We have delivered <span>Wastage</span> or <span>Donations</span> to needy Peoples</p>
            </div>
            <div class="gallery-sec">
                <div class="container">
                    <div class="image-container">
                        <div class="image"><img src="img/miss/1.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/2.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/3.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/4.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/5.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/6.jpg" alt="img"></div>
                    </div>
                </div>
                <div class="pop-image">
                    <span>&times;</span>
                    <img src="img/gallery/1.jpg" alt="gallery-img">
                </div>
                </di v>
            </div>
    </section>

    <section class="about-sec" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 about-img">
               <img src="img/img-2.jpeg" alt="about">
                </div>
                <div class="col-lg-8 order-first order-lg-last">
                    <div class="heading">
                        <h2>What We Do & Why We Do</h2>
                    </div>
                    <p>Welcome to Service Minded, where kindness finds purpose! 🌟 Founded in 2018, we've been on a heartfelt journey to make a positive impact on the world. With the support of over 10,000 amazing individuals, our community continues to grow. </p>
	<p>🤝 Service Minded is not just a platform; it's a family of compassionate souls. Currently, we have branches in major cities across the globe, each representing a beacon of hope and generosity. 🌎 Join our movement, and let's continue spreading love, one act of kindness at a time! 💙</p>
	<section id="customerReviews">
            	<h3>What People are Saying</h3>
            
          	  <div class="review">
              	  <div class="rating">⭐⭐⭐⭐⭐</div>
                	<p class="text">Excellent service! I donated clothes, and the process was smooth. Highly recommend.</p>
           	 </div>

          	  <div class="review">
               	 <div class="rating">⭐⭐⭐⭐</div>
               	 <p class="text">Great initiative. Donated some food items, and the team was responsive and helpful.</p>
          	  </div>
	 <p class="read-more"><a href="">Read More Reviews</a></p>
       	 </section>

                </div>
            </div>
        </div>
    </section>

        <!-- Contact Section -->
        <section id="contact">
        <div class="container">
            <h2>Connect With Us</h2>
            <form method="POST" action="sm.php">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="mobile" class="form-control" placeholder="Mobile No." required>
                </div>
                <div class="form-group">
                    <select name="donation" class="form-control" required>
                        <option value="">Choose Donation Type</option>
                        <option value="food">Food</option>
                        <option value="clothes">Clothes</option>
                        <option value="footwear">Footwear</option>
                        <option value="books">Books</option>
                        <option value="fund">Fund</option>
                        <option value="gadget">Electronic Gadgets</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Address" required>
                </div>
                <div class="form-group">
                    <textarea name="message" class="form-control" placeholder="Message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <p><?php echo $successMessage; ?></p>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="col-one">
                        <h4><font color="90EE90">Service minded</font></h4>
                        <p>Address : 3, Near IT Park, OMR Road, Chennai 440000 </p>
                        <p>Contact No : <a href="tel: +91 98659****59">+91 98659****59</a></p>
                        <p>Email : <a href="mailto:foundation@code.com">foundation@code.com</a></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-two">
                        <h4>Important Links</h4>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#donation">Donations</a></li>
                            <li><a href="#mission-id">Missions</a></li>
                            <li><a href="#about">About us</a></li>
                            <li><a href="#contact">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-one">
                        <h4>Social Media</h4>
                        <div class="social">
                            <a href="#"><img src="img/icons/facebook.png" alt="facebook"></a>
                            <a href="#"><img src="img/icons/instagram.png" alt="inatagram"></a>
                            <a href="#"><img src="img/icons/youtube.png" alt="youtube"></a>
                            <a href="#"><img src="img/icons/linkedin.png" alt="linkedin"></a>
                            <a href="#"><img src="img/icons/gmail.png" alt="gnail"></a>
                        </div>
                        <p>Copyright &copy; 2024 | All Right Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
    
</body>

</html>

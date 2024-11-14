<?php
error_reporting(0);
session_start();
session_destroy();
if ($_SESSION['message']) {
  echo "<script type = ' text/javascript'>
  alert('$message');
  </script>
  ";
}

$host = "localhost";
$user = "root";
$password = "";
$db = "collegeproject";
$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Management System with Login & Registration Form</title>
  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="stylesheet" href="./CSS/Courses.css">
  <link rel="stylesheet" href="./CSS/Teacher.css">
  <link rel="stylesheet" href="./CSS/About.css">
  <link rel="stylesheet" href="./CSS/Contact us.css">
  <link rel="stylesheet" href="./CSS/Footer.css">
  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--About-->
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- End Bootstrap CSS -->
  <!--About close-->
  <!--Contact Us -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Contact Us Close -->
  <!--This link is used to cloudflare for the animation  -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- This is the link of using the map  -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin="" />
  <style>
    .map {
      width: 100%;
      height: 400px;
      /* Adjust the height as needed */
      border: 0;
    }
  </style>

</head>

<body>

  <header>
    <!-- Navbar Start -->
    <nav class="navbar">
      <div class="container">
        <!--<a class="navbar-brand" href="index.html">Hamro College</a>-->
        <ul class="navbar-menu">
          <li><a href="index.php" class="nav-link active">Home</a></li>
          <li><a href="#course" class="nav-link">Courses</a></li>

          <li><a href="#teacher" class="nav-link">Teacher</a></li>
          <li><a href="#about" class="nav-link">About</a></li>
          <li><a href="#Gallery" class="nav-link">Gallery</a></li>
          <li><a href="#contact" class="nav-link">Contact us</a></li>
        </ul>
        <ul class="navbar-action">

          <li><a href="login.php">
              <h4><i class="bi bi-person-fill"></i></h4>
            </a></li>
        </ul>
      </div>
    </nav>
    <!-- Navbar End -->
  </header>
  <!--Header End-->
  <!--Image Slider Start-->
  <div id="carouselExampleCaptions" class="carousel slide mb-3" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="img-fluid w-100 h-100 overflow-hidden" src="./Home IMG/bg1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-block">
          <h5>Wellcome to Our Website<br>Enhance Your Future With Hamro College</br> </h5>
        </div>
      </div>
      <div class="carousel-item">
        <img class="img-fluid w-100 h-100 overflow-hidden" src="./Home IMG/bg2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-block">
          <h5> Explore The World Of <br>Our Graduates</br></h5>
        </div>
      </div>
      <div class="carousel-item">
        <img class="img-fluid w-100 h-100 overflow-hidden" src="./Home IMG/bg3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-block">
          <h5>Better Education For A <br>Better World</br></h5>
        </div>
      </div>
      <div class="carousel-item">
        <img class="img-fluid w-100 h-100 overflow-hidden" src="./Home IMG/bg4.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-block">
          <h5>Exceptional People,<br> Exceptional Care</br></h5>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!--Image Slider End-->
  <main id="main">
    <!-- ======= Course section ======= -->
    <section class="Course-section " id="course">
      <div class="container-course">
        <h2>Courses</h2>
        <p style="text-align: center;">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you
          within a matter of hours to help you.</p>
        <div class="col" data-aos="fade-right"
          data-aos-offset="200"
          data-aos-easing="ease-in-sine">
          <div class="course">
            <img src="https://miro.medium.com/v2/resize:fit:600/0*f8XR9lxWqAqPF8CM.gif" alt="BSc. CSIT">
            <div class="description">
              <h3>BSc. CSIT</h3>
              <p>Some quick example text to build on the card title and make up the bulk of the card's content.
              </p>
              <a href="#!" class="btn">Read More</a>
            </div>
          </div>
          <div class="course">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjjZIV1XR6syWWRNv6yH0hwM7G1_xCFj17CiGC-10TaucFz2mJA9cYWgINnpGMswQOvOfU5JTD9D5iHLa4WUeJcsrmjqNEriqYohzzDi-FVdWAUciu4c_EDoOQ4lsRNtmW6wIKzN96hJGasUpXtgyI-ciSVKeIDzbWf2GqsZ1VeTrtoO2L4VnNUIWjJ6g/s747/tubit.jpg" alt="BIT">
            <div class="description">
              <h3>BIT</h3>
              <p>Some quick example text to build on the card title and make up the bulk of the card's content.
              </p>
              <a href="#!" class="btn">Read More</a>
            </div>
          </div>
          <div class="course">
            <img src="https://www.eddze.com/uploads/50_BCA-Course-Eligibilities.jpeg" alt="BCA">
            <div class="description">
              <h3>BCA</h3>
              <p>Some quick example text to build on the card title and make up the bulk of the card's content.
              </p>
              <a href="#!" class="btn">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= Teacher section ======= -->
    <section class="Teacher-section" id="teacher">
      <div class="container-teachers">
        <h2>Teachers</h2>
        <p style="text-align: center;">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p>
        <div class="col" data-aos="fade-up"
          data-aos-anchor-placement="top-bottom" data-aos-duration="2500">
          <?php
          while ($info = $result->fetch_assoc()) {
          ?>
            <div class="teacher">
              <img src="<?php echo "{$info['image']}"; ?>">

              <div class="description">
                <h3><?php echo "{$info['name']}"; ?></h3>
                <h4><?php echo "{$info['subject']}"; ?></h4>
                <p><?php echo "{$info['description']}"; ?></p>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section>


    <!-- ======= About Section ======= -->
    <section class="about mt-4" id="about">
      <div class="container-fluid">
        <h2 class="h1-responsive font-weight-bold text-center my-2">About</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-1">What is it like to study in one of the best IT colleges in
          Biratnagar?
          Students at Hamro College of IT will know. First, get to know more about the college.</p>
        <div class="row  pt-5 pb-5 ">
          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("About.jpg"); '>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>
          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
            <div class="content">
              <h3> How did Hamro College come to be?</h3>
              <p>Hamro College of IT located at Biratnagar is top college of Province 1.
                The college has been running Bsc.CSIT, BIT and BCA (with 100 % success results) and is also running BCA
                and BCA along with the core values of professional courses, mandatory internship in the IT industry and
                Job Placement.
              </p>
              <p>
                Hamro College was found with a set of academicians and entrepreneurs to meet the rising demand for
                qualified and skilled manpower in the field of Science and Technology, and Humanities. Since its very
                inception,
                Hamro College remains an invitation to learning by both theory and practice
              </p>
              <p>
                We believe that the teaching professionals must raise the overall level of their teaching in order to
                promote the greatest student achievement.The change from semi-professional to true professional stature
                of a teacher is what must happen for students to fully benefit from their education.
              </p>
              <p>
                No organization can survive on its own. To ensure that our students get their best during and after their
                session at Hamro, we have various official and unofficial links and tie ups with national and
                international organizations.
              </p>
              <p>
                The technical faculties like BSC CSIT, BIT and BCA get personalized training
                by our official internship partner F1Soft International.Commonly heard brand names like ESewa and Sudrisya
                Academy are our partners that ensure proper job placement and future of our students.
                One of the major global partners and contributors of the college is Tribhuwan University, in affiliation
                with which we’ve designed most of our courses.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Gallery section ======= -->
    <section class="Gallery-section" id="Gallery">
      <div class="container">
        <h2 class="h1-responsive font-weight-bold text-center  mt-0 my-2">Gallery</h2>
        <!--Section description-->
        <p class="text-center w-responsive  mb-4">Do you have any questions? Please do not hesitate to
          contact us directly. Our team will come back to you within
          a matter of hours to help you.</p>
        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <img src="./Gallery IMG/image1.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
            <img src="./Gallery IMG/image2.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <img src="./Gallery IMG/image3.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />
            <img src="./Gallery IMG/image4.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <img src="./Gallery IMG/image5.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />
            <img src="./Gallery IMG/image6.webp" class="w-100 shadow-1-strong rounded mb-4" alt="YoseBCAe National Park" />
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section class="Contact-section mt-4" id="contact">
      <!--center tag is used here-->
      <h2 style="text-align: center;">Contact Us</h2>
      <p style="text-align: center;">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you with in a matter of hours to help you.</p>
      <div class="formBoxContainer">
        <div class="formBox">
          <p>You will hear from us at the earliest!</p>
          <form action="data_check.php" method="POST">
            <div class="nameInp">
              <i class="fa fa-user icon"></i>
              <input type="text" placeholder="Full Name" name="name" id="name">
            </div>
            <div class="mailInp">
              <i class="fa fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <div class="phoneInp">
              <i class="fa-solid fa-phone"></i>
              <input type="number" name="phone" id="phone" placeholder="Phone" min="100000" max="9999999999">
            </div>
            <div class="queryInp">
              <textarea name="message" id="query" cols="30" rows="5" placeholder="Any comment or your query"></textarea>
            </div>
            <div class="subBCABtn">
              <button type="subBCA" name="apply">Send</button>
            </div>
          </form>
          <p>You can also contact us at +977-9825732919.</p>
        </div>
        <!--Grid column-->
        <div class="map" id="map" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></div>



      </div>
      <!--Grid column-->
      </div>
      <script src="Contact Us.js"></script>
    </section>

    <!-- ======= Footer ======= -->
    <session>
      <footer class="footer">
        <div class="footer-content">
          <!-- Section: Social media -->
          <div class="footer-section footer-info">
            <!-- Content -->
            <h3>Hamro College</h3>
            <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur
              adipisicing elit.</p>
          </div>
          <div class="footer-section products">
            <h3>Products</h3>
            <p><a href="#!" style="color: white;">Html and Css</a></p>
            <p><a href="#!" style="color: white;">JavaScript</a></p>
            <p><a href="#!" style="color: white;">Angular</a></p>
            <p><a href="#!" style="color: white;">React</a></p>
          </div>
          <div class="footer-section">
            <h3>Useful links</h3>
            <p><a href="#!" style="color: white;">Pricing</a></p>
            <p><a href="#!" style="color: white;">Settings</a></p>
            <p><a href="#!" style="color: white;">Orders</a></p>
            <p><a href="#!" style="color: white;">Help</a></p>
          </div>
          <div class="footer-section">
            <h3>Contact</h3>
            <p><i class="bi bi-geo-alt-fill"></i> Shankarpur-2,Biratnagar,Nepal</p>
            <p><i class="bi bi-envelope"></i> info@example.com</p>
            <p><i class="bi bi-phone"></i> +977-9825732919</p>
            <p><i class="bi bi-phone"></i> +977-9862500554</p>
          </div>
        </div>
        <div style="background-color: rgba(212, 18, 18, 0.05); padding: 10px;">
          <b>© 2024 Copyright:</b>
          <a href="https://kshitiz.edu.np/wp/" target="_blank" style="color: white" ;><b>Hamro College.com</b></a>
        </div>
      </footer>
      </section>
      <!-- Option 1: Bootstrap Bundle with Popper image slider -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>





      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
        // this is the script of the animation 
        AOS.init();
      </script>

      <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

      <script>
        var map = L.map('map').setView([26.4525, 87.2718], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,

        }).addTo(map);
        var marker = L.marker([26.4525, 87.2718]).addTo(map);


        var popup = L.popup()
          .setLatLng([26.4560, 87.2720])
          .setContent("HAMRO COLLEGE ")
          .openOn(map);
      </script>

</body>

</html>
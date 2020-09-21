<?php include "admin/db.php" ?>

<?php 
session_start();

if(isset($_SESSION['username'])){
    header('location: admin/index.php');
}
if(isset($_POST['login'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
       echo '<script> alert(" both fileds are required") </script>';
    }else{
        $username = mysqli_real_escape_string($db, $_POST["username"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);
        $query = "SELECT * FROM infos WHERE first_name = '$username' AND password = '$password'";
        $results = mysqli_query($db, $query);
        if(mysqli_num_rows($results) > 0){
            $_SESSION['username'] = $username;
            
            header('location: admin/index.php');
        }else{
            echo '<script> alert(" wrong credencials") </script>'; 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body data-spy="scroll" data-target="#myScrollspy" class="">

    <!-- Fixed Nav -->
    <header class=" header fixed-nav nav-scroll xs-mobile-nav" id="header">
        <nav class="navbar navbar-default navbar-fixed-top" id="myScrollspy">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="images/logo.png" alt="LOGO" class="logo" style="margin-top: -10px;" width="100" height="40"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#experiences">Experiences</a>
                        <li><a href="#portfolio">Portfolio</a>
                        <li><a href="#contact">Contact</a>
                        <li><a href="" class="btn  mb-4" data-toggle="modal"
                                data-target="#modalSubscriptionForm">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- //Close Fixed Nav -->

        <!-- Modal -->

        <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background: black;">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold" style="color: rosybrown;">LogIn</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="index.php">
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="text" id="form3" name="username" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="form3">Your name</label>
                            </div>

                            <div class="md-form mb-4">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="password" id="form2" name="password" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="form2">Your Password</label>
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-primary btn-indigo" name="login" type="submit" style="background-color: rosybrown;">Send <i
                                    class="fas fa-paper-plane-o ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>


    <!-------------------------------------------------------------------------
      -------------------------------------------------------------------------   
                                START TOP SECTION
    ---------------------------------------------------------------------------
    --------------------------------------------------------------------------->
    <section class="topsec" id="home">
        <div class="container">
        <?php 
           
		$get_infos = "SELECT * FROM infos";
		$run_infos = mysqli_query($db,$get_infos);

		$run_infos=mysqli_fetch_array($run_infos);

		$infos_id = $run_infos['id'];
		$first_name = $run_infos['first_name'];
		$last_name = $run_infos['last_name'];
		$email = $run_infos['email'];
		$address = $run_infos['address'];
		$city = $run_infos['city'];
		$contact = $run_infos['phone'];
		$image = $run_infos['image'];
							
		?>
                        
            <div class="col-sm-6">
                <div class="topsec-info">
                    <div class="topsec-prese">
                        <span>Salut Je Suis</span>
                    </div>
                    <h1><?php echo $first_name; ?> <?php echo $last_name; ?></h1>
                    <h2>Développeur Web</h2>

                    <ul class="info">
                        <li>
                            <i class="fa fa-envelope"></i><a href="mailto:"><?php echo $email; ?></a>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i><a href="callto:"><?php echo $contact; ?></a>
                        </li>
                        <li>
                            <i class="fa fa-map-marker"></i><a href="#"><?php echo $address; ?>, <?php echo $city; ?></a>
                        </li>
                    </ul>

                    <ul class="social-icon">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-github"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                   
                </div>
            </div>
            <div class="col-sm-6 profil">
                <img src="images/<?php echo $image; ?>" alt="" class="img-fluid ">

            </div>
            
        </div>
    </section>
    <!-- END TOP SECTION -->

    <!-------------------------------------------------------------------------
      -------------------------------------------------------------------------   
                                START ABOUT SECTION
    ---------------------------------------------------------------------------
    --------------------------------------------------------------------------->
    <section class="aboutSec" id="about">
        <div class="container">
            <div class="row section-separator">
            <?php 
           
            $get_infos = "SELECT * FROM infos";
            $run_infos = mysqli_query($db,$get_infos);
            $run_infos=mysqli_fetch_array($run_infos);
            $infos_id = $run_infos['id'];
            $about = $run_infos['about'];

            
            
            ?>
                <div class="col-sm-12 col-md-6 img-about">
                    <div class="about-img shadow-2">
                        <img src="images/coding.png" alt="" class="img-fluid" width="100%" height="100%">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="aboutsec-info">
                        <h1>About Me</h1>
                        <p class="fadeInUp"><?php echo $about; ?></p>

                        <ul class="about-tag">
                        <?php
                        $get_tech_skills = "SELECT * FROM technical_skills";
                        $run_tech_skills = mysqli_query($db,$get_tech_skills);
                        while($row_tech_skills=mysqli_fetch_array($run_tech_skills)){
                            $tech_skils_id = $row_tech_skills['tech_skils_id'];
                            $tech_skills_name = $row_tech_skills['tech_skills_name'];

                        
                        ?>
                            <li><span><?php echo $tech_skills_name ?></span></li>

                        <?php } ?>
                        </ul>
                        <div class="downlaod">
                            <a href="#" class="btn">Downlaod CV <i class="fa fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT SECTION -->

    <!-------------------------------------------------------------------------
      -------------------------------------------------------------------------   
                                START SKILLS SECTION
    ---------------------------------------------------------------------------
    --------------------------------------------------------------------------->
    <section class="skillsSec" id="skills">
        <div class="container skills_container">
            <div class="row section-separator">
                <div class="col-sm-12 col-md-6">
                    <div class="skills-inner">
                        <div class="technical-skill">
                            <h1>Technical Skills</h1>
                            <div class="container">
                                <div class="skills">
                                    <!-- skill -->
                                    <?php
                                    $get_tech_skills = "SELECT * FROM technical_skills";
                                    $run_tech_skills = mysqli_query($db,$get_tech_skills);
                                    while($row_tech_skills=mysqli_fetch_array($run_tech_skills)){
                                        $tech_skils_id = $row_tech_skills['tech_skils_id'];
                                        $tech_skills_name = $row_tech_skills['tech_skills_name'];
                                        $tech_skills_percent = $row_tech_skills['tech_skills_percent'];

                                    
                                    ?>
                                    <div class="skill">
                                        <!-- title -->
                                        <div class="skill-title">
                                            <?php echo $tech_skills_name; ?>
                                        </div>
                                        <!-- bar -->
                                        <div class="skill-bar" data-bar="<?php echo $tech_skills_percent; ?>"><span></span></div>
                                    </div>
                                    <?php } ?>
                                    <!-- #skill -->
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="professional-skills">
                        <h1>Professional Skills</h1>
                        <div class="container display">
                            <div class="row skil">
                                <div class="col-md-3 ">
                                    <div class="round" data-value="0.87" data-size="150" data-thickness="6">
                                        <strong></strong>
                                        <span> HTML Skill</span>
                                    </div>
                                </div>
                                <div class="col-md-3 skil">
                                    <div class="round" data-value="0.74" data-size="150" data-thickness="6">
                                        <strong></strong>
                                        <span> CSS Skill</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row flot">
                                <div class="col-md-3">
                                    <div class="round" data-value="0.65" data-size="150" data-thickness="6">
                                        <strong></strong>
                                        <span> JavaScript Skill</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="round" data-value="0.95" data-size="150" data-thickness="6">
                                        <strong></strong>
                                        <span> Bootstrap Skill</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT SECTION -->

    <!-------------------------------------------------------------------------
      -------------------------------------------------------------------------   
                                START EXPERIENCES SECTION
    ---------------------------------------------------------------------------
    --------------------------------------------------------------------------->
    <section class="experinceSec" id="experiences">
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 col-md-6">
                    <div class="education">
                        <h1 class="wow fadeInUp">Education</h1>
                        <div class="education-deatils">
                            <!-- Education Institutes-->
                            <?php
                                $get_education = "SELECT * FROM education ORDER BY 1 DESC";
                                $run_education = mysqli_query($db,$get_education);
                                while($row_educat=mysqli_fetch_array($run_education)){
                                    $educat_id = $row_educat['educat_id'];
                                    $educat_option = $row_educat['educat_option'];
                                    $educat_school = $row_educat['educat_school'];
                                    $educat_year = $row_educat['educat_year'];
                                    $educat_desc = $row_educat['educat_desc'];

                                    
                            ?>
                            <div class="education-item dark-bg ">
                                <h3><?php echo $educat_option ?><a href="#"><?php echo $educat_school ?></a></h3>
                                <div class="eduyear"><?php echo $educat_year ?></div>
                                <p><?php echo $educat_desc ?> </p>
                            </div>
                            <?php } ?>
                            
                           
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="work">
                        <h1>Work Experience</h1>
                        <div class="experience-deatils">
                            <!-- Education Institutes-->
                            <?php
                                $get_experience = "SELECT * FROM work_experience ORDER BY 1 DESC";
                                $run_experience = mysqli_query($db,$get_experience);
                                while($row_experience=mysqli_fetch_array($run_experience)){
                                    $experience_id = $row_experience['experience_id'];
                                    $experience_type = $row_experience['experience_type'];
                                    $experience_location = $row_experience['experience_location'];
                                    $experience_duration = $row_experience['experience_duration'];
                                    $experience_desc = $row_experience['experience_desc'];

                                    
                            ?>
                            <div class="work-item dark-bg ">
                                <h3><?php echo $experience_type ?> <a href="#"><?php echo $experience_location ?></a></h3>
                                <div class="eduyear"><?php echo $experience_duration ?></div>
                                <p><?php echo $experience_desc ?></p>
                                
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END EXPERIENCES SECTION -->

    <!-------------------------------------------------------------------------
      -------------------------------------------------------------------------   
                                START PORTFOLIO SECTION
    ---------------------------------------------------------------------------
    --------------------------------------------------------------------------->
    <section class="portfolioSec" id="portfolio">
        <div class="container">
            <div class="heading">
                <h1>My Portfolio</h1>
            </div>
            <div class="filter-btn">
                <ul id="buttons">
                    <li class="active" data-target="all">All</li>
                    <li data-target="html&css">HTML&CSS</li>
                    <li data-target="js">JavaScript</li>
                    <li data-target="php">PHP</li>
                    <li data-target="wordpress">WordPress</li>
                </ul>
            </div>
            <div class="items">
                <div class="box" data-id="html&css">
                    <div class="inner">
                        <img src="image_portfolio/Création_d'un_site_web Coopérative_sass.png" alt="portfolio"  width="150" height="180"/>
                        <div>
                            <span>Réalisation D'un Site Coopérative</span> <i class="fab fa-github"></i>
                        </div>
                    </div>
                </div>
                <div class="box" data-id="js">
                    <div class="inner">
                        <img src="image_portfolio/Creation_d'un_site_web_de_test_Covid19_js.png" alt="portfolio"  width="150" height="180"/>
                        <div>
                            <span>Création d'un Site de test Covid19 </span> <i class="fab fa-github"></i>
                        </div>
                    </div>
                </div>
                <div class="box" data-id="php">
                    <div class="inner">
                        <img src="image_portfolio/back-end_php.png" alt="portfolio"  width="150" height="180"/>
                        <div>
                            <span>Back-end D'un Site Web</span> <i class="fab fa-github"></i>
                        </div>
                    </div>
                </div>
                <div class="box" data-id="js">
                    <div class="inner">
                        <img src="image_portfolio/variables-CSS-avec-JS.png" alt="portfolio"  width="150" height="180"/>
                        <div>
                            <span>Modification du style CSS avec JS </span> <i class="fab fa-github"></i>
                        </div>
                    </div>
                </div>
                <div class="box" data-id="wordpress">
                    <div class="inner">
                        <img src="image_portfolio/wordPress1.png" alt="portfolio" width="150" height="180"/>
                        <div>
                            <span>Création d'un Site E-commerce </span> <i class="fab fa-github"></i>
                        </div>
                    </div>
                </div>
                <div class="box" data-id="html&css">
                    <div class="inner">
                        <img src="image_portfolio/HTML_CSS.png" alt="portfolio"  width="150" height="180"/>
                        <div>
                            <span>Réalisation d'un Site web HTML/CSS</span> <i class="fab fa-github"></i>
                        </div>
                    </div>
                </div>
                <div class="box" data-id="php">
                    <div class="inner">
                        <img src="image_portfolio/back-end_site_web_php1.png" alt="portfolio"  width="150" height="180"/>
                        <div>
                            <span>Réalisation d'un Site E-commerce </span> <i class="fab fa-github"></i>
                        </div>
                    </div>
                </div>
                <div class="box" data-id="js">
                    <div class="inner">
                        <img src="image_portfolio/facturation_js.png" alt="portfolio"  width="150" height="180"/>
                        <div>
                            <span>Facturation </span> <i class="fab fa-github"></i>
                        </div>
                    </div>
                </div>
                <div class="box" data-id="html&css">
                    <div class="inner">
                        <img src="image_portfolio/SASS-BEM.png" alt="portfolio" width="150" height="180"/>
                        <div>
                            <span>HTML/SASS</span> <i class="fab fa-github"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PORTFOLIO SECTION -->

    <!-------------------------------------------------------------------------
      -------------------------------------------------------------------------   
                                FOOTER SECTION
    ---------------------------------------------------------------------------
    --------------------------------------------------------------------------->
    

    <footer class="footer" id="contact">
        <div class="container">
            <div class="form-sections">
                <!-- Form left -->
                <div class="Form-left">
                    <?php 
           
                    $get_info = "SELECT * FROM infos";
                    $run_info = mysqli_query($db,$get_info);

                    $infos_id = $run_infos['id'];
                    $info_email = $run_infos['email'];
                    $info_address = $run_infos['address'];
                    $info_city = $run_infos['city'];
                    $info_contact = $run_infos['phone'];
                                        
                    ?>
                    <h1>Get In Touch</h1>
                    <div class="line"></div>
                    <!--border-bottom line-->
                    <p>Contact us :)</p><br>

                    <!--first Heading -->
                    <h4>ADDRESS</h4>
                    <span><?php echo $info_address; ?>, <?php echo $info_city; ?></span>
                    <hr><br><br>

                    <!--second Heading -->
                    <h4>PHONE</h4>
                    <span><?php echo $info_contact; ?></span>
                    <hr><br><br>

                    <!--third Heading -->
                    <h4>EMAIL</h4>
                    <span><?php echo $info_email; ?></span>
                    <hr> <br>

                    <!-- social media icons -->
                    <a href="#" ><i class="fab fa-facebook-f" style="color: rosybrown;padding: 10px;font-size: 25px;"></i></a>
                    <a href="#" ><i class="fab fa-twitter" style="color: rosybrown;padding: 10px;font-size: 25px;"></i></a>
                    <a href="#" ><i class="fab fa-github" style="color: rosybrown;padding: 10px;font-size: 25px;"></i></a>
                    <a href="#" ><i class="fab fa-linkedin-in" style="color: rosybrown;padding: 10px;font-size: 25px;"></i></a>
                    
                </div>
                <?php
                $alert = "";
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception;

                if (isset($_POST['contact'])) {

                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];
                    $subject = $_POST['subject'];
                    $text = "you have received an e-mail from ".$username." ".$email.".\n\r"."<br>".$message;

                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';

                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                                        // Enable verbose debug output
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    
                        $mail->Username   = 'meriem.dev20@gmail.com';                     // SMTP username
                        $mail->Password   = 'be_awesome@';                               // SMTP password
                        $mail->SMTPSecure = "ssl";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        //Recipients
                        $mail->setFrom($email, $username);
                        $mail->addAddress('meriem.dev20@gmail.com');               // Name is optional
                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body    = $text;
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        $mail->send();
                        $alert = $alert = '<div class="alert-success">
                                                <span>Message Sent! Thank you for contacting us.</span>
                                            </div>';
                    } catch (Exception $e) {
                        $alert = '<div class="alert-error">
                                        <span>'.$mail->ErrorInfo.'</span>
                                    </div>';
                        // "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
                        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }	
                ?>
                <!-- form right -->
                <div class="Form-right">
                    <h1>Contact Us </h1>
                    <div class="line"></div>
                    <div><?php echo $alert; ?></div>
                    <!-- form -->
                    <form action="index.php" method="post">

                        <input type="text" name="username" placeholder="Name"><br><br>

                        <input type="email" name="email" placeholder="Your Email"><br><br>

                        <input type="text" name="subject" placeholder="Your Subject"><br><br>

                        <textarea id="" cols="50" rows="7" name="message" placeholder="Your Message"></textarea><br>
                        <button name="contact">Send</button>
                    </form>
                    
                </div>
            </div>
        </div>
        <a href="#home" class="top"><span class="glyphicon glyphicon-chevron-up"></span></a>
    </footer>
    <!-- END FOOTER -->

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <!-- <script src="https://rendro.github.io/easy-pie-chart/javascripts/jquery.easy-pie-chart.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.0/circle-progress.min.js'></script>
    <script src="js/script.js"></script>

    

</body>

</html>
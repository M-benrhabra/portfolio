
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_infos'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $about_info = $_POST['about'];
   
    $img = $_FILES['img']['name'];
    $temp_name = $_FILES['img']['tmp_name'];

    move_uploaded_file($temp_name, "../images/$img");

    $add_infos = "INSERT INTO infos (first_name,last_name,email,password,address,city,phone,image,about) VALUES ('$fname','$lname','$email','$password','$address','$city','$contact',' $img','$about_info')";
    $add_infos_query = mysqli_query($db,$add_infos);

    if($add_infos_query){
        echo " <script>alert('Infos has been added successfully')</script>";
        echo " <script>window.open('view_infos.php','_self')</script>";
    }

}
?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert infos
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Insert Infos 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="add_infos.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" name="fname">
                    </div>

                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control" name="lname">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="City">
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact">
                    </div>

                    <div class="form-group">
                        <label for="product_image"> Image </label>
                        <input type="file"  name="img" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="about">About me</label>
                        <textarea class="form-control "name="about" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_infos" value="Add Infos">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

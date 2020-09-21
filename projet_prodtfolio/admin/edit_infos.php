
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_GET['edit'])) {
    $info_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM infos WHERE id = '$info_id' ";
$load_info_query = mysqli_query($db,$edit_query);

while($row = mysqli_fetch_array($load_info_query)){
$id = $row['id'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$password = $row['password'];
$address = $row['address'];
$city = $row['city'];
$phone = $row['phone'];
$image = $row['image'];
$about = $row['about'];

}

if (isset($_POST['edit_infos'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $info_email = $_POST['email'];
    $info_password = $_POST['password'];
    $info_address = $_POST['address'];
    $info_City = $_POST['City'];
    $info_contact = $_POST['contact'];
    $info_about = $_POST['about'];
    $info_img = $_FILES['img']['name'];
    $temp_name = $_FILES['img']['tmp_name'];
    
    move_uploaded_file($temp_name, "../images/$info_img");

    $fname = mysqli_real_escape_string($db,$fname);
    $lname = mysqli_real_escape_string($db,$lname);
    $info_email = mysqli_real_escape_string($db,$info_email);
    $info_password = mysqli_real_escape_string($db,$info_password);
    $info_address = mysqli_real_escape_string($db,$info_address);
    $info_City = mysqli_real_escape_string($db,$info_City);
    $info_contact = mysqli_real_escape_string($db,$info_contact);
    $info_about = mysqli_real_escape_string($db,$info_about);
    $info_img = mysqli_real_escape_string($db,$info_img);

    $query = "UPDATE infos SET first_name = '$fname', last_name ='$lname', email ='$info_email', password ='$info_password', address = '$info_address', city = '$info_City', phone = '$info_contact', image = '$info_img', about = '$info_about' WHERE id = $id ";
    $edit_infos = mysqli_query($db,$query);

    if (!$edit_infos) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_infos){
        echo " <script>alert('The Info has been edit successfully')</script>";
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
                <form action="edit_infos.php?edit=<?php echo $id ?>" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" name="fname" value = "<?php echo $first_name?>">
                    </div>

                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control" name="lname" value = "<?php echo $last_name?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value = "<?php echo $email?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" value = "<?php echo $password?>">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value = "<?php echo $address?>">
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="City" value = "<?php echo $city?>">
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" value = "<?php echo $phone?>">
                    </div>

                    <div class="form-group">
                        <label for="product_image"> Image </label>
                        <input type="file"  name="img" class="form-control"value = "<?php echo $image?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="about">About me</label>
                        <textarea class="form-control "name="about" id="" cols="30" rows="5"><?php echo $about?>
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_infos" value="Edit Infos">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

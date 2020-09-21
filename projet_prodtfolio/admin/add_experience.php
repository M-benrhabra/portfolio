
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_work'])) {
    $type = $_POST['type'];
    $location = $_POST['location'];
    $duration = $_POST['duration'];
    $info = $_POST['info'];

    $add_experience = "INSERT INTO work_experience (experience_type ,experience_location,experience_duration,experience_desc) VALUES ('$type','$location','$duration','$info')";
    $add_experience_query = mysqli_query($db,$add_experience);

    if($add_experience_query){
        echo " <script>alert('Experience has been added successfully')</script>";
        echo " <script>window.open('view_experience.php','_self')</script>";
    }

}
?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Work Experience
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Insert Work Experience 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="add_experience.php" method="post">    

                    <div class="form-group">
                        <label>Work Experience Type</label>
                        <input type="text" class="form-control" name="type">
                    </div>

                    <div class="form-group">
                        <label>Work Experience location</label>
                        <input type="text" class="form-control" name="location">
                    </div>

                    <div class="form-group">
                        <label>Work Experience Duration</label>
                        <input type="text" class="form-control" name="duration">
                    </div>

                    <div class="form-group">
                        <label>Work Experience Infos</label>
                        <input type="text" class="form-control" name="info">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_work" value="Add Experience">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

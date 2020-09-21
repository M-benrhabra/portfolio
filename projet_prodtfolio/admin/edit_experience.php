
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_GET['edit'])) {
    $exp_id = $_GET['edit']; 
}

$edit_experience = "SELECT * FROM work_experience WHERE experience_id = '$exp_id' ";
$load_experience_query = mysqli_query($db,$edit_experience);

while($row = mysqli_fetch_array($load_experience_query)){
    $experience_id = $row['experience_id'];
    $experience_type = $row['experience_type'];
    $experience_location = $row['experience_location'];
    $experience_duration = $row['experience_duration'];
    $experience_info = $row['experience_desc'];

}

if (isset($_POST['edit_experience'])) {
    $ex_type = $_POST['ex_type'];
    $ex_location = $_POST['ex_location'];
    $ex_duration = $_POST['ex_duration'];
    $ex_info = $_POST['ex_info'];

    $ex_type = mysqli_real_escape_string($db,$ex_type);
    $ex_location = mysqli_real_escape_string($db,$ex_location);
    $ex_duration = mysqli_real_escape_string($db,$ex_duration);
    $ex_info = mysqli_real_escape_string($db,$ex_info);

    $query = "UPDATE work_experience SET experience_type = '$ex_type',experience_location ='$ex_location', experience_duration = '$ex_duration', experience_desc = '$ex_info' WHERE experience_id = $experience_id ";
    $edit_exp = mysqli_query($db,$query);

    if (!$edit_exp) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_exp){
        echo " <script>alert('Experience has been edit successfully')</script>";
        echo " <script>window.open('view_experience.php','_self')</script>";
    }
    
}

?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Work Experience
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Edit Work Experience 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="edit_experience.php?edit=<?php echo $experience_id ?>" method="post" >    
     
     
                    <div class="form-group">
                        <label>Education Option</label>
                        <input type="text" class="form-control" name="ex_type" value = "<?php echo $experience_type ?>">
                    </div>

                    <div class="form-group">
                        <label>School</label>
                        <input type="text" class="form-control" name="ex_location" value = "<?php echo $experience_location ?>">
                    </div>

                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" name="ex_duration" value = "<?php echo $experience_duration ?>">
                    </div>

                    <div class="form-group">
                        <label>Infos</label>
                        <input type="text" class="form-control" name="ex_info" value = "<?php echo $experience_info ?>">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_experience" value="Edit Experience">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

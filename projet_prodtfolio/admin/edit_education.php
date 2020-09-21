
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_GET['edit'])) {
    $educt_id = $_GET['edit']; 
}

$edit_education = "SELECT * FROM education WHERE educat_id = '$educt_id' ";
$load_educat_query = mysqli_query($db,$edit_education);

while($row = mysqli_fetch_array($load_educat_query)){
    $edudation_id = $row['educat_id'];
    $educat_option = $row['educat_option'];
    $educat_school = $row['educat_school'];
    $educat_year = $row['educat_year'];
    $educat_desc = $row['educat_desc'];

}

if (isset($_POST['edit_education'])) {
    $edu_option = $_POST['edu_option'];
    $edu_school = $_POST['edu_school'];
    $edu_year = $_POST['edu_year'];
    $edu_info = $_POST['edu_info'];

    $edu_option = mysqli_real_escape_string($db,$edu_option);
    $edu_school = mysqli_real_escape_string($db,$edu_school);
    $edu_year = mysqli_real_escape_string($db,$edu_year);
    $edu_info = mysqli_real_escape_string($db,$edu_info);

    $query = "UPDATE education SET educat_option = '$edu_option',educat_school ='$edu_school', educat_year = '$edu_year', educat_desc = '$edu_info' WHERE educat_id = $edudation_id ";
    $edit_educat = mysqli_query($db,$query);

    if (!$edit_educat) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_educat){
        echo " <script>alert('PEducation has been edit successfully')</script>";
        echo " <script>window.open('view_education.php','_self')</script>";
    }
    
}

?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Education
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Edit Education 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="edit_education.php?edit=<?php echo $edudation_id ?>" method="post" >    
     
     
                    <div class="form-group">
                        <label>Education Option</label>
                        <input type="text" class="form-control" name="edu_option" value = "<?php echo $educat_option; ?>">
                    </div>

                    <div class="form-group">
                        <label>School</label>
                        <input type="text" class="form-control" name="edu_school" value = "<?php echo $educat_school; ?>">
                    </div>

                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" name="edu_year" value = "<?php echo $educat_year; ?>">
                    </div>

                    <div class="form-group">
                        <label>Infos</label>
                        <input type="text" class="form-control" name="edu_info" value = "<?php echo $educat_desc; ?>">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_education" value="Edit Education">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

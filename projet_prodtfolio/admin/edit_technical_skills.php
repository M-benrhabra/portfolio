
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_GET['edit'])) {
    $skills_id = $_GET['edit']; 
}

$edit_skills = "SELECT * FROM technical_skills WHERE tech_skils_id = '$skills_id' ";
$load_skills_query = mysqli_query($db,$edit_skills);

while($row = mysqli_fetch_array($load_skills_query)){
$tech_id = $row['tech_skils_id'];
$tech_skills_name = $row['tech_skills_name'];
$tech_skills_percent = $row['tech_skills_percent'];

}

if (isset($_POST['edit_skills'])) {
    $skills_name = $_POST['skills_name'];
    $skills_percent = $_POST['skills_percent'];

    $skills_name = mysqli_real_escape_string($db,$skills_name);
    $skills_percent = mysqli_real_escape_string($db,$skills_percent);

    $query = "UPDATE technical_skills SET tech_skills_name = '$skills_name', tech_skills_percent ='$skills_percent' WHERE tech_skils_id = $tech_id ";
    $edit_tech_skills = mysqli_query($db,$query);

    if (!$edit_tech_skills) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_tech_skills){
        echo " <script>alert('Skills has been edit successfully')</script>";
        echo " <script>window.open('view_technical_skills.php','_self')</script>";
    }
    
}

?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Technical Skills
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Edit Technical Skills 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="edit_technical_skills.php?edit=<?php echo $tech_id ?>" method="post" >    
     
     
                    <div class="form-group">
                        <label>Technical Skills Title</label>
                        <input type="text" class="form-control" name="skills_name" value = "<?php echo $tech_skills_name ?>">
                    </div>

                    <div class="form-group">
                        <label>Technical Skills Percent</label>
                        <input type="text" class="form-control" name="skills_percent" value = "<?php echo $tech_skills_percent?>">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_skills" value="Edit Technical Skills">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

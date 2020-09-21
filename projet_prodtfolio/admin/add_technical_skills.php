
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_technical'])) {
    $tech_title = $_POST['tech_title'];
    $tech_percent = $_POST['tech_percent'];

    $add_tech_skills = "INSERT INTO technical_skills (tech_skills_name ,tech_skills_percent) VALUES ('$tech_title','$tech_percent')";
    $add_tech_skills_query = mysqli_query($db,$add_tech_skills);

    if($add_tech_skills_query){
        echo " <script>alert('Skills has been added successfully')</script>";
        echo " <script>window.open('view_technical_skills.php','_self')</script>";
    }

}
?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Technical Skills 
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Insert Technical Skills 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="add_technical_skills.php" method="post">    

                    <div class="form-group">
                        <label>Technical Skills Title</label>
                        <input type="text" class="form-control" name="tech_title">
                    </div>

                    <div class="form-group">
                        <label>Technical Skills Percent</label>
                        <input type="text" class="form-control" name="tech_percent">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_technical" value="Add technical skills">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

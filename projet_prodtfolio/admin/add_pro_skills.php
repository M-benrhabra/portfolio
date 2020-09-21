
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_professional'])) {
    $pro_title = $_POST['pro_title'];
    $pro_percent = $_POST['pro_percent'];

    $add_pro_skills = "INSERT INTO professional_skills (pro_skills_name ,pro_skills_percent) VALUES ('$pro_title','$pro_percent')";
    $add_pro_skills_query = mysqli_query($db,$add_pro_skills);

    if($add_pro_skills_query){
        echo " <script>alert('Professional Skills has been added successfully')</script>";
        echo " <script>window.open('view_pro_skills.php','_self')</script>";
    }

}
?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Professional Skills 
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Insert Professional Skills 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="add_pro_skills.php" method="post">    

                    <div class="form-group">
                        <label>Professional Skills Title</label>
                        <input type="text" class="form-control" name="pro_title">
                    </div>

                    <div class="form-group">
                        <label>Professional Skills Percent</label>
                        <input type="text" class="form-control" name="pro_percent">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_professional" value="Add Professional skills">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   


<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_educat'])) {
    $education_op = $_POST['education_op'];
    $school = $_POST['school'];
    $year = $_POST['year'];
    $info = $_POST['info'];

    $add_education = "INSERT INTO education (educat_option ,educat_school,educat_year,educat_desc) VALUES ('$education_op','$school','$year','$info')";
    $add_education_query = mysqli_query($db,$add_education);

    if($add_education_query){
        echo " <script>alert('Education has been added successfully')</script>";
        echo " <script>window.open('view_education.php','_self')</script>";
    }

}
?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Education
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Insert Education 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="add_education.php" method="post">    

                    <div class="form-group">
                        <label>Education Option</label>
                        <input type="text" class="form-control" name="education_op">
                    </div>

                    <div class="form-group">
                        <label>School</label>
                        <input type="text" class="form-control" name="school">
                    </div>

                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" name="year">
                    </div>

                    <div class="form-group">
                        <label>Education Infos</label>
                        <input type="text" class="form-control" name="info">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_educat" value="Add Education">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

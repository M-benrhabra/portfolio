
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_project'])) {
    $title = $_POST['title'];
    $cat = $_POST['cat'];
    $image = $_POST['image'];
    $lien = $_POST['lien'];

    $add_project = "INSERT INTO portfolio (pro_cat_id,project_title,project_image,project_lien_gitHub) VALUES ('$cat','$title','$image','$lien')";
    $add_project_query = mysqli_query($db,$add_project);

    if($add_project_query){
        echo " <script>alert('Project has been added successfully')</script>";
        echo " <script>window.open('view_project.php','_self')</script>";
    }

}
?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Project
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Insert Project 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="add_project.php" method="post">    

                    <div class="form-group">
                        <label>Project Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="form-group">
                        <label for="title">Project Categories </label>
                        <select name="cat" class="form-control" >
                        
                        <option> Select a category </option>
                          
                          <?php 

                           $get_cat = "SELECT * FROM portfolio_categories";
                           $run_cat = mysqli_query($db, $get_cat);
                           while($row_cat= mysqli_fetch_array($run_cat)){
                               $pro_cat_id = $row_cat['pro_cat_id'];
                               $pro_cat_title = $row_cat['pro_cat_title'];

                               echo "
                               <option value='$pro_cat_id' > $pro_cat_title </option>
                               
                               ";
                           }
                          ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Project Image</label>
                        <input type="text" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <label>Lien Project Github</label>
                        <input type="text" class="form-control" name="lien">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_project" value="Add Project">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   


<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_GET['edit'])) {
    $pro_id = $_GET['edit']; 
}

$edit_project = "SELECT * FROM portfolio WHERE project_id  = '$pro_id' ";
$load_project_query = mysqli_query($db,$edit_project);

while($row = mysqli_fetch_array($load_project_query)){
    $project_id = $row['project_id '];
    $project_title = $row['project_title'];
    $project_image = $row['project_image'];
    $project_lien_gitHub = $row['project_lien_gitHub'];
}

if (isset($_POST['edit_project'])) {
    $p_title = $_POST['p_title'];
    $p_image = $_POST['p_image'];
    $p_lien = $_POST['p_lien'];
    $categories = $_POST['categories'];

    $p_title = mysqli_real_escape_string($db,$p_title);
    $p_image = mysqli_real_escape_string($db,$p_image);
    $p_lien = mysqli_real_escape_string($db,$p_lien);
    $categories = mysqli_real_escape_string($db,$categories);

    $query = "UPDATE portfolio SET pro_cat_id = '$categories', project_title = '$p_title',project_image ='$p_image', project_lien_gitHub = '$p_lien' WHERE project_id  = $project_id";
    $edit_pr = mysqli_query($db,$query);

    if (!$edit_pr) {
        die("QUERY FAILED". mysqli_error($db));
    }
    if($edit_pr){
        echo " <script>alert('Project has been edit successfully')</script>";
        echo " <script>window.open('view_project.php','_self')</script>";
    }
    
}

?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Project
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Edit Project 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="edit_project.php?edit=<?php echo $project_id ?>" method="post" >    
     
     
                    <div class="form-group">
                        <label>Project Title</label>
                        <input type="text" class="form-control" name="p_title" value = "<?php echo $project_title ?>">
                    </div>

                    <div class="form-group">
                        <label for="title">Project Categories </label>
                        <!-- <input type="text" class="form-control" name="product_title"> -->
                        <select name="categories" class="form-control" >
                        
                        <option> Select a category </option>
                          
                          <?php 

                           $get_cat = "SELECT * FROM portfolio_categories";
                           $run_cat = mysqli_query($db, $get_cat);
                           while($row_cat= mysqli_fetch_array($run_cat)){
                               $cat_id = $row_cat['pro_cat_id'];
                               $cat_title = $row_cat['pro_cat_title'];

                               echo "
                               <option value=' $cat_id' > $cat_title </option>
                               
                               ";
                           }
                          ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Project Title</label>
                        <input type="text" class="form-control" name="p_image" value = "<?php echo $project_image ?>">
                    </div>

                    <div class="form-group">
                        <label>Project lien GitHub</label>
                        <input type="text" class="form-control" name="p_lien" value = "<?php echo $project_lien_gitHub ?>">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_project" value="Edit Project">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

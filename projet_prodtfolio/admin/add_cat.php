
<?php
session_start();
 include "admin_header.php"
 ?>


<?php 

if (isset($_POST['add_cat'])) {
    $title = $_POST['title'];
    $image = $_POST['image'];

    $add_cat = "INSERT INTO portfolio_categories (pro_cat_title,pro_cat_image) VALUES ('$title','$image')";
    $add_cat_query = mysqli_query($db,$add_cat);

    if($add_cat_query){
        echo " <script>alert('Catégories has been added successfully')</script>";
        echo " <script>window.open('view_cat.php','_self')</script>";
    }

}
?>



<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Categories
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Insert Categories 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
                <!-- /.row -->
                <form action="add_cat.php" method="post">    

                    <div class="form-group">
                        <label>Title Categories</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="form-group">
                        <label>Image Categories</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_cat" value="Add Categories">
                    </div>


                </form>


            </div>
            
        </div>
            
    </div>
        
</div>

    <script src="js/tinymce/tinymce.min.js" ></script>
    <script>tinymce.init({selector: 'textarea'});</script> 

    <?php include "admin_footer.php" ?>
   

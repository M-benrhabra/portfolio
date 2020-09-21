<?php 
session_start();
include "admin_header.php"
 ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / View Categories 
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  View Categories 
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <!-- /.row -->
                <table class="table">
                <thead class="black white-text">
                    <tr>
                
                        <th scope="col">Id</th>
                        <th scope="col">Categories Image</th>
                        <th scope="col">Categories title</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $get_cat = "SELECT * FROM portfolio_categories" ;
                            $load_cat = mysqli_query($db, $get_cat);

                            if (!$load_cat) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_cat)) {
                                $id = $row['pro_cat_id'];
                                $pro_cat_title = $row['pro_cat_title'];
                                $pro_cat_image = $row['pro_cat_image'];

                                echo "<tr>";
                                echo "<th scope='row'>$id</th>";
                                echo "<td>$pro_cat_title</td>";
                                echo "<td>$pro_cat_image</td>";
                                echo "<td> <a href='edit_cat.php?edit=$id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_cat.php?delet=$id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";

                            }
                            
                            if (isset($_GET['delet'])) {
                                $deleted_cat = $_GET['delet'];

                                $delete_query = "DELETE FROM portfolio_categories WHERE  pro_cat_id = '$deleted_cat'";
                                $deleted_cat_query = mysqli_query($db,$delete_query);

                                header('Location: view_cat.php');
                            }  

                        ?>

                      </tbody>
            </table>

            </div>
            </div>
            
        </div>
    </div>
</div>

        

    <?php include "admin_footer.php" ?>
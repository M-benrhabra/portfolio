<?php 
session_start();
include "admin_header.php"
 ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / View Work Experience 
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  View Work Experience 
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <!-- /.row -->
                <table class="table">
                <thead class="black white-text">
                    <tr>
                
                        <th scope="col">Id</th>
                        <th scope="col">Project Image</th>
                        <th scope="col">Project titlr</th>
                        <th scope="col">Project lien</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $get_project = "SELECT * FROM portfolio" ;
                            $load_project = mysqli_query($db, $get_project);

                            if (!$load_project) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_project)) {
                                $id = $row['project_id'];
                                $project_title = $row['project_title'];
                                $project_image = $row['project_image'];
                                $project_lien_gitHub = $row['project_lien_gitHub'];

                                echo "<tr>";
                                echo "<th scope='row'>$id</th>";
                                echo "<td>$project_title</td>";
                                echo "<td>$project_image</td>";
                                echo "<td>$project_lien_gitHub</td>";
                                echo "<td> <a href='edit_project.php?edit=$id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_project.php?delete=$id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";

                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_project = $_GET['delete'];

                                $delete_query = "DELETE FROM portfolio WHERE  project_id = '$deleted_project'";
                                $deleted_project_query = mysqli_query($db,$delete_query);

                                header('Location: view_project.php');
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
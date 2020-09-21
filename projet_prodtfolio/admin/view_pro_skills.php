<?php 
session_start();
include "admin_header.php"
 ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / View Professional Skills 
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  View Professional Skills 
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <!-- /.row -->
                <table class="table">
                <thead class="black white-text">
                    <tr>
                
                        <th scope="col">Id</th>
                        <th scope="col">Professional Skills Title</th>
                        <th scope="col">Professioal Skills Percent</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $get_professional_skills = "SELECT * FROM professional_skills" ;
                            $load_pro_skills_query = mysqli_query($db, $get_professional_skills);

                            if (!$load_pro_skills_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_pro_skills_query)) {
                                $id = $row['pro_skills_id'];
                                $pro_title = $row['pro_skills_name'];
                                $pro_percent = $row['pro_skills_percent'];

                                echo "<tr>";
                                echo "<th scope='row'>$id</th>";
                                echo "<td>$pro_title</td>";
                                echo "<td>$pro_percent</td>";
                                echo "<td> <a href='edit_pro_skills.php?edit=$id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_pro_skills.php?delete=$id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";

                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_pro_skills_id = $_GET['delete'];

                                $delete_query = "DELETE FROM professional_skills WHERE pro_skills_id = '$deleted_pro_skills_id'";
                                $deleted_skills_query = mysqli_query($db,$delete_query);

                                header('Location: view_pro_skills.php');
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
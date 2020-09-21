<?php 
session_start();
include "admin_header.php"
 ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / View Technical Skills 
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  View Technical Skills 
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <!-- /.row -->
                <table class="table">
                <thead class="black white-text">
                    <tr>
                
                        <th scope="col">Id</th>
                        <th scope="col">Technical Skills Title</th>
                        <th scope="col">Technical Skills Percent</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $get_technical_skills = "SELECT * FROM technical_skills" ;
                            $load_skills_query = mysqli_query($db, $get_technical_skills);

                            if (!$load_skills_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_skills_query)) {
                                $id = $row['tech_skils_id'];
                                $tech_title = $row['tech_skills_name'];
                                $tech_percent = $row['tech_skills_percent'];

                                echo "<tr>";
                                echo "<th scope='row'>$id</th>";
                                echo "<td>$tech_title</td>";
                                echo "<td>$tech_percent</td>";
                                echo "<td> <a href='edit_technical_skills.php?edit=$id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_technical_skills.php?delete=$id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";

                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_skills_id = $_GET['delete'];

                                $delete_query = "DELETE FROM technical_skills WHERE tech_skils_id = '$deleted_skills_id'";
                                $deleted_skills_query = mysqli_query($db,$delete_query);

                                header('Location: view_technical_skills.php');
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
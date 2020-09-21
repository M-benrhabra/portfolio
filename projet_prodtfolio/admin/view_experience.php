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
                        <th scope="col">Work Experience Type</th>
                        <th scope="col">Work Experience location</th>
                        <th scope="col">Work Experience duration</th>
                        <th scope="col">Work Experience Infos</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $get_experience = "SELECT * FROM work_experience" ;
                            $load_experience = mysqli_query($db, $get_experience);

                            if (!$load_experience) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_experience)) {
                                $id = $row['experience_id'];
                                $experience_type = $row['experience_type'];
                                $experience_location = $row['experience_location'];
                                $experience_duration = $row['experience_duration'];
                                $experience_desc = $row['experience_desc'];

                                echo "<tr>";
                                echo "<th scope='row'>$id</th>";
                                echo "<td>$experience_type</td>";
                                echo "<td>$experience_location</td>";
                                echo "<td>$experience_duration</td>";
                                echo "<td>$experience_desc</td>";
                                echo "<td> <a href='edit_experience.php?edit=$id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_experience.php?delete=$id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";

                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_experience = $_GET['delete'];

                                $delete_query = "DELETE FROM work_experience WHERE  experience_id = '$deleted_experience'";
                                $deleted_experience_query = mysqli_query($db,$delete_query);

                                header('Location: view_education.php');
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
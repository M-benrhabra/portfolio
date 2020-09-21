<?php 
session_start();
include "admin_header.php"
 ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / View List Education 
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  View List Edication 
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <!-- /.row -->
                <table class="table">
                <thead class="black white-text">
                    <tr>
                
                        <th scope="col">Id</th>
                        <th scope="col">Education Option</th>
                        <th scope="col">School</th>
                        <th scope="col">Year</th>
                        <th scope="col">Infos</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $get_education = "SELECT * FROM education" ;
                            $load_education = mysqli_query($db, $get_education);

                            if (!$load_education) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_education)) {
                                $id = $row['educat_id'];
                                $educat_option = $row['educat_option'];
                                $educat_school = $row['educat_school'];
                                $educat_year = $row['educat_year'];
                                $educat_desc = $row['educat_desc'];

                                echo "<tr>";
                                echo "<th scope='row'>$id</th>";
                                echo "<td>$educat_option</td>";
                                echo "<td>$educat_school</td>";
                                echo "<td>$educat_year</td>";
                                echo "<td>$educat_desc</td>";
                                echo "<td> <a href='edit_education.php?edit=$id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_education.php?delete=$id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";

                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_educat = $_GET['delete'];

                                $delete_query = "DELETE FROM education WHERE educat_id = '$deleted_educat'";
                                $deleted_educat_query = mysqli_query($db,$delete_query);

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
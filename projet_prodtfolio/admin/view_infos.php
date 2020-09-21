<?php 
session_start();
include "admin_header.php"
 ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / View infos
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  View infos
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <!-- /.row -->
                <table class="table">
                <thead class="black white-text">
                    <tr>
                
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>                       
                        <th scope="col">Email</th>
                        <th scope="col">password</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Contact</th>
                        <th scope="col">About</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM infos" ;
                            $load_infos_query = mysqli_query($db,$query);

                            if (!$load_infos_query) {
                                die("QUERY FAILED". mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_array($load_infos_query)) {
                                $id = $row['id'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];
                                $email = $row['email'];
                                $password = $row['password'];
                                $address = $row['address'];
                                $city = $row['city'];
                                $phone = $row['phone'];
                                $image = $row['image'];
                                $about = $row['about'];

                                echo "<tr>";
                                echo "<th scope='row'>$id</th>";
                                echo "<td><img class= 'img-responsive' src='../images/$image' alt=''></td>";
                                echo "<td>$first_name</td>";
                                echo "<td>$last_name</td>";
                                echo "<td>$email</td>";
                                echo "<td>$password</td>";
                                echo "<td>$address</td>";
                                echo "<td>$city</td>";
                                echo "<td>$phone</td>";
                                echo "<td>$about</td>";
                                echo "<td> <a href='edit_infos.php?edit=$id'><i class='fa fa-pencil'></i>Edit</a></td>";
                                echo "<td><a href='view_infos.php?delete=$id'><i class='fa fa-trash'></i>Delete</a></td>";
                                echo "</tr>";

                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_infos_id = $_GET['delete'];

                                $delete_query = "DELETE FROM infos WHERE id = '$deleted_infos_id'";
                                $deleted_infos_query = mysqli_query($db,$delete_query);

                                header('Location: view_infos.php');
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
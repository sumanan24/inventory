<?php include_once('config.php'); ?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Department </title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <?php include_once('script.php'); ?>
</head>

<body>
    <?php include_once('nav.php') ?>
    <section class="home-section">
        
        <br>
        <div class="row">
            <div class=col-sm-1></div>
            <div class=col-sm-10>
                <?php
                $id = null;
                $d_code = null;
                $d_name = null;
                $images = null;

                //insert

                if (isset($_POST['save'])) {
                    $d_code = $_POST['dcode'];
                    $d_name = $_POST['dname'];
                   
                    $sql = "INSERT INTO department(Department_Code,Department_Name) VALUES ('$d_code','$d_name')";
                        $sql_run = mysqli_query($con, $sql);

                        if ($sql_run) {
                           
                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Insert Success
                                <meta http-equiv="refresh" content = "2" />
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                        } else {
                            echo "error:" . mysqli_error($con);
                        }
                    }
                        
                

                //update


                if (isset($_POST['update'])) {
                    $d_code = $_POST['dcode'];
                    $d_name = $_POST['dname'];
                    $sql = "UPDATE department SET Department_Name = '$d_name' WHERE Department_Code= '$d_code'";
                    $sql_run = mysqli_query($con, $sql);

                    if ($sql_run) {

                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Update Success
                            <meta http-equiv="refresh" content = "2" />
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    } else {
                        echo "error:" . mysqli_error($con);
                    }
                }

                if (isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                    $sql = "SELECT * FROM department WHERE ID=$id";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) == 1) {
                        $r = mysqli_fetch_assoc($result);
                        $d_code = $r['Department_Code'];
                        $d_name = $r['Department_Name'];
                        
                    }
                }

                //delete
                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $sql = "Delete FROM department WHERE ID=$id";
                    if (mysqli_query($con, $sql)) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Delete Success
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            This department not delete !.
                            <meta http-equiv="refresh" content = "2" />
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="card-header">Departments</div><br>
                <div class="card" style="background-color: #E4E9F7;">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    Department Code <br><input type="text" name="dcode" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $d_code; ?>"  required> <br>
                                </div>
                                <div class="col-sm-6">
                                    Department Name <input type="text" name="dname" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $d_name; ?>" required> <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                   
                                </div>
                                <div class="col-sm-6">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="department.php"class="btn btn-dark" style="width: 100%">Clear</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php
                                            if (isset($_GET['edit'])) {
                                            ?>
                                                <input type="submit" class="btn btn-success" name="update" value="Update" style="width: 100%">

                                            <?php
                                            } else {
                                            ?>
                                                <input type="submit" class="btn btn-success" name="save" value="Save" style="width: 100%">
                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <br>


                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body" style="background-color: #bcc0cc;">
                        <div class="table-responsive">
                            <?php
                            $query = "SELECT * FROM department";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                            ?>
                                <table class="table">
                                    <thead class="thead">
                                        <tr id="header">
                                            <th scope="col">Department Code</th>
                                            <th scope="col">Department Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['Department_Code'] ?></td>
                                                <td><?php echo $row['Department_Name'] ?></td>

                                                <td>
                                                    <a href="?edit=<?php echo $row['ID'] ?>" class="btn btn-sm btn-outline-success">Edit</a>
                                                    <a href="?delete=<?php echo $row['ID'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo "No Record Found";
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="JS/script.js"></script>

</body>

</html>
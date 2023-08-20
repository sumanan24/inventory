<?php include_once('config.php'); ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Document </title>
    <link rel="stylesheet" href="css/style.css">
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
                if (isset($_POST['save'])) {
                    $admin = $_POST['a_id'];
                    $fname = $_POST['fname'];
                    $profile = $_FILES['profile_images']['name'];
                    $email = $_POST['email'];
                    $dname = $_POST['d_name'];
                    $gender = $_POST['gender'];
                    $ph = $_POST['ph_no'];
                    $username = $_POST['user'];
                    $password = md5($_POST['pass']);



                    $sql = "INSERT INTO admin (Admin_ID,Full_Name,Profile,E_mail,Department_Name,Gender,Ph_No,username,Password)
                        VALUES('$admin','$fname','$profile','$email','$dname','$gender',$ph,'$username','$password')";
                    $sql_run = mysqli_query($con, $sql);

                    if ($sql_run) {
                        move_uploaded_file($_FILES["profile_images"]["tmp_name"], "upload/" . $_FILES["profile_images"]["name"]);
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Insert Success
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    } else {
                        echo "error:" . mysqli_errno($con);
                    }
                }


                ?>

                <!-- <--delete-->
                <?php

                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $sql = "DELETE FROM admin WHERE ID=$id";
                    $sql_run = mysqli_query($con, $sql);
                    if ($sql_run) {
                ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Delete Success
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    } else {
                        echo "Not Deleted ";
                    }
                }
                ?>


                <?php
                if (isset($_POST['SaveChanges'])) {
                    $admin = $_POST['a_id'];
                    $fname = $_POST['fname'];
                    $email = $_POST['email'];
                    $dname = $_POST['d_name'];
                    $gender = $_POST['gender'];
                    $ph = $_POST['ph_no'];
                    $username = $_POST['user'];
                    $sql = "UPDATE `admin` SET `Full_Name`='$fname',`E_mail`='$email',`Department_Name`='$dname',`Gender`='$gender',`Ph_No`='$ph',
                        `username`='$username' WHERE Admin_ID='$admin'";
                    $sql_run = mysqli_query($con, $sql);

                    if ($sql_run) {

                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Updated Successfully
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    } else {
                        echo "error:" . mysqli_error($con);
                    }
                }

                ?>



                <div class="card-header">Admin
                    <a class="btn btn-dark" href="add_admin.php" role="button">+ADD</a>
                </div><br>
                <div class="card-body">

                    <div class="table-responsive">
                        <?php
                        $query = "SELECT * FROM admin";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                        ?>

                            <table class="table">
                                <thead class="thead">
                                    <tr id="header">
                                        <th scope="col">Admin ID</th>
                                        <th scope="col">Full Name</th>

                                        <th scope="col">E-mail</th>
                                        <th scope="col">D_Code</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($query_run)) {

                                    ?>
                                        <tr>
                                            <td><?php echo $row['Admin_ID']; ?></td>
                                            <td><?php echo $row['Full_Name']; ?></td>

                                            <td><?php echo $row['E_mail']; ?></td>
                                            <td><?php echo $row['Department_Name']; ?></td>
                                            <td><?php echo $row['Gender']; ?></td>
                                            <td>
                                                <form action="edit_admin.php" method="POST">
                                                    <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>">
                                                    <button type="submit" name="edit" class="btn btn-sm btn-outline-success editbtn">Edit</button>
                                                    <a href="?delete=<?php echo $row['ID'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                                                </form>
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


    </section>

    <script src="JS/script.js"></script>

</body>

</html>
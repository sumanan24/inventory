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
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">SLGTI</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="admin_dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="all_dept.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Inventory</span>
                </a>
                <span class="tooltip">Inventory</span>
            </li>
            <li>
                <a href="department.php">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Department</span>
                </a>
                <span class="tooltip">Department</span>
            </li>
            <li>
                <a href="admin_table.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Admin</span>
                </a>
                <span class="tooltip">Admin</span>
            </li>
            <li>
                <a href="staff_table.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Staff</span>
                </a>
                <span class="tooltip">Staff</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="profile.jpg" alt="profileImg">
                    <div class="name_job">
                        <div class="name">Inushika</div>
                        <div class="job">Web designer</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <?php include_once('navg.php'); ?>
        <br>

        <div class="row">
            <div class=col-sm-1></div>
            <div class=col-sm-10>

                <?php
                if (isset($_POST['save'])) {
                    $admin = $_POST['s_id'];
                    $fname = $_POST['fname'];
                    $profile = $_FILES['profile_images']['name'];
                    $email = $_POST['email'];
                    $dname = $_POST['d_name'];
                    $gender = $_POST['gender'];
                    $ph = $_POST['ph_no'];
                    $username = $_POST['user'];
                    $password = md5($_POST['pass']);


                        $sql = "INSERT INTO staff(Staff_ID,Full_Name,Profile,E_mail,D_Code,Gender,Ph_No,Username,Password)
                        VALUES('$admin','$fname','$profile','$email','$dname','$gender',$ph,'$username','$password')";
                        $sql_run = mysqli_query($con, $sql);

                        if ($sql_run) {
                            move_uploaded_file($_FILES["profile_images"]["tmp_name"], "upload/" . $_FILES["profile_images"]["name"]);
                            echo "Added Successfully";
                        } else {
                            echo "error:" . mysqli_error($con);
                        }
                    
                }
                ?>


                <?php
                if (isset($_POST['updatebtn'])) {
                    $admin = $_POST['s_id'];
                    $fname = $_POST['fname'];
                    $profile = $_FILES['profile_images']['name'];
                    $email = $_POST['email'];
                    $dname = $_POST['d_name'];
                    $gender = $_POST['gender'];
                    $ph = $_POST['ph_no'];
                    $username = $_POST['user'];
                    $password = md5($_POST['pass']);



                    $sql = "UPDATE `staff` SET `Full_Name`='$fname',`E_mail`='$email',`D_Code`='$dname',`Gender`='$gender',`Ph_No`='$ph',
                        `user`='$username',`Password`='$password' WHERE Staff_ID='$admin'";
                    $sql_run = mysqli_query($con, $sql);

                    if ($sql_run) {
                        move_uploaded_file($_FILES["profile_images"]["tmp_name"], "upload/" . $_FILES["profile_images"]["name"]);
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



                <div class="card-header">Staff
                    <a class="btn btn-dark" href="add_staff.php" role="button">+ADD</a>
                </div>
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <?php
                        $query = "SELECT * FROM staff";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                        ?>

                            <table class="table">
                                <thead class="thead">
                                    <tr id="header">
                                        <th scope="col">Staff ID</th>
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
                                            <td><?php echo $row['Staff_ID']; ?></td>
                                            <td><?php echo $row['Full_Name']; ?></td>

                                            <td><?php echo $row['E_mail']; ?></td>
                                            <td><?php echo $row['D_Code']; ?></td>
                                            <td><?php echo $row['Gender']; ?></td>
                                            <td>

                                            <form action="edit_staff.php" method="POST">
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
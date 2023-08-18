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

        <?php
        if (isset($_POST['edit'])) {
            $id = $_POST['edit_id'];
            $query = "SELECT * FROM staff WHERE ID='$id'";
            $query_run = mysqli_query($con, $query);

            foreach ($query_run as $row) {
        ?>


                <div class="container">
                    <div class="card-header">Staff</div>
                    <div class="card-body">
                        <form action="staff_table.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class=col-sm-6>
                                    <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>">
                                    Staff_ID <input type="text" name="s_id" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Staff_ID'] ?>" required><br>
                                    Full Name <input type="text" name="fname" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Full_Name'] ?>" required><br>
                                    Upload Profile <br>
                                    <input type="file" name="profile_images" class="form-control" id="profile_images" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Profile'] ?>"> <br>
                                    E-mail <input type="email" name="email" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['E_mail'] ?>" required><br>
                                    Gender <br>
                                    <div class="row">
                                        <div class="col-sm-6"><input type="radio" name="gender" value="Male" value="<?php echo $row['Gender'] ?>" checked>Male</div>
                                        <div class="col-sm-6"><input type="radio" name="gender" value="Female" value="<?php echo $row['Gender'] ?>">Female</div>
                                    </div><br> <br>

                                </div>
                                <div class="col-sm-6">
                                    Department Name <br>
                                    <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'inventory_db');
                                    $result = mysqli_query($con, "SELECT * FROM department");
                                    ?>
                                    <select name="d_name" id="d_name" width="100%" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                                        <option value="">---Select---</option>
                                        <?php
                                        while ($row1 = mysqli_fetch_assoc($result)) {
                                            if ($row['D_Code'] == $row1['Department_Code']) 
                                            {
                                        ?>
                                                <option selected value="<?php echo $row1['Department_Code']; ?>"><?php echo $row1['Department_Name']; ?></option>

                                            <?php
                                            }
                                            ?>
                                            <option value="<?php echo $row1['Department_Code']; ?>"><?php echo $row['Department_Name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select><br>
                                    Phone number <input type="text" name="ph_no" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Ph_No'] ?>" required><br>
                                    User name <input type="text" name="user" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Username'] ?>" required><br>
                                    Password <input type="password" name="pass" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Password'] ?>" required><br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-success" name="updatebtn" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                        </form>
                <?php
            }
        }
                ?>
                    </div>
                </div>

    </section>

    <script src="JS/script.js"></script>

</body>

</html>
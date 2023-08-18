<?php include_once('config.php'); ?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Document </title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="inventory_add.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name"> Add Inventory</span>
                </a>
                <span class="tooltip">Add Inventory</span>
            </li>
            <li>
                <a href="inventory_transfer.php">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Transfer Inventory</span>
                </a>
                <span class="tooltip">Transfer Inventory</span>
            </li>
            <li>
                <a href="inventory_dispose.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Disposed Inventory</span>
                </a>
                <span class="tooltip">Disposed Inventory</span>
            </li>
            <li>
                <a href="report.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Report</span>
                </a>
                <span class="tooltip">Report</span>
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



        <div class="container">

            



            <div class="card-header">Inventory</div>
            <br>

            <?php
            if (isset($_POST['edit'])) {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM inventory WHERE ID='$id'";
                $query_run = mysqli_query($con, $query);

                foreach ($query_run as $row) {
            ?>
                    <form action="inventory_add.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">

                            <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>">
                                Inventory_ID <input type="text" name="in_id" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Inventory_ID'] ?>" required><br>
                                Upload Image <br>
                                <input type="file" name="inventory_images" class="form-control" id="inventory_images" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Image'] ?>" required> <br>
                                Name <input type="text" name="in_name" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Name'] ?>" required><br>
                            </div>
                            <div class="col-sm-6">
                                Description <input type="text" name="desc" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Description'] ?>" required><br>
                                Quantity <input type="text" name="quantity" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Quantity'] ?>" required><br>
                                Date <input type="date" name="date" class="form-control" style="background-color: #E4E9F7; border:1px solid black;"  value="<?php echo $row['Date'] ?>" required> <br>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="reset" class="btn btn-info" value="Clear" style="width: 100%">
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- <input type="submit" class="btn btn-primary" name="updatebtn" value="Update" style="width: 100%"> -->
                                        <button type="submit" name="updatebtn" class="btn btn-primary" style="width: 100%">Update</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

            <?php
                }
            }
            ?>

        </div>

    </section>
    <script src="JS/script.js"></script>

</body>

</html>
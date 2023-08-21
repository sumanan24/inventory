<?php include_once('config.php'); ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Inventory Management </title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/card.css">
    <?php include_once('script.php'); ?>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <section class="home-section">
        <nav class="navbar navbar-dark " style="background-color: black;">
            <span class="navbar-text">
                <h6>SLGTI Inventory System</h6>
            </span>
        </nav>

        <br>

        <?php

        if (isset($_POST['delete'])) {
            $id = $_POST['delete_id'];
            $sql = "DELETE FROM admin WHERE ID=$id";
            $sql_run = mysqli_query($con, $sql);
            if ($sql_run) {
                $_SESSION['success'] = "Deleted Successfully";
                header("location:admin2.php");
            } else {
                $_SESSION['status'] = "Not Deleted ";
                header("location:admin2.php");
            }
        }
        ?>

        <br>
        <!--content -->
        <div class="container">
            <div class="card-header">Admin</div>
            <div class="card-body">
                <form action="admin_table.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class=col-sm-6>
                            Admin_ID <input type="text" name="a_id" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" style="background-color: #E4E9F7; border:1px solid black;" required><br>
                            Full Name <input type="text" name="fname" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required><br>
                            Upload Profile <br>
                            <input type="file" name="profile_images" class="form-control" id="profile_images" style="background-color: #E4E9F7; border:1px solid black;" required> <br>
                            E-mail <input type="email" name="email" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required><br>
                            Gender <br>
                            <div class="row">
                                <div class="col-sm-6"><input type="radio" name="gender" value="Male" checked>Male</div>
                                <div class="col-sm-6"><input type="radio" name="gender" value="Female">Female</div>
                            </div><br> <br>

                        </div>
                        <div class="col-sm-6">
                            Department Name <br>

                            <?php

                            $result = mysqli_query($con, "SELECT * FROM department");
                            ?>
                            <select name="d_name" id="d_name" width="100%" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                                <option value="">---Select---</option>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row['Department_Code']; ?>"><?php echo $row['Department_Name']; ?></option>
                                <?php
                                }
                                ?>
                            </select><br>
                            Phone number <input type="text" name="ph_no" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required><br>
                            User name <input type="text" name="user" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required><br>
                            Password <input type="text" name="pass" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" required><br>



                            <div class="row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                    <input type="reset" class="btn btn-dark" value="Clear">
                                    <input type="submit" class="btn btn-success" name="save" value="Save">
                                </div>
                            </div>


                        </div>
                    </div>

                </form>
            </div>
        </div>
        </div>
        </div>


    </section>

    <script src="JS/script.js"></script>

</body>

</html>
<?php include_once('config.php'); ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Department </title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <?php include_once('script.php'); ?>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <section class="home-section">

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

                                    $result = mysqli_query($con, "SELECT * FROM department");
                                    ?>
                                    <select name="d_name" id="d_name" width="100%" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                                        <option value="">---Select---</option>
                                        <?php
                                        while ($row1 = mysqli_fetch_assoc($result)) {
                                            if ($row['Department_Name'] == $row1['Department_Code']) {
                                        ?>
                                                <option selected value="<?php echo $row1['Department_Code']; ?>"><?php echo $row1['Department_Name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                            <option value="<?php echo $row1['Department_Code']; ?>"><?php echo $row1['Department_Name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select><br>
                                    Phone number <input type="text" name="ph_no" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Ph_No'] ?>" required><br>
                                    User name <input type="text" name="user" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Username'] ?>" required><br>
                                   
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
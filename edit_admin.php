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

        <?php
            if (isset($_POST['edit'])) {
               $id = $_POST['edit_id'];
                $query = "SELECT * FROM admin WHERE ID='$id'";
                $query_run = mysqli_query($con, $query);

                foreach ($query_run as $row) {
            ?>

        <div class="container">
            <div class="card-header">Admin</div>
            <div class="card-body">
                <form action="admin_table.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class=col-sm-6>
                        <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>">
                            Admin_ID <input type="text" name="a_id" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Admin_ID'] ?>" required><br>
                            Full Name <input type="text" name="fname" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Full_Name'] ?>" required><br>
                            
                            E-mail <input type="email" name="email" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['E_mail'] ?>" required><br>
                            Gender <br>
                            <div class="row">
                                <div class="col-sm-6"><input type="radio" name="gender" value="Male" checked value="<?php echo $row['Gender'] ?>">Male</div>
                                <div class="col-sm-6"><input type="radio" name="gender" value="Female" value="<?php echo $row['Gender'] ?>">Female</div>
                            </div><br> <br>

                        </div>
                        <div class="col-sm-6">
                            Department Name <br>

                            <?php
                            
                            $result = mysqli_query($con, "SELECT * FROM department");
                            ?>
                            <select name="d_name" id="d_name" width="100%" class="form-control" style="background-color: #E4E9F7; border:1px solid black;">
                                
                                <?php
                                while ($row1= mysqli_fetch_assoc($result)) {
                                    if($row['D_Code']==$row1['Department_Code'])
                                    {
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
                            
                            Phone number <input type="text" name="ph_no" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Ph_No']; ?>" required><br>
                            User name <input type="text" name="user" class="form-control" style="background-color: #E4E9F7; border:1px solid black;" value="<?php echo $row['Username'] ?>" required><br>
                            
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="updatebtn" value="SaveChanges">
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
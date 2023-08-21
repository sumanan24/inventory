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
        <br>

        <div class="container">
            <div class="card-header"> Inventory</div>
            <br>
            <div class="card" style="background-color: #bcc0cc;">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        $query = "SELECT * FROM inventory";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                        ?>

                            <table class="table">
                                <thead class="thead">
                                    <tr id="header">
                                        <th scope="col">Inventory_ID</th>
                                        <th scope="col">Images</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Date</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($query_run)) {

                                    ?>
                                        <tr>
                                            <td><?php echo $row['Inventory_ID']; ?></td>
                                            <td><?php echo '<img src="upload/' . $row['Image'] . '" width="100px;" height="100px;" alt="Image">' ?> </td>
                                            <td><?php echo $row['Name']; ?></td>

                                            <td><?php echo $row['Description']; ?></td>
                                            <td><?php echo $row['Quantity']; ?></td>
                                            <td><?php echo $row['Date']; ?></td>

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



    </section>

    <script src="JS/script.js"></script>

</body>

</html>
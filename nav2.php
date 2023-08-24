
<?php 
if (isset($_GET['logout'])) {
    unset($_SESSION['username']);  
    header('Location: index.php');         
}
?>
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
                <a href="staffdashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="inventory_add.php">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Inventory</span>
                </a>
                <span class="tooltip">Inventory</span>
            </li>
            
            
            <li class="profile">
                <div class="profile-details">
                <i class='bx bx-profile-light'></i>

                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION['user']; ?></div>
                        <a class="text-light" href="?logout"><i class='bx bx-log-out' id="log_out"></i></a>
                    </div>
                </div>
                
            </li>
        </ul>
    </div>
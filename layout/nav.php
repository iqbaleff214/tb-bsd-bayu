<div class="topnav">
    <div class="topnav-right">
        <?php if(isset($_SESSION['status'])):?>
        <?php if ($_SESSION['status']=='login'): ?>
            <div class="btn-group dropleft mr-5">
                <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['user'];?>
                </button>
                <a href="main.php" class="btn btn-dark ml-2">Main</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="leaderboard.php">LeaderBoard</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="../config/logout.php">Keluar</a>
                </div>
            </div>
        <?php endif;?>
        <?php endif;?>
    </div>
</div>
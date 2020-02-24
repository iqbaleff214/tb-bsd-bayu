<?php include_once '../layout/head.php'; ?>

<div class="back">
    <div class="mulai logMenu" style="">
        <form method="post">
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label col-form-label-sm">Username</label>
                <div class="col-sm-9">
                <input type="text" class="form-control col-form-label-sm" id="username" name="user" autocomplete="off" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label col-form-label-sm">Password</label>
                <div class="col-sm-9">
                <input type="password" class="form-control col-form-label-sm" id="password" name="pass">
                </div>
            </div>
<?php 

    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        include_once '../config/Database.php';

        $database = new Database();
        
        if ($database->cek_login($user, $pass)) {
            header('Location: '.URL_ROOT.'myLeaderboard.php');
        }
    }

?>
            <button type="submit" class="btn btn-dark btn-block" aria-describedby="mauDaftar" name="submit">Masuk</button>
            <small id="mauDaftar" class="form-text text-muted">
                Belum punya akun? Mau daftar? klik <a href="<?= URL_ROOT;?>daftar.php">daftar</a>
            </small>
            <p>atau</p>
            <a href="<?= URL_ROOT;?>main.php" class="btn btn-block btn-secondary">Langsung Main</a>
        </form>
    </div>
</div>

<?php include_once '../layout/foot.php'; ?>
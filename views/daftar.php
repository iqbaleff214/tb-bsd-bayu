<?php include_once '../layout/head.php'; ?>
<div class="back">
    <div class="mulai logMenu">
        <form method="post" aciton="">
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
            <div class="form-group row">
                <label for="passwordLagi" class="col-sm-3 col-form-label col-form-label-sm">Password Lagi</label>
                <div class="col-sm-9">
                <input type="password" class="form-control col-form-label-sm" id="passwordLagi" name="passlagi">
                </div>
            </div>
<?php 
    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pas2 = $_POST['passlagi'];
        include_once '../config/Database.php';
        $database = new Database();
        if ($database->cek_user($user)) {
            if($database->tambah_user($user, $pass, $pas2)) {
                header('Location:'.URL_ROOT.'mulai.php');
            }
        }
    }
?>
            <button type="submit" class="btn btn-dark btn-block" aria-describedby="mauDaftar" name="submit">Daftar</button>
            <small id="mauDaftar" class="form-text text-muted">
                Sudah punya akun? Gak jadi daftar? klik <a href="<?= URL_ROOT;?>mulai.php">main</a>
            </small>
        </form>
    </div>
</div>


<?php include_once '../layout/foot.php'; ?>
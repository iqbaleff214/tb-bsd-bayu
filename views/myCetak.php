<?php include_once '../layout/head.php'; ?>
<?php session_start();?>
<?php include_once '../config/Database.php';?>
<?php $order = (isset($_GET['order'])) ? $_GET['order'] : 'waktu';?>
<?php $database = new Database(); ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->

<div class="container mt-10">


<div class="col-lg-12 col-md-12 col-sm-12 mt-5">
    <h1>Data Leaderboard <?php echo $_SESSION['user'];?></h1>
</div>

    <div class="col-lg-12 col-md-12 col-sm-12 mt-5 mb-5" id="home" role="tabpanel" aria-labelledby="home-tab">
        <small>60 detik</small>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Waktu Pengerjaan</th>
                    <th scope="col">Soal Benar</th>
                    <th scope="col">Soal Terjawab</th>
                    <th scope="col">Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php foreach($database->tampil_data("WHERE kategori=60 AND id_user='".$_SESSION['id']."'", $order) as $data): ?>
                <tr>
                    <th scope="row"><?= $no++;?></th>
                    <td><?= $data['waktu'] ;?></td>
                    <td><?= $data['benar'] ;?></td>
                    <td><?= $data['terjawab'] ;?></td>
                    <td><?= number_format($data['skor'], 2) ;?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 mt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <small>120 detik</small>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Waktu Pengerjaan</th>
                    <th scope="col">Soal Benar</th>
                    <th scope="col">Soal Terjawab</th>
                    <th scope="col">Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php foreach($database->tampil_data("WHERE kategori=120 AND id_user='".$_SESSION['id']."'", $order) as $data): ?>
                <tr>
                    <th scope="row"><?= $no++;?></th>
                    <td><?= $data['waktu'] ;?></td>
                    <td><?= $data['benar'] ;?></td>
                    <td><?= $data['terjawab'] ;?></td>
                    <td><?= number_format($data['skor'], 2) ;?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
                

</div>
<script>
    $(document).ready(()=>{
        print();
    });
</script>

<?php include_once '../layout/foot.php'; ?>
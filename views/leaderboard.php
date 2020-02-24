<?php include_once '../layout/head.php'; ?>
<?php session_start();?>
<?php include_once '../layout/nav.php';?>

<?php $database = new Database(); ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<div class="container">

    <h1>LeaderBoard</h1>
    <div class="row">
        <div class="col-md-10">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">60 detik</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">120 detik</a>
            </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Waktu Pengerjaan</th>
                                <th scope="col">Username</th>
                                <th scope="col">Soal Benar</th>
                                <th scope="col">Soal Terjawab</th>
                                <th scope="col">Skor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            <?php foreach($database->tampil_data("WHERE kategori=60") as $data): ?>
                            <tr>
                                <th scope="row"><?= $no++;?></th>
                                <td><?= $data['waktu'] ;?></td>
                                <td><?= $data['username'] ;?></td>
                                <td><?= $data['benar'] ;?></td>
                                <td><?= $data['terjawab'] ;?></td>
                                <td><?= number_format($data['skor'], 2) ;?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Waktu Pengerjaan</th>
                                <th scope="col">Username</th>
                                <th scope="col">Soal Benar</th>
                                <th scope="col">Soal Terjawab</th>
                                <th scope="col">Skor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            <?php foreach($database->tampil_data("WHERE kategori=120") as $data): ?>
                            <tr>
                                <th scope="row"><?= $no++;?></th>
                                <td><?= $data['waktu'] ;?></td>
                                <td><?= $data['username'] ;?></td>
                                <td><?= $data['benar'] ;?></td>
                                <td><?= $data['terjawab'] ;?></td>
                                <td><?= number_format($data['skor'], 2) ;?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group col-lg-12">
                <label for="urut">Urut berdasarkan</label>
                <select class="form-control  hilang hilang-print hilang-cok" id="urut">
                    <option value="waktu">Waktu</option>
                    <option value="skor">Skor</option>
                </select>
            </div>
            <div class="col-lg-12">
                <a href="cetak.php" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark btn-block" id="cetak">Cetak</a>
            </div>
        </div>
    </div>

    
    <?php if(isset($_SESSION['status'])):?>
        <?php if($_SESSION['status']=='login'):?>
        <a href="myLeaderboard.php" class="btn btn-outline-dark btn-sm mt-3 ml-3 mb-3">Rekor saya</a>
        <?php endif;?>
    <?php else:?>
        <a href="index.php" class="btn btn-outline-dark btn-sm mt-3 ml-3 mb-3">Kembali</a>
        <a href="main.php" class="btn btn-dark btn-sm mt-3 ml-3 mb-3">Main</a>
    <?php endif;?>

</div>

<script>
$(document).ready(()=>{

    $('#urut').change(() => {
        var nilai = $('#urut').find('option:selected').val();
        $('#cetak').attr('href', 'cetak.php?order='+nilai);
        $.ajax({
            type: "POST",
            url: "leaderboardUrut.php",
            data: {order:nilai},
            success: function (response) {
                $('#myTabContent').html(response);
            }
        });
    });
});
</script>

<?php include_once '../layout/foot.php'; ?>
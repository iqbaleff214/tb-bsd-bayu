<?php include_once '../layout/head.php'; ?>
<?php session_start();?>
<?php include_once '../layout/nav.php';?>
<?php include_once '../config/Database.php';?>
<?php if($_SESSION['status']!='login'):?>
<?php header('Location: mulai.php');?>
<?php endif;?>
<?php $database = new Database(); ?>
<div class="container">

<h1>Rekor <?php echo $_SESSION['user'];?></h1>

<?php if($database->tampil_data("WHERE id_user='".$_SESSION['id']."'")): ?>
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
        <?php if($database->tampil_data("WHERE kategori=60 AND id_user='".$_SESSION['id']."'")): ?>
        <table class="table table-hover">
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
                  <?php foreach($database->tampil_data("WHERE kategori=60 AND id_user='".$_SESSION['id']."'") as $data): ?>
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
        <?php else: ?>
          Tidak ada data untuk kategori ini.
        <?php endif; ?>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <?php if($database->tampil_data("WHERE kategori=120 AND id_user='".$_SESSION['id']."'")): ?>
        <table class="table table-hover">
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
                  <?php foreach($database->tampil_data("WHERE kategori=120 AND id_user='".$_SESSION['id']."'") as $data): ?>
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
        <?php else: ?>
          Tidak ada data untuk kategori ini.
        <?php endif; ?>
      </div>
    </div>
  
  </div>
  <div class="col-md-2">
    <div class="form-group col-lg-12">
        <label for="urut">Urut berdasarkan</label>
        <select class="form-control" id="urut">
            <option value="waktu">Waktu</option>
            <option value="skor">Skor</option>
        </select>
    </div>
    <div class="col-lg-12">
        <a href="myCetak.php" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark btn-block" id="cetak">Cetak</a>
    </div>
  </div>
</div>

<?php else: ?>
  <p>Anda belum punya catatan rekor. Klik <a href="main.php">main</a> untuk memulai menambahkan rekor anda.</p>
<?php endif; ?>
    
      <a href="leaderboard.php" class="btn btn-outline-dark btn-sm mt-3 ml-3 mb-3">Leaderboard</a>


</div>

<script>
$(document).ready(()=>{

    $('#urut').change(() => {
        var nilai = $('#urut').find('option:selected').val();
        $('#cetak').attr('href', 'myCetak.php?order='+nilai);
        $.ajax({
            type: "POST",
            url: "myLeaderboardUrut.php",
            data: {order:nilai},
            success: function (response) {
                $('#myTabContent').html(response);
            }
        });
    });
});
</script>

<?php include_once '../layout/foot.php'; ?>
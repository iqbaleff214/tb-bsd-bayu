
<?php include_once '../config/Database.php';?>

<?php $database = new Database(); ?>
<?php session_start();?>
<?php $order = $_POST['order'];?>

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
        <?php else: ?>
          Tidak ada data untuk kategori ini.
        <?php endif; ?>
      </div>
</div>

<?php include_once '../config/Database.php';?>

<?php $database = new Database(); ?>
<?php $order = $_POST['order'];?>

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
            <?php foreach($database->tampil_data("WHERE kategori=60", $order) as $data): ?>
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
            <?php foreach($database->tampil_data("WHERE kategori=120", $order) as $data): ?>
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
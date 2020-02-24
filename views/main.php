<?php include_once '../layout/head.php'; ?>
<?php session_start();?>

<?php 

if (isset($_POST['simpan'])) {

    include_once '../config/Database.php';

    $benar = $_POST['benar'];
    $jawab = $_POST['jawab'];
    $skor  = ($benar/$jawab)*100;
    if (isset($_SESSION['status'])) {
        if($_SESSION['status']=='login') {
            $user = $_SESSION['user'];
            $id = $_SESSION['id'];
        }
    } else {
        $user = $_POST['user'];
        $id = 0;
    }
    $id_kat = $_POST['id_kat'];

    $database = new Database();


    if ($database->tambah_lb($id, $user, $jawab, $benar, $id_kat)) {
        header('Location: '.URL_ROOT.'leaderboard.php');
    }
    
}

?>

<?php include_once '../layout/nav.php';?>


<div class="container" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header" id="time">
            <span id="result">Soal ke-1</span>
            <span id="timer" style="float: right"></span>
        </div>
        <div class="card-body">
            <div class="container">
                <form>
                    <div class="form-group row">
                        <!-- <div class="col">
                            <input type="number" id="a" class="form-control form-control-lg" style="text-align: right" disabled>
                        </div>
                        <div class="col">
                            <input type="number" id="b" class="form-control form-control-lg" disabled>
                        </div> -->
                        <div class="input-group col">
                            <input type="number" class="form-control form-control-lg" id="a" aria-describedby="basic-addon1" disabled>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="font-size: 18px; background-color: white;">+</span>
                            </div>
                            <input type="number" class="form-control form-control-lg" id="b" aria-describedby="basic-addon1" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <input type="text" id="yourAnswer" class="form-control form-control-lg">   
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- petunjuk game -->
<div class="modal-mod card" id="pilihMenu">
    <div class="card-header">
        Petunjuk
    </div>
    <div class="card-body">
        <p class="card-text">Jumlahkan kedua angka yang ditampilkan, ketikkan hasilnya pada tempat yang disediakan. HANYA SATU DIGIT ANGKA YANG DIPERBOLEHKAN UNTUK DIINPUT. Jika hasil dari penjumlahan menghasilkan dua digit (puluhan), maka cukup ambil digit terakhir (satuan).</p>
        <?php include_once '../config/Database.php';?>
        <?php $db = new Database();?>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Durasi (detik)</legend>
                <div class="col-sm-10">
                    <?php foreach($db->ambil_kategori() as $data):?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="<?php echo $data['id_kategori']; ?>" value="<?php echo $data['kategori']; ?>" <?php if ($data['id_kategori']==1) echo 'checked'; ?>>
                        <label class="form-check-label" for="<?php echo $data['id_kategori']; ?>">
                            <?php echo $data['kategori']; ?>
                        </label>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </fieldset>
        <button class="btn btn-dark" id="pilihMenuBtn">Saya Mengerti</button>
        <a href="leaderboard.php" class="btn btn-outline-secondary">Leaderboard</a>
    </div>
</div>


<!-- akhir game -->
<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Selamat<?php if(isset($_SESSION['status'])) echo ', '.$_SESSION['user']; ?></h5>
      </div>
      <div class="modal-body">
          <div class="center" style="text-align: center">
                <span id="dari" class="col-lg-12 col-sm-12 col-md-12 center"></span>
                <span id="nilai" class="col-lg-12 col-sm-12 col-md-12 center">0</span>
          </div>
        <?php if (!isset($_SESSION['status'])): ?>
            <form method="post">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Nama anda</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-lg" name="user" id="inputPassword">
                    </div>
                </div>
                <input type="hidden" name="jawab" class="jawab">
                <input type="hidden" name="benar" class="benar">
                <input type="hidden" name="id_kat" class="id_kat">
        <?php endif;?>
      </div>
      <div class="modal-footer">
        <?php if (isset($_SESSION['status'])): ?>
            <?php if ($_SESSION['status']=='login'): ?>
            <form method="post">
                <input type="hidden" name="jawab" class="jawab">
                <input type="hidden" name="benar" class="benar">
                <input type="hidden" name="id_kat" class="id_kat">
                <button type="submit" name="simpan" class="btn btn-dark">Lanjutkan</button>
            </form>
            <?php endif;?>
        <?php else:?>
                <button type="submit" name="simpan" class="btn btn-dark">Lanjutkan</button>
            </form>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(() => {

    $('#pilihMenuBtn').click(()=>{
        var terjawab = 0;
        var jawabBenar = 0;
        var quizOver = false;
        var time = $('input[name=kategori]:checked').val();
        var id_kat = (time == 60) ? 1 : 2;
        
        
        $('#pilihMenu').remove();

        timedCount();
        
        const inputA = $('#a');
        const inputB = $('#b');
        const inputC = $('#yourAnswer');
        
        $('#yourAnswer').focus();

        inputA.val(parseInt(Math.random()*10));
        inputB.val(parseInt(Math.random()*10));
        
        inputC.keyup(()=>{
            let nA = parseInt(inputA.val());
            let nB = parseInt(inputB.val());
            let nU = inputC.val();
            let nAB = (nA+nB).toString();
            let nH = parseInt(nAB.charAt(nAB.length-1));                
            terjawab++;
            if(nU == nH) {
                jawabBenar++;
                console.log('benar');                    
            } else {
                console.log('salah');
            }
            inputC.val(null);
            $('#result').text("Soal ke-"+(terjawab+1));
            generateNumber();                
        });
        function generateNumber() {
            inputA.val(parseInt(Math.random()*10));
            inputB.val(parseInt(Math.random()*10));
        }
        
        function timedCount() {
            let jam = parseInt(time/3600) % 24;
            let mnt = parseInt(time/60) % 60;
            let dtk = time % 60;
            let waktu = (jam < 10 ? '0'+jam : jam)+':'+(mnt < 10 ? '0'+mnt : mnt)+':'+(dtk < 10 ? '0'+dtk : dtk);
            $('#timer').html(waktu);
            if(time==0) {
                $('#myModal').modal('show')
                $('.jawab').val(terjawab);
                $('.benar').val(jawabBenar);
                $('.id_kat').val(id_kat);
                let nilai = () => {
                    if ((terjawab==0) && (jawabBenar==0))
                        return parseFloat(0).toFixed(2);
                    else
                        return parseFloat((jawabBenar/terjawab)*100).toFixed(2);
                };
                $('#dari').text("Kamu menjawab "+jawabBenar+" dari "+terjawab+" pertanyaan dengan benar.");
                $('#nilai').text(nilai);
                $('')
            } else {
                time--;
            }
            timeOut = setTimeout(() => {
                timedCount();
            }, 1000);
        }
    });

});

</script>
        
<!-- <script src="../assets/js/main.js"></script> -->
<?php include_once '../layout/foot.php'; ?>

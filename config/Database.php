<?php

    include_once 'const.php';

    class Database {
        var $koneksi = "";

        function __construct() {
            $this->koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE);
            if (mysqli_connect_errno()) {
                echo 'Gagal konek ke database: '.mysqli_connect_error();
            }
        }
        // ambil kategori
        function ambil_kategori() {
            $query = "SELECT * FROM kategori";
            $data = mysqli_query($this->koneksi, $query);
            while ($baris = mysqli_fetch_array($data)) {
                $hasil[] = $baris;
            }
            return $hasil;
        }

        // tampil data leaderboard
        function tampil_data($where="", $order="waktu") {
            $query = "SELECT * FROM lb ";
            $query .= $where;
            $query .= " ORDER BY $order DESC LIMIT ".DB_LIMIT;
            $data = mysqli_query($this->koneksi, $query);
            if (mysqli_num_rows($data) > 0) {
                while ($baris = mysqli_fetch_array($data)) {
                    $hasil[] = $baris;
                }
                return $hasil;
            } else {
                return 0;
            }
        }

        // untuk halaman register
        function cek_user($user) {
            $query = "SELECT * FROM user WHERE username='$user'";
            $data = mysqli_query($this->koneksi, $query);
            if (mysqli_num_rows($data) < 1 ) {
                return true;
            } else {
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username</strong> udah ada!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                return false;
            }
        }
        function cek_pass($pass1, $pass2) {
            if ($pass1 == $pass2) {
                return true;
            } else {
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Password</strong> tak sama!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                return false;
            }            
        }
        
        function tambah_user($user, $pass, $pass2) {
            if($this->cek_pass($pass, $pass2)) {
                $pas = md5($pass);
                $query = "INSERT INTO user (username, pass) VALUES ('$user', '$pas')";
                if (mysqli_query($this->koneksi, $query)) {
                    return true;
                } else {
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal</strong> daftar!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';  
                    return false;
                }                
            }
        }

        // untuk halaman login
        function cek_login($user, $pass) {
            $pass = md5($pass);
            $query = "SELECT * FROM user WHERE username='$user' AND pass='$pass'";
            $data = mysqli_query($this->koneksi, $query);
            $hasil[] = "tes";
            if (mysqli_num_rows($data) == 1) {
                session_start();
                $_SESSION['status'] = 'login';
                $hasil = mysqli_fetch_assoc($data);
                $_SESSION['id'] = $hasil['id_user'];
                $_SESSION['user'] = $hasil['username'];
                return true;
            } else {
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> masuk!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';  
                return false;
            }
        }

        //leaderboard
        function tambah_lb($id_user=0, $user, $jawab, $benar, $id_kat) {
            $query = "INSERT INTO leaderboard (id_user, username, terjawab, benar, id_kategori) VALUES ($id_user, '$user', $jawab, $benar, $id_kat)";
            if ($sql = mysqli_query($this->koneksi, $query)) {
                return true;
            } else {
                var_dump($sql);
                die();
                return false;
            }
            
        }



    }
    

?>
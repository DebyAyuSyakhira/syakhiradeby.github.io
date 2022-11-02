<?php 
include 'koneksi.php';

if (isset($_POST["tambah"])) {
    $nama = htmlspecialchars($_POST["id"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $tglmasuk = htmlspecialchars($_POST["tglmasuk"]);
    $expired = htmlspecialchars($_POST["expired"]);
    $berat = htmlspecialchars($_POST["berat"]);
    $jenis = htmlspecialchars($_POST["jenis"]);
    $nama_foto = $_FILES['pas_foto']['name'];
    $size_foto = $_FILES['pas_foto']['size'];

    if ($size_foto > 2097152) 
    {
        header("location:inputdata.php?pesan=size");
    }
    else
    {
        if ($nama_foto != "") {
            $ekstensi_izin = array('png','jpg','jepg');
            $y = explode('.', $nama_foto); 
            $ekstensi = strtolower(end($y));
            $tmp = $_FILES['pas_foto']['tmp_name'];  
            date_default_timezone_set('asia/kuala_lumpur'); 
            $tanggal = date('Y-m-d h:i:s');
            $nama_foto_baru = $tanggal.'-'.$nama_foto; 
            if(in_array($ekstensi, $ekstensi_izin) === true) 
            {
                move_uploaded_file($tmp,'img/'.$nama_foto);
                $result = mysqli_query($conn, "INSERT INTO barang VALUES ('', '$nama', '$tglmasuk', '$expired',  '$berat',  '$jenis', '$nama_foto_baru')");
                if($result)
                {
                    header("location:inputdata.php?pesan=berhasil");
                } 
                else 
                {
                    header("location:inputdata.php?pesan=gagal");
                }
            } 
            else 
            { 
                header("location:inputdata.php?pesan=ekstensi");        
            }
        }
        else
        {
            $result = mysqli_query($conn, "INSERT INTO barang VALUES ('', '$nama', '$tglmasuk', '$expired',  '$berat',  '$jenis')");
                if($result){
                    header("location:inputdata.php?pesan=berhasil");
                } else {
                    header("location:inputdata.php?pesan=gagal");
                }
         }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO BUAH DHARMASRAYA</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>   
</head>
<body>
<nav class="header">
        <ul>
            <div class="header-text">
                <a href="#">Toko Buah Dharmasraya</a></li>
            </div>
            <li><a href="halaman_admin.php">Home</a></li>
            <li><a href="inputdata.php">Input Data</a></li>
            <li><a href="lihatdata.php">Data Barang</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li>
                <a href="#" class="tampilan">
                <button class="tombol-terang" onclick="ubahwarna()">Lightmode</button>
                <button class="tombol-gelap" onclick="ubahwarna()">Darkmode</button></a>
            </li>
            <script src="javascript.js"></script>
        </ul>
    </nav>
    <hr>
    <?php if (isset($_GET['pesan'])) { ?>
        <?php if ($_GET['pesan'] == "berhasil") { 
            echo"
            <script>
                alert(' Berhasil Menambahkan Data Barang');
                document.location.href = 'lihatdata.php';
            </script>
            ";
        ?>
            </div>
        <?php }elseif ($_GET['pesan'] == "gagal") { 
            echo"
            <script>
                alert(' Gagal Menambahkan Data Barang');
            </script>
            ";
        ?>
        <?php }elseif ($_GET['pesan'] == "ekstensi") { 
             echo"
             <script>
                 alert('Ekstensi File Harus PNG Dan JPG');
             </script>
             ";
        ?>
        <?php }elseif ($_GET['pesan'] == "size") { 
            echo"
            <script>
                alert('Size File Tidak Boleh Lebih Dari 2 MB');
            </script>
            ";
        ?>
        <?php } ?>
    <?php } ?>
    <br>
    <div class ="databarang">
        <center><h1>Input Data Buah</h1><center><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="kol">
                <label for="id">ID : </label>
                <input type="number" name="id" required><br><br>
            </div>
            <div class="kol">
                <label for="nama">Nama Buah : </label>
                <input type="text" name="nama" required><br><br>
            </div>
            <div class="kol">
                <label for="tglmasuk">Tanggal Masuk : </label>
                <input type="date" name="tglmasuk" required><br><br>
            </div>
            <div class="kol">
                <label for="expired">Tanggal Kedaluwarsa : </label>
                <input type="date" name="expired" required><br><br>
            </div>
            <div class="kol">
                <label for="berat">Berat : </label>
                <input type="number" name="berat" required><br><br>
            </div>
            <div class="kol">
                <label for="jenis">Jenis : </label>
                <input type="radio" name="jenis" value="lokal"> Lokal
                <input type="radio" name="jenis" value="import"> Import<br><br>
            </div>
            <div class="kol">
                <label for="pas_foto"> Upload Gambar : </label>
                <input type ="file" name="pas_foto"><br>
            </div>
            <div class="kol">
                <button type="submit" name="tambah">Tambah</button>
            </div>
        </form>
    </div>
    <footer>
        <p>Terimakasih Telah Mengunjungi Toko Kami</p>
        <p>Jangan lupa untuk Berbelanja lagi di Toko Dharmasraya
        <br>Contact US</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        <img alt="kaki-logo" class="kaki-logo" src="img/logo.png"> 
    </footer>
</body>
</html>
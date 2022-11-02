<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") 
    {
		
		$id = $_GET['id'];

		$result = mysqli_query($conn, "SELECT * FROM barang WHERE id=$id");
        $barang = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $barang[] = $row;
        }
        $brg = $barang[0];
	}
    else
    {
		header("location:lihatdata.php");
	}
}else{
	header("location:lihatdata.php");
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
    <div class ="databarang">
        <center><h1>Update Data Buah</h1><center><br>
        <form action="editact.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="kol">
                <label for="nama">Nama Buah : </label>
                <input type="text" name="nama" value="<?php echo $brg["nama"]; ?>" ><br><br>
            </div>
            <div class="kol">
                <label for="tglmasuk">Tanggal Masuk : </label>
                <input type="date" name="tglmasuk" value="<?php echo $brg["tglmasuk"]; ?>"><br><br>
            </div>
            <div class="kol">
                <label for="expired">Tanggal Kedaluwarsa : </label>
                <input type="date" name="expired" value="<?php echo $brg["expired"]; ?>"><br><br>
            </div>
            <div class="kol">
                <label for="berat">Berat : </label>
                <input type="number" name="berat" value="<?php echo $brg["berat"]; ?>"> /KG<br><br>
            </div>
            <div class="kol">
                <label for="jenis">Jenis : </label>
                <input type="radio" name="jenis" value="lokal" <?php if($brg['jenis']=='lokal') echo 'checked'?>>Lokal
                <input type="radio" name="jenis" value="import" <?php if($brg['jenis']=='import') echo 'checked'?>>Import<br><br>
            </div>
            <div class="kol">
                <label for="pas_foto"> Upload Gambar : </label>
                <input type ="file" name="pas_foto"><br>
                <br>
                <?php 
                if ($brg['gambar'] == "") { ?>
                    <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+BARANG" style="width:80px;height:80px;">
                <?php }else{ ?>
                    <img src="img/<?php echo $brg['gambar']; ?>" style="width:80px;height:80px;">
                <?php } ?>
            </div>
            <div class="kol">
                <button type="submit" name="tambah">Simpan</button>
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
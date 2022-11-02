

<?php
require'koneksi.php';

if(isset($_POST['cari']))
{
    $cari = trim($_POST['cari']);
    $result = mysqli_query($conn, "SELECT * FROM barang WHERE nama LIKE '%$cari%' ORDER BY id ASC");
}
else{
    $result = mysqli_query($conn, "SELECT * FROM barang ORDER BY id ASC");
}
$barang = [];

while ($row = mysqli_fetch_array($result)) {
    $barang[] = $row;
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
                  alert(' Berhasil Mengubah Data Barang');
                  document.location.href = 'lihatdata.php';
              </script>
              ";
        ?>
            
        <?php }elseif ($_GET['pesan'] == "gagal") { 
             echo"
             <script>
                 alert('Gagal Mengubah Data Barang');
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
        <?php }elseif ($_GET['pesan'] == "hapus") { 
            echo"
            <script>
                alert('Berhasil Menghapus Data Barang');
            </script>
            ";
        ?>
        <?php }elseif ($_GET['pesan'] == "gagalhapus") { 
            echo"
            <script>
                alert('Gagal Menghapus Data Barang');
            </script>
            ";
        ?>
        <?php } ?>
    <?php } ?>
    <br>
    <div class ="databarang">
        <div class = box>
            <center><h1>Data Barang</h1><center><br>
                <a href="inputdata.php"><button name="submit" class="add">Tambah Data</button></a>
                <form action="" method="post">
                    <div class="search">
                        <?php
                        $cari="";
                        if (isset($_POST['cari'])) {
                            $cari=$_POST['cari'];
                        }
                        ?>
                        <input type="text" name="cari" placeholder="Pencarian"> 
                    </div>
                    <div class="search">
                        <button type="submit" class = "tmbl" name = "cari" value="cari">Search</button> 
                    </div>
                </form>
                <table border ='2'>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID</th>
                            <th>Nama Buah</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Kedaluwarsa</th>
                            <th>Berat</th>
                            <th>Jenis</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($barang AS $brg):?>
                        <tr>
                            <td><?php echo $i ;?></td>
                            <td><?php echo $brg["id"] ;?></td>
                            <td><?php echo $brg["nama"] ;?></td>
                            <td><?php echo $brg["tglmasuk"] ;?></td>
                            <td><?php echo $brg["expired"] ;?></td>
                            <td><?php echo $brg["berat"] ;?></td>
                            <td><?php echo $brg["jenis"] ;?></td>
                            <td>
                                <?php 
                                if ($brg['gambar'] == "") { ?>
                                    <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+BARANG" style="width:80px;height:80px;">
                                <?php }else{ ?>
                                    <img src="img/ <?php echo $brg['gambar']; ?>" style="width:80px;height:80px;">
                                <?php } ?>
                            </td>
                            <td>
                                <a href="editdata.php?id=<?php echo $brg["id"]; ?>"><button type="submit" class = "opsi" name = "edit" value="edit">Ubah</button></a> 
                                <a href="delete.php?id=<?php echo $brg["id"]; ?>" onclick = "return confirm('And yakin ingin mengahpus data ini ?')"><button type="submit" class = "opsi" name = "hapus" value="hapus">Hapus</button> </a>
                            </td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
        </div>
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
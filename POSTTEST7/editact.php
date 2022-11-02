<?php 
include 'koneksi.php';
if (isset($_POST['id'])) 
{

    if ($_POST['id'] != "") 
    {
        $id = htmlspecialchars($_POST["id"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $tglmasuk = htmlspecialchars($_POST["tglmasuk"]);
        $expired = htmlspecialchars($_POST["expired"]);
        $berat = htmlspecialchars($_POST["berat"]);
        $jenis = htmlspecialchars($_POST["jenis"]);
        $nama_foto = $_FILES['pas_foto']['name'];
        $size_foto = $_FILES['pas_foto']['size'];

        if ( $size_foto > 2097152) 
        {
        header("location:editdata.php?pesan=size");

        }
        else
        {
            if ($nama_foto != "") 
            {
                $ekstensi_izin = array('png','jpg','jepg');
                $y = explode('.', $nama_foto); 
                $ekstensi = strtolower(end($y));
                $tmp = $_FILES['pas_foto']['tmp_name'];  
                date_default_timezone_set('asia/kuala_lumpur');  
                $tanggal = date('Y-m-d h:i:s');
                $nama_foto_baru  = $tanggal.'-'.$nama_foto; 
                if(in_array($ekstensi, $ekstensi_izin) === true)  
                {
                    $getfoto = "SELECT gambar FROM barang WHERE id='$id'";
                    $datafoto = mysqli_query($conn, $getfoto); 
                    $foto_lama = mysqli_fetch_array($datafoto);
                    unlink("img/ ". $foto_lama['gambar']);    
                    move_uploaded_file($tmp, 'img/ ' .$nama_foto_baru);
                    $result = mysqli_query($conn, "UPDATE barang SET nama='$nama', tglmasuk='$tglmasuk', expired='$expired', berat='$berat', jenis='$jenis', gambar =' $nama_foto_baru' WHERE id='$id'");
                    if($result)
                    {
                        header("location:editdata.php?pesan=berhasil");
                    } else {
                        header("location:editdata.php?pesan=gagal");
                    }

                } 
                else 
                { 
                    header("location:editdata.php?pesan=ekstensi");        
                }

            }
            else
            {
                $result = mysqli_query($conn, "UPDATE barang SET nama='$nama', tglmasuk='$tglmasuk', expired='$expired', berat='$berat', jenis='$jenis'  WHERE id='$id'");
                if($result)
                {
                    header("location:editdata.php?pesan=berhasil");
                }else {
                    header("location:editdata.php?pesan=gagal");
                }
             }

        }
    }
}
else{
    header("location:editdata.php");
}
?>
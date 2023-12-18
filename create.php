<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran TARUNA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["Nama"]);
        $sekolah=input($_POST["Asal Sekolah"]);
        $hobby=input($_POST["Hobby"]);
        $no_hp=input($_POST["No_hp"]);
        $alamat=input($_POST["Alamat"]);
        $prestasi=input($_POST["Prestasi"]);

        $sql="insert into taruna (nama,sekolah,hobby,no_hp,alamat,prestasi) values
		('$nama','$sekolah','$hobby','$no_hp','$alamat','$prestasi')";

        $hasil=mysqli_query($kon,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
        </div>
        <div class="form-group">
            <label>Sekolah:</label>
            <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Sekolah" required/>
        </div>
       <div class="form-group">
            <label>Hobby :</label>
            <input type="text" name="hobby" class="form-control" placeholder="Masukan Hobby" required/>
        </div>
                </p>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>       
        <div class="form-group">
            <label>Prestasi:</label>
            <input type="text" name="prestasi" class="form-control" placeholder="Masukan Prestasi" required/>
        </div> 

        <button type="submit" name="submit" class="btn btn-primary">Serahkan</button>
    </form>
</div>
</body>
</html>
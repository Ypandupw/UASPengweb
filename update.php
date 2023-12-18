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
    if (isset($_GET['id_taruna'])) {
        $id_taruna=input($_GET["id_taruna"]);

        $sql="select * from taruna where id_taruna=$id_taruna";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_taruna=htmlspecialchars($_POST["id_taruna"]);
        $nama=input($_POST["nama"]);
        $sekolah=input($_POST["sekolah"]);
        $hobby=input($_POST["hobby"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);
        $prestasi=input($_POST["prestasi"]);

        $sql="update taruna set
			nama='$nama',
			sekolah='$sekolah',
			hobby='$hobby',
			no_hp='$no_hp',
			alamat='$alamat',
            prestasi='$prestasi'
			where id_taruna=$id_taruna";
            
        $hasil=mysqli_query($kon,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Asal Sekolah:</label>
            <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Sekolah" required/>
        </div>
        <div class="form-group">
            <label>Hobby :</label>
            <input type="text" name="hobby" class="form-control" placeholder="Masukan Hobby" required/>
        </div>
        <div class="form-group">
            <label>No WA:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
            <label>Alamat Tinggal:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>
        <div class="form-group">
            <label>Prestasi:</label>
            <textarea name="prestasi" class="form-control" placeholder="Masukan Prestasi" required></textarea>
        </div>

        <input type="hidden" name="id_taruna" value="<?php echo $data['id_taruna']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
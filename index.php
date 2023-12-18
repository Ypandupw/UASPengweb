<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<title>
    Yusup Pandu Putra Wibowo</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">UAS PENGWEB PANDU</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR CALON TARUNA</center></h4>
<?php

    include "koneksi.php";

    if (isset($_GET['id_taruna'])) {
        $id_taruna=htmlspecialchars($_GET["id_taruna"]);

        $sql="delete from taruna where id_taruna='$id_taruna' ";
        $hasil=mysqli_query($kon,$sql);

            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Hobby</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th>Prestasi</th>
            <th colspan='2'>Pilihan</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from taruna order by id_taruna desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["sekolah"];   ?></td>
                <td><?php echo $data["hobby"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["prestasi"];   ?></td>
                <td>
                    <a href="update.php?id_taruna=<?php echo htmlspecialchars($data['id_taruna']); ?>" class="btn btn-warning" role="button">Ubah</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_taruna=<?php echo $data['id_taruna']; ?>" class="btn btn-danger" role="button">Hapus</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Isi DATA</a>
</div>
</body>
</html>

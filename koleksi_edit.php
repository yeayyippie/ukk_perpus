<?php
    include "koneksi.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT * FROM koleksipribadi WHERE KoleksiID = '$id'");
        $data = mysqli_fetch_array($query);
    } else {
        header('location:koleksipribadi.php');
    }

    if(isset($_POST['submit'])){
        $BukuID = $_POST['BukuID'];

        $query = mysqli_query($koneksi, "UPDATE koleksipribadi SET BukuID='$BukuID' WHERE KoleksiID = '$id'");

        if($query) {
            echo '<script>alert("ubah data berhasil");</script>';
            echo '<script>location.href = "index.php?page=koleksipribadi";</script>';
        }else{
            echo '<script>alert("Data gagal diubah.");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Koleksi Pribadi</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Perpustakaan Online</a>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Edit Koleksi Pribadi</h1>
                    <div class="card">
                        <div class="card-body">
                            <form method="post">
                                <div class="row mb-3">
                                    <div class="col-md-2">Buku</div>
                                    <div class="col-md-8">
                                        <select name="BukuID" class="form-control">
                                            <?php
                                                $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                                while($buku = mysqli_fetch_array($buk)) {
                                                    $selected = ($buku['id_buku'] == $data['BukuID']) ? 'selected' : '';
                                            ?>
                                            <option value="<?php echo $buku['id_buku']; ?>" <?php echo $selected; ?>><?php echo $buku['judul']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan Perubahan</button>
                                <a href="index.php?page=koleksipribadi" class="btn btn-danger">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>

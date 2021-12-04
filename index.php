<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <!-- Register -->
        <h1>Register</h1>
        <form action="" method="POST">
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input class="form-control" type="text" name="username"><br>
            </div>
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input class="form-control" type="password" name="password"><br>
            </div>
            <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
        </form>

        <!-- Isi data -->
        <table class="table table-hover mt-5">
            <tr>
                <td>No</td>
                <td>Username</td>
                <td>Password</td>
                <td>Created at</td>
                <td>Action</td>
            </tr>
            <?php
                include 'koneksi.php';
                $no = 1;
                $sql = mysqli_query($koneksi,"SELECT * FROM users");
                while($d = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['username']; ?></td>
                <td><?= $d['password']; ?></td>
                <td><?= $d['created_at']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-info">EDIT</a>
                    <a href="hapus.php?id=<?= $d['id']; ?>" class="btn btn-danger">HAPUS</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $created_at = date('Y-m-d H:i:s');
    mysqli_query($koneksi,"INSERT INTO users VALUES(null,'$username','$password','$created_at')");
    header('location:index.php');
}
?>
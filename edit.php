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
        <?php
            include 'koneksi.php';
            $no = 1;
            $id = $_GET['id'];
            $sql = mysqli_query($koneksi,"SELECT * FROM users WHERE id='$id'");
            while($d = mysqli_fetch_array($sql)){
        ?>
        <h1>EDIT DATA <?= $d['username'] ?></h1>
        <form action="" method="POST">
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input class="form-control" type="text" value="<?= $d['username']; ?>" name="username"><br>
            </div>
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input class="form-control" type="password" name="password"><br>
            </div>
            <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
        </form>
        <?php
        }
        ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    mysqli_query($koneksi,"UPDATE users SET username='$username', password ='$password' WHERE id='$id'");
    header('location:index.php');
}
?>

<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}

$id = $_GET['id_obat'];
$query = mysqli_query($conn, "DELETE FROM tb_obat WHERE id_obat='$id'");
// $query = false;

if ($query) {
    $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
    <div class="alert-title">Info</div>
    Data obat berhasil dihapus.
    </div>
</div>';
    header("location:" . base_url('obat/data.php') . "");
    exit();
} else {
    $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
    <div class="alert-title">Perhatian</div>
    Data obat gagal dihapus.
    </div>
</div>';
    header("location:" . base_url('obat/data.php') . "");
    exit();
}

<?php
include("koneksi.php");

if (isset($_POST["edit"])) {
    // Data baru dari form
    $kodeMK_baru = $_POST["kodeMK"];
    $namaMK = $_POST["namaMK"];
    $sks = $_POST["sks"];
    $jam = $_POST["jam"];
    // Data kode lama sebagai acuan WHERE
    $kodeMK_lama = $_POST["kodeMK_lama"];

    // Query update
    $query = "UPDATE t_matakuliah SET 
                kodeMK = '$kodeMK_baru',
                namaMK = '$namaMK',
                sks = '$sks',
                jam = '$jam'
              WHERE kodeMK = '$kodeMK_lama'";

    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Gagal mengedit data: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    // Redirect ke halaman tampilan
    header("location:viewmatakuliah.php");
}
?>

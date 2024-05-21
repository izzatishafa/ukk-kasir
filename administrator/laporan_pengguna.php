<?php
include "header.php";

include '../koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM petugas");
?>

<style>
    @media print {
        .print-button {
            display: none;
        }
		.back-button {
            display: none;
        }
    }
</style>

<div class="container mt-3">
    <h2>Laporan Pengguna</h2>
    <button class="btn btn-success print-button" onclick="printReport()">Cetak Laporan</button>
	<button class="btn btn-primary back-button" onclick="goBack()">Kembali</button>
	

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>User Name</th>
                <th>Akses Petugas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama_petugas']; ?></td>
                    <td><?php echo $d['username']; ?></td>
               		<td>
                            <?php
                            if ($d['level'] == '1') { ?>
                                Administrator
                            <?php } else { ?>
                                Petugas
                            <?php } ?>
                        </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
function goBack() {
        window.history.back();
    }

    function printReport() {
        window.print();
    }
</script>



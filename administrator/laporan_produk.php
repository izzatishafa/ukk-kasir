<?php
include "header.php";

include '../koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM produk");
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
    <h2>Laporan Produk</h2>
    <button class="btn btn-success print-button" onclick="printReport()">Cetak Laporan</button>
	<button class="btn btn-primary back-button" onclick="goBack()">Kembali</button>
	

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['NamaProduk']; ?></td>
                    <td>Rp. <?php echo $d['Harga']; ?></td>
                    <td><?php echo $d['Stok']; ?></td>
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



<?php
include "header.php";

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
<div class="card mt-2">
	<div class="card-body">
	<h2>Laporan Pembelian</h2>
    <button class="btn btn-success print-button" onclick="printReport()">Cetak</button>
	<button class="btn btn-primary back-button" onclick="goBack()">Kembali</button>
		
		<?php 
		include '../koneksi.php';
		$PelangganID = $_GET['PelangganID'];
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");
		while($d = mysqli_fetch_array($data)){
			?>
			<?php if ($d['PelangganID'] == $PelangganID) { ?>
				<table>
					<tr>
						<td>ID Pelanggan</td>
						<td>: <?php echo $d['PelangganID']; ?></td>
					</tr>
					<tr>
						<td>Nama Pelanggan</td>
						<td>: <?php echo $d['NamaPelanggan']; ?></td>
					</tr>
					<tr>
						<td>No. Telepon</td>
						<td>: <?php echo $d['NomorTelepon']; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: <?php echo $d['Alamat']; ?></td>
					</tr>
					<tr>
						<td>Total Pembelian</td>
						<td>: Rp. <?php echo $d['TotalHarga']; ?></td>
					</tr>
				</table>
						
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Jumlah Beli</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include '../koneksi.php';
						$nos = 1;
						$detailpenjualan = mysqli_query($koneksi,"SELECT * FROM detailpenjualan");
						while($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)){
							?>
							<?php 
							if ($d_detailpenjualan['PenjualanID'] == $d['PenjualanID']) { ?>
								<tr>
									<td><?php echo $nos++; ?></td>
									<td>
											<div class="form-group">
												<select name="ProdukID" class="form-control" onchange="this.form.submit()">
													<option>--- Pilih Produk ---</option>
													<?php 
													include '../koneksi.php';
													$no = 1;
													$produk = mysqli_query($koneksi,"SELECT * FROM produk");
													while($d_produk = mysqli_fetch_array($produk)){
														?>
														<option value="<?php echo $d_produk['ProdukID']; ?>" <?php if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { echo "selected"; } ?>><?php echo $d_produk['NamaProduk']; ?></option>
													<?php } ?>
												</select>
												</div>
										
									</td>
									<td>								
										
											<div class="form-group">
												<input type="number" name="JumlahProduk" value="<?php echo $d_detailpenjualan['JumlahProduk']; ?>" class="form-control" readonly>
											</div>
										</td>
										<td>										
										<?php echo $d_detailpenjualan['Subtotal']; ?></td>																				
																												
								</tr>
							<?php } else {
								?>
								<?php 
							}
						} 
						?>
					</tbody>
				</table>
				
			<?php } else { ?>
				<?php 
			} 
		} 
		?>		
	</div>
</div>

<script>
function goBack() {
        window.history.back();
    }

    function printReport() {
        window.print();
    }
</script>
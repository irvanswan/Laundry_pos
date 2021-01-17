<?php $this->load->view('templates/header');?>
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Id Pemesanan</th>
				<th>Nama Customer</th>
				<th>Nama Kasir</th>
				<th>Tgl.Pemesanan</th>
				<th>No.Telp</th>
				<th>Harga Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
				foreach ($data_pemesanan as $dt):
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><img src="<?php echo site_url('admin/barcode/'.$dt->no_pemesanan)?>"></td>
				<td><span><?php echo $dt->nama_customer; ?></span></td>
				<td><span><?php echo $dt->nama_kasir; ?></span></td>
				<td><span><?php echo $dt->tanggal_pemesanan; ?></span></td>
				<td><span><?php echo $dt->no_telp_customer; ?></span></td>
				<td><span><?php echo $dt->total_pemesanan ?></span></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				
			</tr>
		</tfoot>
	</table>
	<button class="btn btn-danger btn-sm" id="btn_cetak" onclick="btndanger(this)">Cetak</button>
	<!--<a href="<?= site_url('admin/cetakpemesanan');?>" class="btn btn-danger btn-sm" target="_blank">Cetak</a>-->
</div>
<script>
	let btndanger = (tombol) =>{
		window.print();
	}
</script>
</body>
</html>
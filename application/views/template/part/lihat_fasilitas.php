<?php 
if(count($fasilitas)==0)
{
	die("Tidak ada fasilitas");
}
?>

<table class="table table-bordered">
	<thead>
		<th>No.</th>
		<th>Nama Fasilitas</th>
		<th>Jumlah</th>
	</thead>
	<tbody>
				
		<?php 
		$no=0;
		foreach($fasilitas as $x)
			{
				$no++;
				echo "
						<tr>
							<td>$no</td>
							<td>$x->nama_fasilitas</td>
							<td>$x->jumlah</td>
						</tr>
				";
			}
		?>


	</tbody>
</table>
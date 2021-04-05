<?php foreach ($line as $data) { ?>
<div class="col-1">
	<?php  
		$cek = $this->db->query("SELECT TIMESTAMPDIFF(SECOND, last_update, NOW()) AS now FROM line WHERE id='$data->id'")->row();
		if ($cek->now > 60 ) {
			echo '<button type="button" class="btn btn-secondary btn-block">Line '.$data->line.'</button>';
		}else{
			echo '<button type="button" class="btn btn-success btn-block">Line '.$data->line.'</button>';
		}
	 ?>

	
</div>

<?php } ?>
<h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
<style>
	.col-1{
		padding: 1px;
	}
</style><p>Andon Status</p>
<div class="row line_load">
	
</div>

<script>
	var line_load = setInterval(
    function (){            
        $('.line_load').load('<?php echo base_url() ?>welcome/line_load').fadeIn("slow");                   
    }, 5000);
</script>
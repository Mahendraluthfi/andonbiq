<h1 class="h3 mb-4 text-gray-800">Simulation</h1>

<div class="card shadow mb-4">
	<!-- <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
	</div> -->
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<table class="table table-condensed table-sm">					
					<tbody>
						<tr class="text-center">
							<td><button type="button" class="btn btn-primary btn-block btn-satu" onclick="numberone()">1</button></td>
							<td><button type="button" class="btn btn-primary btn-block btn-dua" onclick="numbertwo()">2</button></td>
							<td><button type="button" class="btn btn-primary btn-block btn-tiga" onclick="numberthree()">3</button></td>
							<td><button type="button" class="btn btn-warning btn-block btn-empat" onclick="numberfour()">4</button></td>
							<td><button type="button" class="btn btn-danger btn-block btn-lima" onclick="numberfive()">5</button></td>
						</tr>
						<tr class="text-center">
							<td><button type="button" class="btn btn-primary btn-block btn1-exit" onclick="back1()" style="display: none;">1</button></td>
							<td><button type="button" class="btn btn-primary btn-block btn2-exit" onclick="back2()" style="display: none;">2</button></td>
							<td><button type="button" class="btn btn-primary btn-block btn3-exit" onclick="back3()" style="display: none;">3</button></td>
							<td><button type="button" class="btn btn-warning btn-block btn4-exit" onclick="back4()" style="display: none;">4</button></td>
							<td><button type="button" class="btn btn-danger btn-block btn5-exit" onclick="back5()" style="display: none;">5</button></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-6">
				<h3 class="title"></h3>
			</div>
		</div>
	</div>
</div>

<script>
	function numberone() {
		$('.btn1-exit').removeAttr('style', 'display');
		$('.btn-satu').removeClass('btn-warning');
		$('.btn-satu').removeAttr('onclick');
		$('.btn-satu').addClass('btn-secondary'); 
		$('.title').text('Defect Level 1');      
	}

	function numbertwo() {
		$('.btn2-exit').removeAttr('style', 'display');
		$('.btn-dua').removeClass('btn-warning');
		$('.btn-dua').removeAttr('onclick');
		$('.btn-dua').addClass('btn-secondary'); 
		$('.title').text('Defect Level 2');      
	}

	function numberthree() {
		$('.btn3-exit').removeAttr('style', 'display');
		$('.btn-tiga').removeClass('btn-warning');
		$('.btn-tiga').removeAttr('onclick');
		$('.btn-tiga').addClass('btn-secondary'); 
		$('.title').text('Defect Level 3');      
	}

	function back1() {
		$('.btn1-exit').attr('style', 'display:none');
		$('.btn-satu').removeClass('btn-secondary');
		$('.btn-satu').attr('onclick','numberone()');
		$('.btn-satu').addClass('btn-primary');
	}

	function back2() {
		$('.btn2-exit').attr('style', 'display:none');
		$('.btn-dua').removeClass('btn-secondary');
		$('.btn-dua').attr('onclick','numbertwo()');
		$('.btn-dua').addClass('btn-primary');
	}

	function back3() {
		$('.btn3-exit').attr('style', 'display:none');
		$('.btn-tiga').removeClass('btn-secondary');
		$('.btn-tiga').attr('onclick','numberthree()');
		$('.btn-tiga').addClass('btn-primary');
	}

	function numberfour() {
		$.ajax({
            url : '<?php echo base_url('welcome/level4') ?>',
            type: "GET",            
            dataType: "JSON",
            success: function(data)
            {               
				$('.btn4-exit').removeAttr('style', 'display');
				$('.btn-empat').removeClass('btn-warning');
				$('.btn-empat').removeAttr('onclick');
				$('.btn-empat').addClass('btn-secondary'); 
				$('.title').text('Defect Level 4');               
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}

	function back4() {
		$('.btn4-exit').attr('style', 'display:none');
		$('.btn-empat').removeClass('btn-secondary');
		$('.btn-empat').attr('onclick','numberfour()');
		$('.btn-empat').addClass('btn-warning');		
	}

	function numberfive() {
		$.ajax({
            url : '<?php echo base_url('welcome/level5') ?>',
            type: "GET",            
            dataType: "JSON",
            success: function(data)
            {               
				$('.btn5-exit').removeAttr('style', 'display');
				$('.btn-lima').removeClass('btn-danger');
				$('.btn-lima').removeAttr('onclick');
				$('.btn-lima').addClass('btn-secondary');	
				$('.title').text('Defect Level 5');               					
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}

	function back5() {
		$.ajax({
            url : '<?php echo base_url('welcome/countdown') ?>',
            type: "GET",            
            dataType: "JSON",
            success: function(data)
            {
				$('.btn5-exit').attr('style', 'display:none');
				$('.btn-lima').removeClass('btn-secondary');
				$('.btn-lima').attr('onclick','numberfive()');
				$('.btn-lima').addClass('btn-danger');
				$('.title').text('Total Downtime '+data+ ' minutes');               									
				// console.log(data);	            	
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}
</script>
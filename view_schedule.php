<?php include 'admin/db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM schedules where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	<p>Horario para: <b><?php echo ucwords($title) ?></b></p>
	<p>Descripción: <b><?php echo $description ?></b></p>
	<p>Lugar: </i> <b><?php echo $location ?></b></p>
	<p>Fecha inicio: </i> <b><?php echo date('h:i A',strtotime("2020-01-01 ".$time_from)) ?></b></p>
	<p>Fecha final: </i> <b><?php echo date('h:i A',strtotime("2020-01-01 ".$time_to)) ?></b></p>
	<hr class="divider">
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-md-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
		</div>
	</div>
</div>
<style>
	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none;
	}
	#uni_modal .modal-footer.display {
		display: block;
	}
</style>
<script>
	$('#edit').click(function(){
		uni_modal('Editar Horario','manage_schedule.php?id=<?php echo $id ?>','mid-large')
	})
	$('#delete_schedule').click(function(){
		_conf("¿Seguro que deseas eliminar este horario?","delete_schedule",[$(this).attr('data-id')])
	})
	
	function delete_schedule($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_schedule',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Datos eliminados exitosamente",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
<!DOCTYPE html>
<html lang="es">
<?php 
session_start();
include('admin/db_connect.php');
ob_start();
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistema de Agenda Escolar</title>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
		position:fixed;
	}
	#main{
		width: calc(100%);
	    height: calc(100%);
		display:flex;
		align-items:center;
		justify-content:center
	}
	/* #login{
		
	} */
	

</style>

<body>


  <main id="main" class=" bg-dark">
  		<div id="login" class="col-md-4">
  			<div class="card">
  				<div class="card-body">
  						
  					<form id="login-form" >
					  <h4><b>Bienvenido al sistema de agenda Escolar</b></h4>
  						<div class="form-group">
  							<label for="nif" class="control-label">Por favor, introduce tu nif</label>
  							<input type="text" id="nif" name="nif" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login_student',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">ID es incorrecto.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>
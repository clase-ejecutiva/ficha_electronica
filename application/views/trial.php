<?php
//print_r($user);
foreach($user as $row){
	$token= $row['token'];
	$email= $row['email'];
	$sku= $row['sku'];
	}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Escritorio Trial</title>
 <script src="/landing/contents/vendor/jquery/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="/landing/contents/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="/landing/contents/css/logo-nav.css" rel="stylesheet">
	<link href="/landing/contents/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">

      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"/>
  </head>

  <body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-header ">
		 
				<div class="container">
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
				  <!--
				  <div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto header">
						<li class="nav-item dropdown">
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a class="dropdown-item" href="inicio.html"><i class="fa fa-calendar" aria-hidden="true"> </i>&nbsp;Mi Malla </a>
								<a class="dropdown-item" href="certificado.html"><i class="fa fa-graduation-cap" aria-hidden="true"> </i>&nbsp;Certificados </a>
								<a class="dropdown-item" href="historial.html"><i class="fa fa-list-ul" aria-hidden="true"> </i>&nbsp;Historial académico</a>
								<hr>
							  <a class="dropdown-item" href="perfil.html">
								<i class="fa fa-user-o" aria-hidden="true"> </i>
								&nbsp;Mi perfil 
							  </a><hr>
							  <a class="dropdown-item" href="#"><i class="fa fa-sign-out" aria-hidden="true"> </i>&nbsp; Cerrar Sesión </a>
							  
							</div>
							<a style="color:white" class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Maria Paz Majluf
								<span class="avatars"> 
								  <img class="avatar" src="https://open.claseejecutiva.com/theme/image.php?theme=academi&amp;component=core&amp;image=u%2Ff2" alt="Imagen de Maria Paz Majluf" title="Imagen de Maria Paz Majluf" class="userpicture defaultuserpic" width="35" height="35">
								</span>
						   </a>
						</li>
					</ul>
				  </div>
				  -->
				  	
				</div>
				
				  <div class="col-md-6">
						  <div class="info">
							  <span></span>
							  <span></span>
						  </div> 
					  </div>
					
			  </nav>

			  <div class="container-fluid">
				  <div class="row header2">
					  <div class="col-md-6">
						  <a href="#"><img src="/landing/contents/imagenes/logo-CE.png" width="243" height="77" alt="Academi"></a>
					  </div>
					  <div class="col-md-6">
						  <div class="info">
							  <span>Teléfono: +56 22 8400800</span>
							  <span>Correo electrónico: contacto@claseejecutiva.cl</span>
						  </div> 
					  </div>
					</div>
			  </div>
			  <hr>

    <!-- Page Content -->
    <div class="container page-content">
	
        <div class="texto" style="padding:20px;">
			<h2 class="titulo">Perfil</h2><br>
            <div class="row">
				<div class="col-md-8 col-md-offset-4">
	             <div class="panel panel-login">
					<div class="card">
						  <h4 class="card-header perfil-header">Datos usuario (Email: <?php echo $email;?>)</h4>
						  <div class="card-block" style="background: #F7F7F9;">

								 
									<form id="erp_form"  name="erp" method="POST" action="https://ws2.diplomadosuc.cl/landing/index.php/trial/matricula" >
									<div class="form-group">
									
									<div class="form-group">
									<p><small id="emailHelp" class="form-text text-muted">Ingrese su Nombre </small></p>
									<input value="" type="text" class="form-control " id="input_nombre" name="nombre" >
									<p><small id="emailHelp" class="form-text text-muted">Ingrese su Apellido </small></p>
									<input value="" type="text" class="form-control " id="input_ape"  name="apellido" >
									</div>
										<!--<label for="exampleInputEmail1">Nombre completo</label>-->
										<p><small id="emailHelp" class="form-text text-muted">Ingrese su Contraseña </small></p>
											<div class="form-group">
												<input value="<?php echo $email;?>" type="text" class="form-control " id="input_email" readonly>
												<input value="<?php echo $sku;?>" type="hidden" class="form-control " id="input_sku" readonly>
											</div>									
										<br>
											<div class="form-group">
												<input value="" type="password" class="form-control " id="input_pass1" placeholder="Contraseña">
											</div><br>
											<div class="form-group">
												<input value="" type="password" class="form-control " id="input_pass2" placeholder="Validar Contraseña">
											</div>
									</div>
									


										<br><br>
										<div class="form-group">
						
											<br>	
											<div class="row" style="float:right">
												<div class="col-md-6">
													<button type="button" class="btn btn-primary" id="enviar">Crear Cuenta</button>
													<br><br>													
													  <img id="loader-landing-0" style="display:none;" src="/landing/contents/imagenes/ajax-loader.gif">													  
												</div>
													
											</div>
										</div>  	
									</div>	
								

												
								</form>
						    
						  </div>
					</div>
	            </div>
	        </div>
        </div>  

	<form id="sso" action="http://trial.claseejecutiva.com/publico/index/sso" method="POST">
	<input type="hidden" name="id_pais_identificador" value="1">
	<input type="hidden" name="tipo_id" value="2">
	<input id ="username_sso" type="hidden" name="username" >
	<input id="hash" type="hidden" name="hash" value="-">
	<input type="hidden" name="url_redirect" value="/front/miscursos/malla/par_id_alumno/-1">
	
    </form>
		
		
      </div>
    <!-- /.container -->

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div  class="img-footer">
							<a href="#"><img src="/landing/contents/imagenes/logo-CE.png" width="243" height="77" alt="Academi"></a>
						</div>
						<div>
							La Clase Ejecutiva, Ingeniería Industrial UC.&nbsp;<br>
							© 2017- Pontificia Universidad Católica de Chile <br>    

						</div>	 
					</div>
	 
					<div class="col-md-6" style="padding-top: 20px;text-align:right">
						<div class="contact-info">
							<h2 style="color: #2e7de1">Contacto</h2>
							<p>Presidente Riesco 5335, Oficina 603, Las Condes, Santiago.<br>	
								Correo electrónico: <a class="mail-link" href="mailto:contacto@claseejecutiva.cl">contacto@claseejecutiva.cl</a><br>
								Teléfono : +56 22 8400800<br>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>



    <!-- Bootstrap core JavaScript -->
	
    <script src="/landing/contents/vendor/jquery/jquery.min.js"></script>
    <script src="/landing/contents/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/landing/contents/js/trial.js"></script>
	<script src="/landing/contents/js/md5.js"></script>
	<script src="/landing/contents/js/formatDate.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

  </body>

</html>

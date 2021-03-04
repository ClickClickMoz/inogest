<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="static/img/icons/icon-48x48.png" />

	<title>Entrar</title>

	<link href="static/css/app.css" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Bem Vindo de Volta</h1>
							<p class="lead">
								Entre com sua conta para continuar
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="static/img/logo.jpeg" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form action="static/login.php" method="post">
										<div class="mb-3">

										<?php
											if(isset($_SESSION['nao_autenticado'])): ?>
											<p><small><small>
												Usuario ou Senha Invalido
											</small></small></p>
											<?php
											endif;
											unset($_SESSION['nao_autenticado']);
										?>


											<label class="form-label">Usuario</label>
											<input class="form-control form-control-lg" type="text" name="usuario" placeholder="Digite seu usuario" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="senha" placeholder="Digite sua password" />
											<small>
            <a href="pages-reset-password.html">Esqueceu palavra passe?</a>
          </small>
										</div>
										<div>
										
										</div>
										<div class="text-center mt-3">
											<!--<a href="index.html" class="btn btn-lg btn-primary">Entrar</a>-->
											 <button type="submit" name="btn" class="btn btn-lg btn-primary">Entrar</button> 
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>
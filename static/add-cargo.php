<?php include 'layout/header.php';?>
<?php $page = 'cargo'; ?>
<?php include 'layout/sidebar.php';?>

<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          			<i class="hamburger align-self-center"></i>
        		</a>

			

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
										Novas Notificações
								</div>
								
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Mostras todas notificações</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										Novas Mensagens
									</div>
								</div>
								
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Mostrar todas mensagens</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="img/logo.jpeg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark"><?php echo $_SESSION['nome_usuario']; ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Painel Analitico</a>
								<a class="dropdown-item" href="logout.php">Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Adicionar Novo Cargo</h1>

					<div class="row">
						
						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Cargo</h5>
								</div>
								<div class="card-body">
									<form method="POST">
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4">Cargo</label>
												<input type="text" class="form-control" name="txtcargo" id="txtcargo" placeholder="Cargo" required>
											</div>
											
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Responsabilidades do Cargo</label>
												<textarea class="form-control" id="txtresponsabilidade" name="txtresponsabilidade" placeholder="Descrição da responsabilidade" rows="5" required></textarea>
											</div>
											
										</div>
						
										<button type="submit" name="button" class="btn btn-primary">Submeter</button>
									</form>
								</div>
							</div>
						</div>

					
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>InoGest</strong></a> &copy;
							</p>
						</div>
						
						
					</div>
				</div>
			</footer>
			<script src="js/app.js"></script>
		</div>



<?php include 'layout/footer.php';?>

<!--CADASTRAR -->

<?php

  if(isset($_POST['button'])){
    $nome = $_POST['txtcargo'];
    $respo = $_POST['txtresponsabilidade'];

    //VEERIFICAR SE O Cargo JA ESTA CADASTRADO

    $queryVerifica = "select * from cargos where cargo = '$nome'";

    $resultVerifica = mysqli_query($conexao,$queryVerifica);

    $rowVerifica = mysqli_num_rows($resultVerifica);

    if($rowVerifica > 0){
      echo"<script language='javascript'>window.alert('Cargo Ja esta Cadastrado'); </script>";
      exit();
    }


    $query = "INSERT INTO `cargos` (`cargo`,`responsabilidade`,`data`) VALUES ('$nome','$respo', CURRENT_DATE)";
 
    $result =   mysqli_query($conexao, $query);
    
    if($result == ''){
      echo"<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar'); </script>";
      
    }else{
      echo"<script language='javascript'>window.alert('Salvo com Sucesso'); </script>";
      echo"<script language='javascript'>window.location='pages-cargos.php'; </script>";
    }

  }
?>

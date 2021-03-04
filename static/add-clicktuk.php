
<?php include 'layout/header.php';?>
<?php $page = 'clicktuk'; ?>
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
									<a href="#" class="text-muted">Mostrar todas Notificações</a>
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
									<a href="#" class="text-muted">Mostrar todas Mensagens</a>
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
								
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Painel de Análise</a>
								
								<a class="dropdown-item" href="logout.php">Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Adicionar Novo Motorista ClickTuk</h1>

					<div class="row">
						
						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">ClickTaxi</h5>
								</div>
								<div class="card-body">
									<form method="POST">
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4">Nome</label>
												<input type="text" class="form-control" name="txtnome" id="txtnome" placeholder="Nome" required>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="txttelefone">Telefone</label>
												<input type="text" class="form-control" id="txttelefone" name="txttelefone" placeholder="Telefone" required>
											</div>
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Praça</label>
												<select class="form-control mr-2" id="category" name="txtpraca">
													<?php
													
													$query = "SELECT * FROM pracas ORDER BY praca asc";
													$result = mysqli_query($conexao, $query);

													if(count($result)){
													while($res_2 = mysqli_fetch_array($result)){
															?>                                             
													<option value="<?php echo $res_2['praca']; ?>"><?php echo $res_2['praca']; ?></option> 
															<?php      
														}
													}
													?>
												</select>
											</div>
											<div class="mb-3 col-md-4">
												<label class="form-label" for="inputState">Provincia</label>
												<select id="txtprovincia" name="txtprovincia" class="form-control" required>
													<option selected>Escolher...</option>
													<option value="Cabo Delgado">Cabo Delgado</option>
													<option value="Gaza">Gaza</option>
													<option value="Inhambane">Inhambane</option>
													<option value="Manica">Manica</option>
													<option value="Maputo Cidade">Maputo Cidade</option>
													<option value="Maputo">Maputo</option>
													<option value="Nampula">Nampula</option>
													<option value="Niassa">Niassa</option>
													<option value="Sofala">Sofala</option>
													<option value="Tete">Tete</option>
													<option value="Zambezia">Zambezia</option>
												</select>
											</div>
											<div class="mb-3 col-md-2">
												<label class="form-label" for="inputZip">Cidade</label>
												<input type="text" class="form-control" id="txtcidade" name="txtcidade" placeholder="Cidade" required>
											</div>
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Matricula do Txopela</label>
											<input type="text" class="form-control" id="txtmatricula" name="txtmatricula" placeholder="Matricula do Carro" required>
										</div>
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txtcidade">Cor do Txopela</label>
											<input type="text" class="form-control" id="txtcor" name="txtcor" placeholder="Cor do Carro" required>
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
    $nome = $_POST['txtnome'];
	$telefone = $_POST['txttelefone'];
	$praca = $_POST['txtpraca'];
    $provincia = $_POST['txtprovincia'];
    $cidade = $_POST['txtcidade'];
	$matricula = $_POST['txtmatricula'];
	$cor = $_POST['txtcor'];

    //VEERIFICAR SE O BI JA ESTA CADASTRADO

    $queryVerifica = "select * from motoristaclicktuk where telefone = '$telefone'";

    $resultVerifica = mysqli_query($conexao,$queryVerifica);

    $rowVerifica = mysqli_num_rows($resultVerifica);

    if($rowVerifica > 0){
      echo"<script language='javascript'>window.alert('Cliente Ja esta Cadastrado'); </script>";
      exit();
    }


    $query = "INSERT INTO `motoristaclicktuk`(`nome`, `telefone`, `praca`, `provincia`, `cidade`, `matricula`, `cor`, `data`) VALUES ('$nome','$telefone','$praca','$provincia','$cidade','$matricula','$cor',CURRENT_DATE)";
 
    $result =   mysqli_query($conexao, $query);
    
    if($result == ''){
      echo"<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar'); </script>";
      
    }else{
      echo"<script language='javascript'>window.alert('Salvo com Sucesso'); </script>";
      echo"<script language='javascript'>window.location='pages-clicktuk.php'; </script>";
    }

  }
?>
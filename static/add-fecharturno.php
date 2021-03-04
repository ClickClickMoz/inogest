
<?php include 'layout/header.php';?>
<?php $page = 'turno'; ?>
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
            <?php
              $currentdate = date("Y-m-d");
              $nomecolaborador = $_SESSION['nome_usuario'];
              
			  

			  if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar']!=''){
				$telefone = $_GET['txtpesquisar'] . '%';
				$queryPro = "SELECT * FROM `usuarioedc` where categoria LIKE 'Profissional'";
				$queryLP = "SELECT * FROM `usuarioedc` where categoria LIKE 'Ligeiros e Pesados' ";
				$queryTabela = "SELECT * FROM `usuarioedc` where telefone LIKE '$telefone'";


			  }else{
			  $queryTabela = "SELECT * FROM `usuarioedc` where datar LIKE '$currentdate' and colaboradoredc LIKE '$nomecolaborador'";
			  $queryPro = "SELECT * FROM `usuarioedc` where (categoria LIKE 'Profissional' and datar LIKE '$currentdate') and colaboradoredc LIKE '$nomecolaborador' ";
			  $queryLP = "SELECT * FROM `usuarioedc` where (categoria LIKE 'Ligeiros e Pesados' and datar LIKE '$currentdate') and colaboradoredc LIKE '$nomecolaborador' ";
			  }
			  $resultTabela =   mysqli_query($conexao, $queryTabela);
			  $resultPro =   mysqli_query($conexao, $queryPro);
			  $resultLP =   mysqli_query($conexao, $queryLP);
			  
			  
			  $rowTabela = mysqli_num_rows($resultTabela);
			  $rowPro = mysqli_num_rows($resultPro);
			  $rowLP = mysqli_num_rows($resultLP);
			
				?>
				
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Fechar Turno EDC</h1>

					<div class="row">
						
						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">EDC MZ</h5>
								</div>
								<div class="card-body">
									<form method="POST">
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4">Funcionário</label>
												<input type="text" value="<?php echo $_SESSION['nome_usuario']; ?>" class="form-control" name="txtnome" id="txtnome" placeholder="Nome" required>
											</div>
										
                                        </div>
                                        <div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4">Data</label>
												<input type="date" value="<?php echo date('Y-m-d'); ?>"  class="form-control" name="txtdata" id="txtdata" placeholder="Data" required>
											</div>
                                        </div>
                                        <div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4">Horas</label>
												<input type="time" value="<?php echo date('h:i:s'); ?>"  class="form-control" name="txthora" id="txthora" placeholder="Nome" required>
											</div>
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Número Activações LP</label>
												<input type="text" value="<?php echo $rowLP ?>" class="form-control" id="txtlp" name="txtlp" placeholder="Matricula do Carro" required>
											</div>
											
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Número Activações PRO</label>
											<input type="text" value="<?php echo $rowPro?>" class="form-control" id="txtpro" name="txtpro" placeholder="Matricula do Carro" required>
										</div>
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Número Activações do turno</label>
											<input type="text" value="<?php echo $rowTabela?>" class="form-control" id="txttotal" name="txttotal" placeholder="Matricula do Carro" required>
										</div>
                                        
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Meta Atingida?</label>
											<select class="form-control" name="txtmeta" id="txtmeta">
												<option value="sim" <?php if ($rowTabela >=50) echo "selected" ?>>Sim</option>
												<option value="nao" <?php if ($rowTabela < 50) echo "selected" ?>>Não</option>
											</select>
                                        </div>
										</div>

										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Turno</label>
											<select class="form-control" name="txtturno" id="txtturno">
												<option value="Turno Dia" <?php if (time() <= strtotime("15:00:00")) {echo "selected";}else{echo "";} ?> >Turno de Dia</option>
												<option value="Turno Noite" <?php if (time() >= strtotime("15:00:00")) {echo "selected";}else{echo "";} ?>  >Turno de Noite</option>
											</select>
                                        </div>
										</div>

                                        <div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Pendentes do turno</label>
											<input type="text" class="form-control" id="txtpendente" name="txtpendente" placeholder="Pendentes separados por virgula" required>
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
	$data = $_POST['txtdata'];
	$hora = $_POST['txthora'];
    $lp = $_POST['txtlp'];
    $pro = $_POST['txtpro'];
	$total = $_POST['txttotal'];
	$metaatingida = $_POST['txtmeta'];
	$turno = $_POST['txtturno'];
	$pendente = $_POST['txtpendente'];

	/* 
    //VEERIFICAR SE O BI JA ESTA CADASTRADO

    $queryVerifica = "select * from turnos where telefone = '$telefone'";

    $resultVerifica = mysqli_query($conexao,$queryVerifica);

    $rowVerifica = mysqli_num_rows($resultVerifica);

    if($rowVerifica > 0){
      echo"<script language='javascript'>window.alert('Cliente Ja esta Cadastrado'); </script>";
      exit();
    }*/


    $query = "INSERT INTO `turnos`(`funcionario`, `datar`, `hora`, `ligeiropesado`, `profissional`,`total`, `pendentes`,`metaatingida`,`turno`) VALUES ('$nome',CURRENT_DATE,CURRENT_TIME,'$lp','$pro','$total','$pendente','$metaatingida','$turno')";
 
    $result =   mysqli_query($conexao, $query);
    
    if($result == ''){
      echo"<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar'); </script>";
      
    }else{
      echo"<script language='javascript'>window.alert('Salvo com Sucesso'); </script>";
      echo"<script language='javascript'>window.location='pages-blank.php'; </script>";
    }

  }
?>
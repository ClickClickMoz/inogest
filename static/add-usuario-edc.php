
<?php include 'layout/header.php';?>
<?php $page = 'edcusuario'; ?>
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

					<h1 class="h3 mb-3">Adicionar Novo Usuários EDC</h1>

					<div class="row">
						
						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Usuário EDC</h5>
								</div>
								<div class="card-body">
									<form method="POST">
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4">Nome</label>
												<input type="text" class="form-control" name="txtnome" id="txtnome" placeholder="Nome">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="txttelefone">Telefone</label>
												<input type="text" class="form-control" id="txttelefone" name="txttelefone" placeholder="Telefone" required>
											</div>
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Categoria do Aplicativo</label>
												<select class="form-control mr-2" id="category" name="txtcategoria">
                                                    <option value="Ligeiros e Pesados">Ligeiros e Pesados</option>
                                                    <option value="Profissional">Profissional</option>
                                                    <option value="Cargas Perigosas">Cargas Perigosas</option>
												</select>
											</div>
											<div class="mb-3 col-md-4">
												<label class="form-label" for="inputState">Provincia</label>
												<select id="txtprovincia" name="txtprovincia" class="form-control">
													<option selected></option>
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
												<input type="text" class="form-control" id="txtcidade" name="txtcidade" placeholder="Cidade">
											</div>
                                        </div>

                                        <div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Escola de Condução</label>
											<input  type="text"  class="form-control" id="txtescola" name="txtescola" placeholder="Escola de Condução">
                                        </div>
                                        
                                           
                                        
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Código de Activação</label>
											<input  type="text"  class="form-control" id="txtcodigo" name="txtcodigo" placeholder="Código de Activação" required>
                                        </div>
                                        <div class="mb-3 col-md-4">
												<label class="form-label" for="inputState">Melhoria do Aplicativo</label>
												<textarea type="text" rows="1" class="form-control" id="txtmelhoria" name="txtmelhoria" placeholder="Melhoria aplicativo"></textarea>
											</div>
                                        <div class="mb-3 col-md-2">
												<label class="form-label" for="inputZip">Como conheceu?</label>
												<select id="txtconheceu" name="txtconheceu" class="form-control">
													<option selected>Escolher...</option>
													<option value="Com um amigo">Com um amigo</option>
													<option value="Na escola">Na escola</option>
													<option value="Outro">Outro</option>
								
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
											<label class="form-label" for="txtcidade">Colaborador EDC</label>
											<input readonly type="text" value="<?php echo $_SESSION['nome_usuario'];?>"class="form-control" id="txtcolaborador" name="txtcolaborador" required>
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
								<a href="indexx.php" class="text-muted"><strong>InoGest</strong></a> &copy;
							</p>
						</div>
						
					</div>
				</div>
				<script src="js/app.js"></script>
			</footer>
		</div>


	

<?php include 'layout/footer.php';?>


<!--CADASTRAR -->

<?php

  if(isset($_POST['button'])){
    $nome = $_POST['txtnome'];
	$telefone = $_POST['txttelefone'];
    $categoria = $_POST['txtcategoria'];
    $provincia= $_POST['txtprovincia'];
    $cidade= $_POST['txtcidade'];
    $escolaconducao= $_POST['txtescola'];
    $codigo= $_POST['txtcodigo'];
    $melhoria= $_POST['txtmelhoria'];
    $comoconheceu= $_POST['txtconheceu'];
	$colaboradoredc= $_POST['txtcolaborador'];
	$turno = $_POST['txtturno'];




    $query = "INSERT INTO `usuarioedc`(`nome`, `telefone`, `categoria`, `provincia`, `cidade`, `escolaconducao`, `codigo`, `melhoria`,`comoconheceu`,`colaboradoredc`,`turno`,`datar`,`hora`) VALUES ('$nome','$telefone','$categoria','$provincia','$cidade','$escolaconducao','$codigo','$melhoria','$comoconheceu','$colaboradoredc','$turno',CURRENT_DATE,CURRENT_TIME)";
 
    $result =   mysqli_query($conexao, $query);
    
    if($result == ''){
      echo"<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar'); </script>";
      
    }else{
		echo"<script language='javascript'> window.alert('Usuario Salvo com Sucesso'); </script>";
	  $_SESSION['msg'] = "<p id='link'>Obrigado pelo seu Pagamento. O seu código de activação é : $codigo . Instruções para activação no link: www.inovatis.co.mz/procedimentos. Agora também disponível aplicativo para Profissional. Em caso de Duvida contacte a Linha de Apoio: 850110300</p>";
      echo"<script language='javascript'>window.location='pages-usuarios-edc.php'; </script>";
    }

  }
?>
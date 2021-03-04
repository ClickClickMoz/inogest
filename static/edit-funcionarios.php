
<?php include 'layout/header.php';?>
<?php $page = 'funcionario'; ?>
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

					<h1 class="h3 mb-3">Editar Funcionário</h1>

					<div class="row">
						
						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Funcionário</h5>
								</div>
								<div class="card-body">










                                <!--EDITAR -->

<?php 
  if(@$_GET['func'] == 'edita'){
    $id = $_GET['id'];
    $query = "select * from funcionarios where id = '$id'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

    while($res_1 = mysqli_fetch_array($result)){
      
      ?>
      <form method="POST">
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4">Nome</label>
												<input type="text" value="<?php echo $res_1['nome']; ?>" class="form-control" name="txtnome" id="txtnome" placeholder="Nome" required>
											</div>
											<div class="mb-3 col-md-4">
												<label class="form-label" for="txttelefone">Nacionalidade</label>
												<input type="text" value="<?php echo $res_1['nacionalidade']; ?>" class="form-control" id="txtnacionalidade" name="txtnacionalidade" placeholder="Nacionalidade">
											</div>
											<div class="mb-3 col-md-2">
												<label class="form-label" for="inputZip">Data de Nascimento</label>
												<input type="date" value="<?php echo $res_1['datanascimento']; ?>" class="form-control" id="txtdatanascimento" name="txtdatanascimento" placeholder="Cidade">
											</div>
											
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Bilhete de Identificação</label>
												<input type="text" value="<?php echo $res_1['bi']; ?>" class="form-control" id="txtbi" name="txtbi" placeholder="Bilhete de Identificação" required>
											</div>
											<div class="mb-3 col-md-4">
												<label class="form-label" for="inputState">Provincia</label>
												<select id="txtprovincia" name="txtprovincia" class="form-control" required>
													<option value="<?php echo $res_1['provincia']; ?>" selected><?php echo $res_1['provincia']; ?></option>
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
												<input type="text" value="<?php echo $res_1['cidade']; ?>" class="form-control" id="txtcidade" name="txtcidade" placeholder="Cidade" required>
											</div>
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Endereço</label>
											<input type="text" value="<?php echo $res_1['endereco']; ?>" class="form-control" id="txtendereco" name="txtendereco" placeholder="Endereço" required>
										</div>
										<div class="mb-3 col-md-6">
												<label class="form-label" for="txttelefone">Telefone</label>
												<input type="text" value="<?php echo $res_1['telefone']; ?>" class="form-control" id="txttelefone" name="txttelefone" placeholder="Telefone" required>
											</div>
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
												<label class="form-label" for="txttelefone">Nível Acádemico</label>
												<input type="text" value="<?php echo $res_1['nivelacademico']; ?>" class="form-control" id="txtnivel" name="txtnivel" placeholder="Nível Acádemico">
										</div>
										
										<div class="mb-3 col-md-2">
												<label class="form-label" for="inputZip">Número INSS</label>
												<input type="text" value="<?php echo $res_1['numeroinss']; ?>" class="form-control" id="txtinss" name="txtinss" placeholder="Cidade">
										</div>
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
												<label class="form-label" for="txttelefone">Tipo de Contrato</label>
												<select id="txtcontrato" name="txtcontrato" class="form-control">
												<option value="<?php echo $res_1['tipodecontrato']; ?>" selected><?php echo $res_1['tipodecontrato']; ?></option>
													<option value="Contrato Indeterminado">Contrato Indeterminado</option>
													<option value="Contrato tempo certo">Contrato tempo certo</option>
													<option value="Contrato de Estágio">Contrato de Estágio</option>
													<option value="Eventual">Eventual</option>
												</select>
										</div>
										</div>
										<div class="row">
										<div class="mb-3 col-md-2">
												<label class="form-label" for="txttelefone">Salário Base</label>
												<input type="number" value="<?php echo $res_1['salariobase']; ?>" class="form-control" id="txtsalario" name="txtsalario" placeholder="Sálario Base">
										</div>
										<div class="mb-3 col-md-2">
												<label class="form-label" for="txttelefone">Subsídio</label>
												<input type="number" value="<?php echo $res_1['subsidio']; ?>" class="form-control" id="txtsubsidio" name="txtsubsidio" placeholder="Subsídio">
										</div>
										<div class="mb-3 col-md-2">
												<label class="form-label" for="txttelefone">Meta Mensal</label>
												<input type="number" value="<?php echo $res_1['valormetamensal']; ?>" class="form-control" id="txtmeta" name="txtmeta" placeholder="Meta Mensal">
										</div>
										</div>
										<div class="row">
										
										<div class="mb-3 col-md-2">
												<label class="form-label" for="txttelefone">Data de Admissão</label>
												<input type="date" value="<?php echo $res_1['dataadmissao']; ?>" class="form-control" id="txtadmissao" name="txtadmissao" placeholder="Data de Admissão">
										</div>
										
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txtcidade">Cargo</label>
											<select class="form-control mr-2" id="category" name="cargo" required>
                                                <option value="<?php echo $res_1['cargo']; ?>" selected><?php echo $res_1['cargo']; ?></option>
												<?php
												
												$query = "SELECT * FROM cargos ORDER BY cargo asc";
												$result = mysqli_query($conexao, $query);

												if(count($result)){
												while($res_1 = mysqli_fetch_array($result)){
														?>                                             
												<option value="<?php echo $res_1['cargo']; ?>"><?php echo $res_1['cargo']; ?></option> 
														<?php      
													}
												}
												?>
												</select>
										</div>
										</div>
										<button type="submit" name="buttonEditar" class="btn btn-primary">Submeter</button>
									</form>
      
    

  <!--Comando para editar os dados UPDATE -->
<?php
if(isset($_POST['buttonEditar'])){
  $nome = $_POST['txtnome'];
  $telefone = $_POST['txttelefone'];
  $endereco = $_POST['txtendereco'];
  $provincia = $_POST['txtprovincia'];
  $cidade = $_POST['txtcidade'];
  $cargo = $_POST['cargo'];
  $bi = $_POST['txtbi'];




$query_editar = "UPDATE funcionarios set nome = '$nome', bi = '$bi', provincia = '$provincia', cidade = '$cidade', telefone = '$telefone', endereco = '$endereco', cargo = '$cargo' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location=' pages-funcionarios.php'; </script>";
}
}
?>

<?php 
} 
}  
?>









									







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
								<a href="indexx.php" class="text-muted"><strong>AdminKit</strong></a> &copy;
							</p>
						</div>
						
					</div>
				</div>
				<script src="js/app.js"></script>
			</footer>
		</div>


<?php include 'layout/footer.php';?>



<?php include 'layout/header.php';?>
<?php $page = 'usuario'; ?>
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

					<h1 class="h3 mb-3">Adicionar Novo Usuário</h1>

					<div class="row">
						
						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Usuários</h5>
								</div>
								<div class="card-body">

                                <!--EDITAR -->

<?php 
  if(@$_GET['func'] == 'edita'){
    $id = $_GET['id'];
    $query = "select * from usuarios where id = '$id'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

    while($res_1 = mysqli_fetch_array($result)){
      
      ?>
    <form method="POST">
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4">Usuário</label>
												<input type="text" value="<?php echo $res_1['usuario']; ?>" class="form-control" name="txtusuario" id="txtusuario" placeholder="Usuário" required>
											</div>
											
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Palavra Passe</label>
												<input type="text" value="<?php echo $res_1['senha']; ?>" class="form-control" id="txtsenha" name="txtsenha" placeholder="Palavra Passe" required>
											</div>
											
										</div>
										<div class="row">
										
										</div>
										<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txtcidade">Funcionário</label>
											<select class="form-control mr-2" id="category" name="funcionario">

                                                <option value="<?php echo $res_1['nome']; ?>" selected><?php echo $res_1['nome']; ?></option>
                                                <?php
                                                
                                                $query = "SELECT * FROM funcionarios ORDER BY nome asc";
                                                $result = mysqli_query($conexao, $query);

                                                if(count($result)){
                                                while($res_2 = mysqli_fetch_array($result)){
                                                        ?>                                             
                                                <option value="<?php echo $res_2['id']; ?>"><?php echo $res_2['nome']; ?></option> 
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
  $nome = $_POST['nome'];
  $usuario = $_POST['txtusuario'];
  $senha = $_POST['txtsenha'];
  $cargo = $_POST['cargo'];
  $funcionario = $_POST['funcionario'];


  if ($res_1['usuario'] != $usuario){

       //VERIFICAR SE O USUARIO JÁ ESTÁ CADASTRADO
    $query_verificar = "select * from usuarios where usuario = '$usuario' ";

    $result_verificar = mysqli_query($conexao, $query_verificar);
    $row_verificar = mysqli_num_rows($result_verificar);

    if($row_verificar > 0){
    echo "<script language='javascript'> window.alert('Usuario já Cadastrado!'); </script>";
    exit();
    }

}

 


$query_editar = "UPDATE usuarios set usuario = '$usuario', senha = '$senha', cargo = '$cargo' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location=' pages-usuarios.php'; </script>";
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
								<a href="index.html" class="text-muted"><strong>AdminKit</strong></a> &copy;
							</p>
						</div>
					
					</div>
				</div>
				<script src="js/app.js"></script>
			</footer>
		</div>

<?php include 'layout/footer.php';?>
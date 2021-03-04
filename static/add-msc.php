
<?php include 'layout/header.php';?>
<?php $page = 'msc'; ?>
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

					<h1 class="h3 mb-3">Adicionar Novo MSC</h1>

					<div class="row">
						
						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">MSC EDC</h5>
								</div>
								<div class="card-body">
									<form method="POST">
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4">Nome de Usuario</label>
												<input type="text" class="form-control" name="txtnome" id="txtnome" placeholder="Nome" required>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="txttelefone">Telefone</label>
												<input type="text" class="form-control" id="txttelefone" name="txttelefone" placeholder="Telefone" required>
											</div>
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Motivo</label>
												<select class="form-control mr-2" id="category" name="txtmotivo">
                                                    <option value="Como fazer o pagamento">Como fazer o pagamento</option>
                                                    <option value="Não sabe activar o aplicativo">Não sabe activar o aplicativo</option>
                                                    <option value="Não aceita activar o aplicativo">Não aceita activar o aplicativo</option>
                                                    <option value="Subsrição bloqueada antes de 30 dias">Subsrição bloqueada antes de 30 dias</option>
                                                    <option value="Não consegue aceder ao aplicativo">Não consegue aceder ao aplicativo</option>
                                                    <option value="Codigo usado ou inválido">Codigo usado ou inválido</option>
												</select>
											</div>
									
                                            <div class="row">

                                            </div>
                                      
											
                                        </div>
                                        <div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Causa</label>
											<select class="form-control mr-2" id="category" name="txtcausa">
                                                    <option value="Não prestou atenção aos procedimentos enviados">Não prestou atenção aos procedimentos enviados</option>
                                                    <option value="Não tem dados ligados durante a activação">Não tem dados ligados durante a activação</option>
                                                    <option value="Não foi feito o RESET para permitir o novo código">Não foi feito o RESET para permitir o novo código</option>
                                                    <option value="Communication Error">Communication Error</option>
                                                    <option value="Dados de internet desligados por longos periodos de tempo">Dados de internet desligados por longos periodos de tempo</option>
                                                    <option value="Versão de Android inferior a 6. Não suporta versão Offline">Versão de Android inferior a 6. Não suporta versão Offline</option>
                                                    <option value="Desinstalou ou perdeu celular. Solicita novo código">Desinstalou ou perdeu celular. Solicita novo código</option>
                                                    <option value="Tentativa de Activar a versão DEMO">Tentativa de Activar a versão DEMO</option>
                                                </select>
                                        </div>
                                        
                                           
                                        
										</div>

                                        <div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Solução</label>
											<select class="form-control mr-2" id="txtsolucao" name="txtsolucao">
                                                    <option value="Explicar os procedimentos e enviar foto ilustrativa de activação">Explicar os procedimentos e enviar foto ilustrativa de activação</option>
                                                    <option value="Solicitar a activação de dados durante a ligação">Solicitar a activação de dados durante a ligação</option>
                                                    <option value="Fazer o RESET para activar o novo código">Fazer o RESET para activar o novo código</option>
                                                    <option value="Communication Error ligar dados e fazer reset do telefone">Communication Error ligar dados e fazer reset do telefone</option>
                                                    <option value="Enviar o link da versão ONLINE,criar conta e enviar">Enviar o link da versão ONLINE,criar conta e enviar</option>
                                                    <option value="Suspender código antigo e fornecer novo código">Suspender código antigo e fornecer novo código</option>
                                                    <option value="Desinstalar e instalar novamente a aplicação">Desinstalar e instalar novamente a aplicação</option>
                                                    <option value="Baixar a versão Completa LP ou PRO">Baixar a versão Completa LP ou PRO</option>
                                                </select>
                                        </div>
                                        
                                           
                                        
										</div>

                                        <div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputAddress">Comentários</label>
                                            <textarea id=txtcomentario name="txtcomentario" class="form-control" rows="3"></textarea>
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
    $motivo = $_POST['txtmotivo'];
    $causa= $_POST['txtcausa'];
    $solucao= $_POST['txtsolucao'];
    $comentario= $_POST['txtcomentario'];
    $colaboradoredc= $_POST['txtcolaborador'];

  


    $query = "INSERT INTO `msc`(`nome`, `telefone`, `motivo`, `causa`, `solucao`, `comentario`, `colaboradoredc`, `datar`) VALUES ('$nome','$telefone','$motivo','$causa','$solucao','$comentario','$colaboradoredc', CURRENT_DATE)";
 
    $result =   mysqli_query($conexao, $query);
    
    if($result == ''){
      echo"<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar'); </script>";
      
    }else{
      echo"<script language='javascript'>window.alert('Salvo com Sucesso'); </script>";
      echo"<script language='javascript'>window.location='pages-msc.php'; </script>";
    }
  }
?>
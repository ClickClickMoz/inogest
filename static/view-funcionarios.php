
<?php include 'layout/header.php';?>
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
									
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									Novas Notificacoes
								</div>
								<div class="list-group">
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Mostrar todas notificacoes</a>
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
								<div class="list-group">
									
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
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Painel de Analise</a>
								<a class="dropdown-item" href="#">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<?php 
					if(@$_GET['func'] == 'view'){
						$id = $_GET['id'];
						$query = "select * from funcionarios where id = '$id'";
						$result = mysqli_query($conexao, $query);
						$row = mysqli_num_rows($result);

						while($res_1 = mysqli_fetch_array($result)){
						
						?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Informações do Colaborador</h1>

					<div class="row">
						<div class="col-md-3 col-xl-2">

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Menu</h5>
								</div>

								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
          Trabalhador
        </a>
		<a class="list-group-item list-group-item-action" data-toggle="list" href="#docs" role="tab">
          Documentos
        </a>	
		<a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
          Password
        </a>
									
								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="account" role="tabpanel">

									<div class="card">
										<div class="card-header">

											<h5 class="card-title mb-0">Informações do Trabalhador</h5>
										</div>
										<div class="card-body">
											
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Nome Completo</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['nome']; ?></p>
													</div>
													
												</div>
												<hr>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Bilhete de Identificação</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['bi']; ?></p>
													</div>
													
												</div>
												<hr>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Provincia</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['provincia']; ?></p>
													</div>
													
												</div>
												<hr>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Cidade</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['cidade']; ?></p>
													</div>
													
												</div>
												<hr>
												<div class="row">
												
													<div class="mb-3 col-md-3">
														<label class="form-label" for="inputFirstName">Endereço</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['endereco']; ?></p>
													</div>
													
												
													
													<div class="mb-3 col-md-3">
														<label class="form-label" for="inputFirstName">Telefone</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['telefone']; ?></p>
													</div>
													
												
													
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Nacionalidade</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['nacionalidade']; ?></p>
													</div>
													
												
												</div>
												<hr>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Data Nascimento</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['datanascimento']; ?></p>
													</div>
													
												</div>
												
											

										</div>
									</div>

									<div class="card">
										<div class="card-header">

											<h5 class="card-title mb-0">Informações Profissionais</h5>
										</div>
										<div class="card-body">
											
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Cargo</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['cargo']; ?></p>
													</div>
													
												</div>
												<hr>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Data de Admissão</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['dataadmissao']; ?></p>
													</div>
													
												</div>
												<hr>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Nível Acádemico</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['nivelacademico']; ?></p>
													</div>
													
												</div>
												<hr>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Tipo de Contrato</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['tipodecontrato']; ?></p>
													</div>
													
												</div>
												<hr>
											

												<div class="row">
												
													<div class="mb-3 col-md-3">
														<label class="form-label" for="inputFirstName">Salário Base</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['salariobase']; ?></p>
													</div>
													
												
													
													<div class="mb-3 col-md-3">
														<label class="form-label" for="inputFirstName">Subsidio</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['subsidio']; ?></p>
													</div>
													
												
													
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Valor de Meta Mensal</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['valormetamensal']; ?></p>
													</div>
													
												
												</div>
												<hr>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Numero de INSS</label>
														<p id="inputFirstName" style="font-weight: bold; font-size:large"><?php echo $res_1['numeroinss']; ?></p>
													</div>
													
												</div>
												
											

										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="password" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Password</h5>

											<form>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordCurrent">Current password</label>
													<input type="password" class="form-control" id="inputPasswordCurrent">
													
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew">New password</label>
													<input type="password" class="form-control" id="inputPasswordNew">
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew2">Verify password</label>
													<input type="password" class="form-control" id="inputPasswordNew2">
												</div>
												<button type="submit" class="btn btn-primary">Save changes</button>
											</form>

										</div>
									</div>
								</div>


								<div class="tab-pane fade" id="docs" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Documentos Submetidos</h5>

											
												<div class="mb-3">
													<label class="form-label" for="inputPasswordCurrent">Current password</label>
													<input type="password" class="form-control" id="inputPasswordCurrent">
													<small><a href="#">Forgot your password?</a></small>
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew">New password</label>
													<input type="password" class="form-control" id="inputPasswordNew">
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew2">Verify password</label>
													<input type="password" class="form-control" id="inputPasswordNew2">
												</div>
												<button type="submit" class="btn btn-primary">Save changes</button>
										

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<?php }}?>

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
                <script src="js/app.js"></script>
			</footer>
        </div>
        

        <?php include 'layout/footer.php';?>

<?php include 'layout/header.php';?>
<?php $page = 'orcamento'; ?>
<?php include 'layout/sidebar.php';?>



		<div class="main">
		<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
		</a>
		<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" name="txtpesquisar" class="form-control" placeholder="Procurar…" aria-label="Search">
						<button class="btn" name="buttonPesquisar" type="submit">
              <i class="align-middle" data-feather="search"></i>
            </button>
					</div>
				</form>

			

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

					<h1 class="h3 mb-3">Orçamentos</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									

								<br>


										<div class="row">
										<div class="col-sm-12">
										<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Novo </button>

										</div>

										
										</div>


										<div class="content">
										<div class="row">
											<div class="col-md-12">
											<div class="card">
												<div class="card-header">
												<h4 class="card-title"> Abrir Orçamentos</h4>
												</div>
												<div class="card-body">
												<div class="table-responsive">



												<!--LISTAR TODOS OS Funcionarios-->
												<?php

												if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar']!=''){
													$data = $_GET['txtpesquisar'] . '%';
													$queryTabela = "SELECT * FROM `orcamentos` where data_abertura = $data order by id asc";
												}else{
												$queryTabela = "SELECT * FROM `orcamentos` where data_abertura = curDate() order by id asc";
												}
												$resultTabela =   mysqli_query($conexao, $queryTabela);
												//$dado   =   mysqli_fetch_array($result);
												$rowTabela = mysqli_num_rows($resultTabela);
												echo"Numero de Registros: $rowTabela";
												if($rowTabela < 0){
													echo"<h3>Nao existem dados</h3>";
													
												}else{
													?>
												
													<table class="table">
													<thead class=" text-primary">
														
														<th>
														Cliente
														</th>
														<th>
														Tecnico
														</th>
														<th>
														Produto
														</th>
														<th>
														Valor Total
														</th>
														<th>
														Status
														</th>
														<th>
														Ações
														</th>
													</thead>
													<tbody>
														
														<?php

														while($res_1 = mysqli_fetch_array($resultTabela)){
															$id = $res_1["id"];
															$cliente  =  $res_1["cliente"];
															$tecnico  =  $res_1["tecnico"];
															$produto  =  $res_1["produto"];
															$valor_total  =  $res_1["valor_total"];
															$status  =  $res_1["status"];
															

															?>

															<tr>
																<td><?php echo $cliente; ?></td>
																<td><?php echo $tecnico; ?></td>
																<td><?php echo $produto; ?></td>
																<td><?php echo $valor_total; ?></td>
																<td><?php echo $status; ?></td>
																
																<td>
																<a class="btn btn-info" href="
																pages-abrir_orcamentos.php?func=edita&id=<?php
																echo $id;
																?>
																">
																<i class="align-middle" data-feather="edit-2"></i>
																</a>
																<a class="btn btn-danger" href="
																pages-abrir_orcamentos.php?func=deleta&id=<?php
																echo $id;
																?>
																">
																<i class="align-middle" data-feather="trash"></i>
																</a>
																</td>
															</tr>

															<?php
																}
															?>
														
														
														

													</tbody>
													</table>
													<?php
													}
													?>
												</div>
												</div>
											</div>
											</div>

										</div>




										<!-- Modal -->
										<div id="modalExemplo" class="modal fade" role="dialog">
										<div class="modal-dialog">
										<!-- Modal content-->

										<div class="modal-content">
										<div class="modal-header">
											
											<h4 class="modal-title">Funcionarios</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<form method="POST">
										<div class="modal-body">
											<div class="form-group">
											<label for="id_produto">Nome</label>
											<input type="text" class="form-control mr-2" id="txtnome" name="txtnome" placeholder="Nome" required>
											</div>
											<div class="form-group">
											<label for="fornecedor">BI</label>
												<input type="text" class="form-control mr-2" id="txtbi" name="txtbi" placeholder="Bilhete Identidade" required>
											</div>
											<div class="form-group">
											<label for="id_produto">Telefone</label>
											<input type="text" class="form-control mr-2" id="txttelefone" name="txttelefone" placeholder="Telefone" required>
											</div>
											<div class="form-group">
											<label for="quantidade">Endereço</label>
											<input type="text" class="form-control mr-2" id="txtendereco" name="txtendereco" placeholder="Endereço" required>
											</div>
											<div class="form-group">
											<label for="fornecedor">Cargo</label>
											<select class="form-control mr-2" id="category" name="cargo">
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
												
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary mb-3" name="button">Salvar </button>


											<button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
											</form>

										</div>
										</div>
										</div>
										</div>   




								</div>
								<div class="card-body">
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
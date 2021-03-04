
<?php include 'layout/header.php';?>
<?php include 'layout/sidebar.php';?>





<?php include 'layout/footer.php';?>


















<?php
session_start();
  include('conexao.php');
  include('verificar_login.php');


  ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Sistema de Gestao Inovatis">
	<meta name="author" content="Inovatis">
	

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Admin - InoGest</title>

	<link href="css/app.css" rel="stylesheet">
</head>





<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="indexx.php">
          			<span class="align-middle">InoGest</span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Páginas
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="indexx.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<?php 
                if($_SESSION['cargo_usuario'] == 'administrador' || $_SESSION['cargo_usuario'] == 'gerente'){
                  

                 ?>

			
					<li class="sidebar-header">
						Gerência
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-funcionarios.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Funcionários</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-usuarios.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Usuários</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-cargos.php">
              <i class="align-middle" data-feather="folder-plus"></i> <span class="align-middle">Cargos</span>
            </a>
					</li>
					<?php } ?>

					<li class="sidebar-header">
						Finanças
					</li>
					
					<?php 
                if($_SESSION['cargo_usuario'] == 'administrador' || $_SESSION['cargo_usuario'] == 'gerente'){
                  

                 ?>
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-movimentos.php">
              <i class="align-middle" data-feather="trending-up"></i> <span class="align-middle">Movimentos</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-pagamentos.php">
              <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Pagamentos</span>
            </a>
					</li>
					<?php } ?>
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-gastos.php">
              <i class="align-middle" data-feather="trending-down"></i> <span class="align-middle">Despesas</span>
            </a>
					</li>

					

					<li class="sidebar-header">
						Plataformas
					</li>

					<li class="sidebar-item">
						<a data-target="#ui" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">EDC MZ</span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						
						<li class="sidebar-item">
						<a class="sidebar-link" href="pages-usuarios-edc.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Usuarios EDC</span>
            </a>
						</li>

						<li class="sidebar-item">
						<a class="sidebar-link" href="pages-msc.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Registrar MSC</span>
            </a>
						</li>

						<li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.php">
              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Fechar Turno EDC</span>
            </a>
						</li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#uii" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">ClickClick</span>
            </a>
						<ul id="uii" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						
						<li class="sidebar-item">
						<a class="sidebar-link" href="pages-clicktuk.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Motoristas ClickTuk</span>
            </a>
						</li>
					

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-clicktaxi.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Motoristas ClickTaxi</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-praca.php">
              <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Praças</span>
            </a>
					</li>
							
						</ul>
					</li>
				</ul>

				
			</div>
		</nav>

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
								<!--
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>-->
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
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
								<!--
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>-->
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="img/logo.jpeg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark"> <?php echo $_SESSION['nome_usuario']; ?> </span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<!--<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
							
							-->
								<a class="dropdown-item" href="indexx.php"><i class="align-middle mr-1" data-feather="pie-chart"></i> Painel Analitico</a>
								
								<a class="dropdown-item" href="logout.php">Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Dashboard Análitico <?php echo date('d-m-Y'); ?></strong></h3>
						</div>

					</div>
					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Recursos Humanos</strong></h3>
							<small>Contratos Vigentes</small>
						</div>

					</div>
					<div class="row">
						
							<div class="w-100">
								<div class="row">
									<div class="mb-2 col-md-2">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Indeterminado</h5>
												<?php
													
													$queryTabela = "SELECT * FROM `funcionarios` where tipodecontrato = 'Contrato Indeterminado'";
													
													$resultTabela =   mysqli_query($conexao, $queryTabela);
													
													$rowTabela = mysqli_num_rows($resultTabela);
													echo"<h1> $rowTabela </h1>";
												?>
												

											</div>
										</div>
										
									</div>

									<div class="mb-2 col-md-2">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Tempo Certo</h5>
												<?php
													
													$queryTabela = "SELECT * FROM `funcionarios` where tipodecontrato = 'Contrato tempo certo'";
													
													$resultTabela =   mysqli_query($conexao, $queryTabela);
													
													$rowTabela = mysqli_num_rows($resultTabela);
													echo"<h1> $rowTabela </h1>";
												?>
												

											</div>
										</div>
										
									</div>

									<div class="mb-2 col-md-2">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Estágio</h5>
												<?php
													$queryTabela = "SELECT * FROM `funcionarios` where tipodecontrato = 'Contrato de Estágio'";
													
													$resultTabela =   mysqli_query($conexao, $queryTabela);
													
													$rowTabela = mysqli_num_rows($resultTabela);
													echo"<h1> $rowTabela </h1>";
												?>
												

											</div>
										</div>
										
									</div>

									<div class="mb-2 col-md-2">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Eventual</h5>
												<?php
												$queryTabela = "SELECT * FROM `funcionarios` where tipodecontrato = 'Eventual'";
													
												$resultTabela =   mysqli_query($conexao, $queryTabela);
												
												$rowTabela = mysqli_num_rows($resultTabela);
												echo"<h1> $rowTabela </h1>";
												?>
												

											</div>
										</div>
										
									</div>

									
									
								</div>
							
						</div>

						
					</div>


					<div class="row mb-2 mb-xl-3">
						

					</div>
					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Plataformas EDC & ClickClick</strong></h3>
						</div>

					</div>
					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Motoristas ClickTuk: Total</h5>
												<?php
					$currentdate = date("Y-m-d");
                    if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar']!=''){
                      $nome = $_GET['txtpesquisar'] . '%';
                      $queryTabela = "SELECT * FROM `motoristaclicktuk` where nome LIKE '$nome' order by nome asc";
                    }else{
                    $queryTabela = "SELECT * FROM `motoristaclicktuk` order by nome asc";
                    }
                    $resultTabela =   mysqli_query($conexao, $queryTabela);
                    //$dado   =   mysqli_fetch_array($result);
                    $rowTabela = mysqli_num_rows($resultTabela);
                    echo"<h1> $rowTabela </h1>";
                      ?>
												<!--
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 3.65% </span>
													<span class="text-muted">Desde semana passada</span>
												</div>
				-->

											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Motoristas ClickTaxi: Total</h5>
												<?php

                    if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar']!=''){
                      $nome = $_GET['txtpesquisar'] . '%';
                      $queryTabela = "SELECT * FROM `motoristaclicktaxi` where nome LIKE '$nome' order by nome asc";
                    }else{
					$queryTabela = "SELECT * FROM `motoristaclicktaxi` order by nome asc";
					$queryProd = "SELECT * FROM `usuarioedc` where (categoria LIKE 'Profissional' and datar LIKE '$currentdate')";
					$queryLPd = "SELECT * FROM `usuarioedc` where (categoria LIKE 'Ligeiros e Pesados' and datar LIKE '$currentdate')";
					$queryProt = "SELECT * FROM `usuarioedc` where categoria LIKE 'Profissional'";
					$queryLPt = "SELECT * FROM `usuarioedc` where categoria LIKE 'Ligeiros e Pesados'";
					$queryEDC = "SELECT * FROM `usuarioedc`";

					$queryturno = "SELECT * FROM `turnos` where datar LIKE '$currentdate'";
                    }
					$resultTabela =   mysqli_query($conexao, $queryTabela);
					$resultEDC =   mysqli_query($conexao, $queryEDC);

					$resultProd =   mysqli_query($conexao, $queryProd);
					$resultLPd =   mysqli_query($conexao, $queryLPd);

					$resultProt =   mysqli_query($conexao, $queryProt);
					$resultLPt =   mysqli_query($conexao, $queryLPt);

					$rowPro = mysqli_num_rows($resultProd);
					$rowLP = mysqli_num_rows($resultLPd);
					$rowProt = mysqli_num_rows($resultProt);
					$rowLPt = mysqli_num_rows($resultLPt);
					$rowEDC = mysqli_num_rows($resultEDC);

					  
                   
                    $rowTabela = mysqli_num_rows($resultTabela);
                    echo"<h1> $rowTabela </h1>";
					  ?>
					  							<!--
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
													<span class="text-muted">Desde semana passada</span>
												</div>
												-->
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">EDC LP: <?php echo date('d-m-Y'); ?></h5>
												<h1 class="mt-1 mb-3"><?php echo $rowLP ?></h1>
												
												
												<div class="mb-1">
													<span class="text-muted">Turno Dia:</span></br>
													<span class="text-muted">Turno Noite:</span>
												</div>
				
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">EDC PRO: <?php echo date('d-m-Y'); ?></h5>
												<h1 class="mt-1 mb-3"><?php echo $rowPro ?></h1>
												<!--
												<div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Since last week</span>
												</div>
				-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Usuários EDC Registrados no InoGest</h5>
								</div>
								<div class="card-body py-3">
								<div class="chart chart-sm">
									
								<div class="row">
								<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">EDC Ligeiros & Pesados</h5>
												<h1 class="mt-1 mb-3"><?php echo $rowLPt ?></h1>
												<!--
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
				-->
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">EDC Profissional</h5>
												<h1 class="mt-1 mb-3"><?php echo $rowProt ?></h1>
												<!--
												<div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Since last week</span>
												</div>
				-->
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">EDC MZ TOTAL</h5>
												<h1 class="mt-1 mb-3"><?php echo $rowEDC ?></h1>
												<!--
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
				-->
											</div>
										</div>
										
									</div>
									
								</div>
								</div>
								</div>
							</div>
						</div>
					</div>
					<!-- 
					<div class="row">

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Movement</h5>
								</div>
								<div class="card-body py-3">
								<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>-->
					<div class="row">
					<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Registros EDC</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Browser Usage</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Chrome</td>
													<td class="text-right">4306</td>
												</tr>
												<tr>
													<td>Firefox</td>
													<td class="text-right">3801</td>
												</tr>
												<tr>
													<td>IE</td>
													<td class="text-right">1689</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Localização das Praças</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendario</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Projectos</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Data Inicio</th>
											<th class="d-none d-xl-table-cell">Data Termino</th>
											<th>Estado</th>
											<th class="d-none d-md-table-cell">Responsável</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Sistema InoGest</td>
											<td class="d-none d-xl-table-cell">01/12/2020</td>
											<td class="d-none d-xl-table-cell">29/01/2021</td>
											<td><span class="badge bg-success">Feito</span></td>
											<td class="d-none d-md-table-cell">Kelven</td>
										</tr>
										<tr>
											<td>Sistema Agendamento</td>
											<td class="d-none d-xl-table-cell">01/12/2021</td>
											<td class="d-none d-xl-table-cell">29/01/2021</td>
											<td><span class="badge bg-danger">Feito</span></td>
											<td class="d-none d-md-table-cell">Ecio</td>
										</tr>
									<!--
										<tr>
											<td>Project Hades</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Nitro</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Phoenix</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project X</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Romeo</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Christina Mason</td>
										</tr>
										<tr>
											<td>Project Wombat</td>
											<td class="d-none d-xl-table-cell">01/01/2020</td>
											<td class="d-none d-xl-table-cell">31/06/2020</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>-->
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
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
			</footer>
		
			<script src="js/app.js"></script>
			<script>
								document.addEventListener("DOMContentLoaded", function() {
									var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
									var gradient = ctx.createLinearGradient(0, 0, 0, 225);
									gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
									gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
									// Line chart
									new Chart(document.getElementById("chartjs-dashboard-line"), {
										type: "line",
										data: {
											labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
											datasets: [{
												label: "Sales ($)",
												fill: true,
												backgroundColor: gradient,
												borderColor: window.theme.primary,
												data: [
													2115,
													1562,
													1584,
													1892,
													1587,
													1923,
													2566,
													2448,
													2805,
													3438,
													2917,
													3327
												]
											}]
										},
										options: {
											maintainAspectRatio: false,
											legend: {
												display: false
											},
											tooltips: {
												intersect: false
											},
											hover: {
												intersect: true
											},
											plugins: {
												filler: {
													propagate: false
												}
											},
											scales: {
												xAxes: [{
													reverse: true,
													gridLines: {
														color: "rgba(0,0,0,0.0)"
													}
												}],
												yAxes: [{
													ticks: {
														stepSize: 1000
													},
													display: true,
													borderDash: [3, 3],
													gridLines: {
														color: "rgba(0,0,0,0.0)"
													}
												}]
											}
										}
									});
								});
							</script>
							<script>
								document.addEventListener("DOMContentLoaded", function() {
									// Pie chart
									new Chart(document.getElementById("chartjs-dashboard-pie"), {
										type: "pie",
										data: {
											labels: ["Chrome", "Firefox", "IE"],
											datasets: [{
												data: [4306, 3801, 1689],
												backgroundColor: [
													window.theme.primary,
													window.theme.warning,
													window.theme.danger
												],
												borderWidth: 5
											}]
										},
										options: {
											responsive: !window.MSInputMethodContext,
											maintainAspectRatio: false,
											legend: {
												display: false
											},
											cutoutPercentage: 75
										}
									});
								});
							</script>

							<?php
								$ano = '2020';//date('Y');
								//$query1 = "SELECT * FROM `usuarioedc` where ( MONTH(datar)='10' and YEAR(datar)= '$ano') " ;
								//$result1 =   mysqli_query($conexao, $query1);
								//$row1 = mysqli_num_rows($result1);
								//echo 'Row'. $row1.$ano;
								$dados_graficobarra = '';
								for ($x = 1; $x <= 12; $x++) {
									//echo "The number is: $x <br>";
									$query1 = "SELECT * FROM `usuarioedc` where ( MONTH(datar)='$x' and YEAR(datar)= '$ano') " ;
									$result1 =   mysqli_query($conexao, $query1);
									$row1 = mysqli_num_rows($result1);
									$dados_graficobarra.="{$row1},";
									
									//echo 'Row'. $row1.$ano.'<br>';
								}
								//echo $dados_graficobarra;
							
							?>
							<script>
								document.addEventListener("DOMContentLoaded", function() {
									// Bar chart
									new Chart(document.getElementById("chartjs-dashboard-bar"), {
										type: "bar",
										data: {
											labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
											datasets: [{
												label: "This year",
												backgroundColor: window.theme.primary,
												borderColor: window.theme.primary,
												hoverBackgroundColor: window.theme.primary,
												hoverBorderColor: window.theme.primary,
												data: [<?php echo $dados_graficobarra ?>],
												barPercentage: .75,
												categoryPercentage: .5
											}]
										},
										options: {
											maintainAspectRatio: false,
											legend: {
												display: false
											},
											scales: {
												yAxes: [{
													gridLines: {
														display: false
													},
													stacked: false,
													ticks: {
														stepSize: 20
													}
												}],
												xAxes: [{
													stacked: false,
													gridLines: {
														color: "transparent"
													}
												}]
											}
										}
									});
								});
							</script>
							<script>
								document.addEventListener("DOMContentLoaded", function() {
									var markers = [{
											coords: [-19.829244, 34.853260],
											name: "Mexicana"
										},
										{
											coords: [-19.829244, 34.853843],
											name: "HCB Macuti"
										},
										{
											coords: [-19.829144, 34.183260],
											name: "Shoprite"
										},
										{
											coords: [-19.821244, 34.890210],
											name: "Sunlight"
										},
										{
											coords: [-19.827244, 34.898320],
											name: "Munhava Central"
										},
										{
											coords: [-19.825244, 34.874922],
											name: "Manga"
										},
										{
											coords: [-19.825244, 34.782934],
											name: "Pioneiors"
										},
										{
											coords: [-19.829344, 34.673922],
											name: "Manganhe"
										},
										{
											coords: [-19.829444, 34.932022],
											name: "Matacuane"
										},
										{
											coords: [-19.821244, 34.853330],
											name: "Cafenicola "
										}
									];
									var map = new JsVectorMap({
										map: "world",
										selector: "#world_map",
										zoomButtons: true,
										markers: markers,
										markerStyle: {
											initial: {
												r: 9,
												strokeWidth: 7,
												stokeOpacity: .4,
												fill: window.theme.primary
											},
											hover: {
												fill: window.theme.primary,
												stroke: window.theme.primary
											}
										}
									});
									window.addEventListener("resize", () => {
										map.updateSize();
									});
								});
							</script>
							<script>
								document.addEventListener("DOMContentLoaded", function() {
									document.getElementById("datetimepicker-dashboard").flatpickr({
										inline: true,
										prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
										nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
									});
								});
							</script>


		</div>
	</div>

	

</body>

</html>

<?php include 'layout/header.php';?>
<?php $page = 'dashboard3'; ?>
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
									<div class="col-sm-3">
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

									<div class="col-sm-3">
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

									<div class="col-sm-3">
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

									<div class="col-sm-3">
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

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-6 d-flex order-2 order-xxl-3">
						<?php 

								$query1 = "SELECT cargo, count(cargo) as total FROM `cargos` group by cargo";


								$result1 =   mysqli_query($conexao, $query1);

									
								$row1 = mysqli_num_rows($result1);

								$cargo_graficopie = "";
								$num_graficopie = "";

								while($res_1 = mysqli_fetch_array($result1)){
									$cargo_graficopie.= '"'.$res_1["cargo"].'"'.',';
									$num_graficopie.=$res_1["total"].',';
								}




						?>
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Cargos Registrados</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-md-6 col-xxl-6 d-flex order-1 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Cargos Registrados</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-piee"></canvas>
											</div>
										</div>

										
									</div>
								</div>
							</div>
						</div>
					</div>


					
				
					
					

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Funcionarios</h5>
								</div>
								<?php
									$querydash = "SELECT * FROM `funcionarios` order by nome asc";
									$resultdash =   mysqli_query($conexao, $querydash);
								?>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Nome</th>
											<th class="d-none d-xl-table-cell">Cargo</th>
											<th class="d-none d-xl-table-cell">Data Admissão</th>
											
										</tr>
									</thead>
									<tbody>
									<?php

										while($res_1 = mysqli_fetch_array($resultdash)){
											$id = $res_1["id"];
											$nome  =  $res_1["nome"];
										
											$cargo  =  $res_1["cargo"];
											
											$data  =  $res_1["dataadmissao"];
											$data2 = implode('/',array_reverse(explode
											('-', $data)));

											?>
										<tr>
											<td><?php echo $nome; ?></td>
											<td class="d-none d-xl-table-cell"><?php echo $cargo; ?></td>
											<td class="d-none d-xl-table-cell"><?php echo $data; ?></td>
											
										</tr>
										<?php }?>
								
									</tbody>
								</table>
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
											labels: [<?php echo $cargo_graficopie ?>],
											datasets: [{
												data: [<?php echo $num_graficopie ?>],
												backgroundColor: [
													window.theme.primary,
													window.theme.warning,
													window.theme.danger,
													'rgba(255, 99, 132, 1)',
														'rgba(54, 162, 235, 1)',
														'rgba(255, 206, 86, 1)',
														'rgba(75, 192, 192, 1)',
														'rgba(153, 102, 255, 1)',
														'rgba(255, 159, 64, 1)',
														'rgba(230, 111, 120, 1)',
														'rgba(84, 222, 94, 1)',
												],
												borderWidth: 5
											}]
										},
										options: {
											responsive: !window.MSInputMethodContext,
											maintainAspectRatio: true,
											legend: {
												display: true
											},
											cutoutPercentage: 75
										}
									});
								});
							</script>

							<script>
								document.addEventListener("DOMContentLoaded", function() {
									// Pie chart
									new Chart(document.getElementById("chartjs-dashboard-piee"), {
										type: "pie",
										data: {
											labels: [<?php echo $cargo_graficopie ?>],
											datasets: [{
												data: [<?php echo $num_graficopie ?>],
												backgroundColor: [
													window.theme.primary,
													window.theme.warning,
													window.theme.danger,
													'rgba(255, 99, 132, 1)',
														'rgba(54, 162, 235, 1)',
														'rgba(255, 206, 86, 1)',
														'rgba(75, 192, 192, 1)',
														'rgba(153, 102, 255, 1)',
														'rgba(255, 159, 64, 1)',
														'rgba(230, 111, 120, 1)',
														'rgba(84, 222, 94, 1)',
												],
												borderWidth: 5
											}]
										},
										options: {
											responsive: !window.MSInputMethodContext,
											maintainAspectRatio: true,
											legend: {
												display: true
											},
											cutoutPercentage: 75
										}
									});
								});
							</script>

							<?php
								$ano = date('Y');
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
			</footer>
		
		


		</div>

		<?php include 'layout/footer.php';?>
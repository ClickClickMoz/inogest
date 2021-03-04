
<?php include 'layout/header.php';?>
<?php $page = 'dashboard1'; 
$currentdate = date("Y-m-d");
?>
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
							<h3><strong>Dashboard Operacional <?php echo date('d-m-Y'); ?></strong></h3>
						</div>

					</div>
					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>EDC MZ</strong></h3>
							<small>Estatistica</small>
						</div>

					</div>

					
					<div class="row">
				
							<div class="w-100">
								<div class="row">
									
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-sm-6">
															<h5 class="card-title mb-4">Turno Dia</h5>
														<?php
															
															$queryTabela = "SELECT * FROM `usuarioedc` where (turno LIKE 'Turno Dia' and datar LIKE '$currentdate')";
															$queryProN = "SELECT * FROM `usuarioedc` where (turno LIKE 'Turno Dia' and datar LIKE '$currentdate') and (categoria LIKE 'Profissional')";
															$queryLPN = "SELECT * FROM `usuarioedc` where (turno LIKE 'Turno Dia' and datar LIKE '$currentdate') and (categoria LIKE 'Ligeiros e Pesados')";
															
															$resultTabela =   mysqli_query($conexao, $queryTabela);
															$resultPROD =   mysqli_query($conexao, $queryProN);
															$resultLPD =   mysqli_query($conexao, $queryLPN);

															$rowTabela = mysqli_num_rows($resultTabela);
															$rowPROD = mysqli_num_rows($resultPROD);
															$rowLPD = mysqli_num_rows($resultLPD);
															echo"<h1> $rowTabela </h1>";
														?>
													</div>
													<div class="col-sm-6">
															<h4 class="card-title mb-4">LP: <?php echo $rowLPD ?></h4>
															
															<h4 class="card-title mb-4">PRO: <?php echo $rowPROD ?></h4>
													</div>
												</div>
												

											</div>
											
										</div>
										
									</div>

									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
											<div class="row">
													<div class="col-sm-6">
												<h5 class="card-title mb-4">Turno Noite</h5>
												<?php
													
													$queryTabela = "SELECT * FROM `usuarioedc` where (turno LIKE 'Turno Noite' and datar LIKE '$currentdate')";
													$queryProN = "SELECT * FROM `usuarioedc` where (turno LIKE 'Turno Noite' and datar LIKE '$currentdate') and (categoria LIKE 'Profissional')";
													$queryLPN = "SELECT * FROM `usuarioedc` where (turno LIKE 'Turno Noite' and datar LIKE '$currentdate') and (categoria LIKE 'Ligeiros e Pesados')";
													
													$resultTabela =   mysqli_query($conexao, $queryTabela);
													$resultPRON =   mysqli_query($conexao, $queryProN);
													$resultLPN =   mysqli_query($conexao, $queryLPN);
													
													$rowTabela = mysqli_num_rows($resultTabela);
													$rowPRON = mysqli_num_rows($resultPRON);
													$rowLPN = mysqli_num_rows($resultLPN);
													echo"<h1> $rowTabela </h1>";
												?>
												</div>
													<div class="col-sm-6">
															<h4 class="card-title mb-4">LP: <?php echo $rowLPN ?></h4>
															
															<h4 class="card-title mb-4">PRO: <?php echo $rowPRON ?></h4>
													</div>
													</div>
											</div>
										</div>
										
									</div>

									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
											<div class="row">
													<div class="col-sm-6">
												<h5 class="card-title mb-4">Total Turnos</h5>
												<?php
													$queryTabela = "SELECT * FROM `usuarioedc` where datar LIKE '$currentdate'";
													$queryProd = "SELECT * FROM `usuarioedc` where (categoria LIKE 'Profissional' and datar LIKE '$currentdate')";
													$queryLPd = "SELECT * FROM `usuarioedc` where (categoria LIKE 'Ligeiros e Pesados' and datar LIKE '$currentdate')";
													
													$resultTabela =   mysqli_query($conexao, $queryTabela);
													$resultProd =   mysqli_query($conexao, $queryProd);
													$resultLPd =   mysqli_query($conexao, $queryLPd);

													$rowTabela = mysqli_num_rows($resultTabela);
													$rowPro = mysqli_num_rows($resultProd);
													$rowLP = mysqli_num_rows($resultLPd);

													echo"<h1> $rowTabela </h1>";
												?>
												</div>
													<div class="col-sm-6">
															<h4 class="card-title mb-4">LP: <?php echo $rowLP ?></h4>
															
															<h4 class="card-title mb-4">PRO: <?php echo $rowPro ?></h4>
													</div>
													</div>
												

											</div>
										</div>
										
									</div>

									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
											<div class="row">
													<div class="col-sm-6">
												<h5 class="card-title mb-4">Total Usuarios</h5>
												<?php
												$queryTabela = "SELECT * FROM `usuarioedc`";
												$queryProt = "SELECT * FROM `usuarioedc` where categoria LIKE 'Profissional'";
												$queryLPt = "SELECT * FROM `usuarioedc` where categoria LIKE 'Ligeiros e Pesados'";
													
												$resultTabela =   mysqli_query($conexao, $queryTabela);
												$resultProt =   mysqli_query($conexao, $queryProt);
												$resultLPt =   mysqli_query($conexao, $queryLPt);
												
												$rowTabela = mysqli_num_rows($resultTabela);
												$rowProt = mysqli_num_rows($resultProt);
												$rowLPt = mysqli_num_rows($resultLPt);

												echo"<h1> $rowTabela </h1>";
												?>
													</div>
													<div class="col-sm-6">
															<h4 class="card-title mb-4">LP: <?php echo $rowLPt?></h4>
															
															<h4 class="card-title mb-4">PRO: <?php echo $rowProt?></h4>
													</div>
													</div>
												

											</div>
										</div>
										
									</div>

									
									
								</div>
							
						</div>
						
						
					</div>


				
				



					
					<div class="row">
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">MSC's</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>
										<?php 

											$query1 = "SELECT * FROM `msc` where motivo LIKE 'Como fazer o pagamento'";
											$query2 = "SELECT * FROM `msc` where motivo LIKE 'Não sabe activar o aplicativo'";
											$query3 = "SELECT * FROM `msc` where motivo LIKE 'Não aceita activar o aplicativo'";
											$query4 = "SELECT * FROM `msc` where motivo LIKE 'Subsrição bloqueada antes de 30 dias'";
											$query5 = "SELECT * FROM `msc` where motivo LIKE 'Não consegue aceder ao aplicativo'";
											$query6 = "SELECT * FROM `msc` where motivo LIKE 'Codigo usado ou inválido'";

											$result1 =   mysqli_query($conexao, $query1);
											$result2 =   mysqli_query($conexao, $query2);
											$result3 =   mysqli_query($conexao, $query3);
											$result4 =   mysqli_query($conexao, $query4);
											$result5 =   mysqli_query($conexao, $query5);
											$result6 =   mysqli_query($conexao, $query6);
												
											$row1 = mysqli_num_rows($result1);
											$row2 = mysqli_num_rows($result2);
											$row3 = mysqli_num_rows($result3);
											$row4 = mysqli_num_rows($result4);
											$row5 = mysqli_num_rows($result5);
											$row6 = mysqli_num_rows($result6);

											$dados_graficopie = "$row1,$row2,$row3,$row4,$row5,$row6";
											

										?>
										<table class="table">
											<tbody>
												<tr>
													<td style="color: rgba(255, 99, 132, 1);">Como fazer o pagamento</td>
													<td class="text-right"><?php echo $row1; ?></td>
												</tr>
												<tr>
													<td style="color:rgba(54, 162, 235, 1);">Não sabe activar o aplicativo</td>
													<td class="text-right"><?php echo $row2; ?></td>
												</tr>
												<tr>
													<td style="color:rgba(255, 206, 86, 1);">Não aceita activar o aplicativo</td>
													<td class="text-right"><?php echo $row3; ?></td>
												</tr>
												<tr>
													<td style="color:rgba(75, 192, 192, 1);">Subsrição bloqueada antes de 30 dias</td>
													<td class="text-right"><?php echo $row4; ?></td>
												</tr>
												<tr>
													<td style="color:rgba(153, 102, 255, 1);">Não consegue aceder ao aplicativo</td>
													<td class="text-right"><?php echo $row5; ?></td>
												</tr>
												<tr>
													<td style="color:rgba(255, 159, 64, 1);">Codigo usado ou inválido</td>
													<td class="text-right"><?php echo $row6; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-3 order-xxl-2">
						<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Registros EDC Mensal</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">

						<?php 

											$query1 = "SELECT provincia, count(nome) as total FROM `usuarioedc` group by provincia order by provincia desc";
									

											$result1 =   mysqli_query($conexao, $query1);
						
												
											$row1 = mysqli_num_rows($result1);
									
											$prov_graficopie = "";
											$num_graficopie = "";
											
											while($res_1 = mysqli_fetch_array($result1)){
												$prov_graficopie.= '"'.$res_1["provincia"].'"'.',';
												$num_graficopie.=$res_1["total"].',';
											}

											
											

										?>

							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Províncias</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-top w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-pie"></canvas>
											</div>
										</div>
										<!--
										<table style="height: 10;">
											<tbody>
											<?php 
												$queryPie = "SELECT provincia, count(nome) as total FROM `usuarioedc` group by provincia order by provincia desc";
												$resultPie =   mysqli_query($conexao, $queryPie);
											while($res_2 = mysqli_fetch_array($resultPie)){ 
												$var = 1;
												?>
													<tr style="height: 10;">	
													<td><?php //echo $res_2["provincia"] ?></td>
													<td class="text-right"><?php //echo $res_2["total"] ?></td>
												
													</tr>

													
											<?php } ?>
											</tbody>
										</table>-->
									</div>
								</div>
							</div>
						</div>


						
					</div>

					<div class="row">
						<?php

							$mes = date('M');
							$ano = date('Y');
							$query = "SELECT * FROM `turnos` where (YEAR(datar)= '$ano' and MONTH(datar)= '$mes')";
							$result =   mysqli_query($conexao, $queryPie);
						?>
					<div class="col-12 col-md-12 col-xxl-12 d-flex order-3 order-xxl-2">

					<div class="month">      
						<ul>
						
							<li style="color: #000;">
							Metas<br>
							<span style="font-size:18px"><?php echo date("F"); ?></span> <br>
							<span style="font-size:12px"> <span style="color:green">Meta Atingida</span> | <span style="color:red">Meta Não Atingida</span></span>
							</li>
						</ul>
					</div>


							<ul class="days"> 
							 
							<li>1</li>
							<li>2</li>
							<li>3</li>
							<li>4</li>
							<li>5</li>
							<li>6</li>
							<li>7</li>
							<li>8</li>
							<li>9</li>
							<li><span class="active">10</span></li>
							<li>11</li>
							<li>12</li>
							<li>13</li>
							<li>14</li>
							<li>15</li>
							<li>16</li>
							<li>17</li>
							<li>18</li>
							<li>19</li>
							<li>20</li>
							<li>21</li>
							<li>22</li>
							<li>23</li>
							<li>24</li>
							<li>25</li>
							<li>26</li>
							<li>27</li>
							<li>28</li>
							<li>29</li>
							<li>30</li>
							<li>31</li>
							</ul>

						</div>
					</div>





					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>ClickClick</strong></h3>
							<small>Estatistica</small>
						</div>

					</div>
					<div class="row">
						<?php 
							$queryTuk = "SELECT * FROM `motoristaclicktuk`";
							$queryTaxi = "SELECT * FROM `motoristaclicktaxi`";
							$queryPracaTuk = "SELECT * FROM `pracas` where plataforma LIKE 'Click Tuk'";
							$queryPracaTaxi = "SELECT * FROM `pracas` where plataforma LIKE 'Click Taxi'";

							$resultTuk =   mysqli_query($conexao, $queryTuk);
							$resultTaxi =   mysqli_query($conexao, $queryTaxi);
							$resultTukpraca =   mysqli_query($conexao, $queryPracaTuk);
							$resultTaxipraca =   mysqli_query($conexao, $queryPracaTaxi);

							$rowTuk = mysqli_num_rows($resultTuk);
							$rowTaxi  = mysqli_num_rows($resultTaxi);
							$rowTukpraca  = mysqli_num_rows($resultTukpraca);
							$rowTaxipraca  = mysqli_num_rows($resultTaxipraca);
							
						?>



				
							<div class="w-100">
								<div class="row">
									
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Motoristas ClickTaxi</h5>
												<?php echo"<h1>$rowTaxi</h1>" ?>
												

											</div>
										</div>
										
									</div>

									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Motoristas ClickTuk</h5>
												<?php echo"<h1>$rowTuk</h1>" ?>
												

											</div>
										</div>
										
									</div>

									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Praças ClickTaxi</h5>
												<?php echo"<h1>$rowTaxipraca</h1>" ?>
												

											</div>
										</div>
										
									</div>

									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Praças ClickTuk</h5>
												<?php echo"<h1>$rowTukpraca</h1>" ?>
												

											</div>
										</div>
										
									</div>

									
									
								</div>
							
						</div>
						
						
					</div>
					
				
					<div class="row">
					<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							
						</div>
					</div>

					<div class="row">
						<!--
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
						</div>-->
						<div class="col-12 col-md-12 col-xxl-12 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Localização das Praças</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
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
								
									</tbody>
								</table>
							</div>
						</div>
						<!--
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
						</div> -->
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
											labels: ["Como fazer pagamento", "Não sabe activar o aplicativo", "Não aceita activar o aplicativo","Subscrição bloqueada antes 30 dias","Não consegue aceder o aplicativo","Código usado ou Inválido"],
											datasets: [{
												data: [<?php echo $dados_graficopie ?>],
												backgroundColor: [
													'rgba(255, 99, 132, 1)',
													'rgba(54, 162, 235, 1)',
													'rgba(255, 206, 86, 1)',
													'rgba(75, 192, 192, 1)',
													'rgba(153, 102, 255, 1)',
													'rgba(255, 159, 64, 1)'
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
										// Pie chart
										new Chart(document.getElementById("chartjs-pie"), {
											type: "pie",
											data: {
												labels: [<?php echo $prov_graficopie ?>],
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
														'rgba(255, 206, 86, 1)',
														'rgba(75, 192, 192, 1)',
														'rgba(153, 102, 255, 1)',
														'rgba(255, 159, 64, 1)',
														'rgba(153, 102, 255, 1)',
														'rgba(255, 159, 64, 1)'
													],
													borderColor: "transparent"
												}]
											},
											options: {
												maintainAspectRatio: false,
												legend: {
													display: false
												}
											}
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
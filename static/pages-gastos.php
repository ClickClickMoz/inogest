
<?php include 'layout/header.php';?>
<?php $page = 'gasto'; ?>
<?php include 'layout/sidebar.php';?>


		<div class="main">
		<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
		</a>
		<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="date" name="txtpesquisar" class="form-control"  aria-label="Search">
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

					<h1 class="h3 mb-3">Gastos</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									

								<br>


										<div class="row">
										<div class="col-sm-12">
										<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Novo </button>
                                        
                                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalRelGastos">Gerar Relatório </button>

										</div>

										
										</div>


										<div class="content">
										<div class="row">
											<div class="col-md-12">
											<div class="card">
												<div class="card-header">
												<h4 class="card-title"> Tabela de Gastos</h4>
												</div>
												<div class="card-body">
												<div class="table-responsive">



												<!--LISTAR TODOS OS Funcionarios-->
												<?php

												if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
													$data = $_GET['txtpesquisar'];
													$queryTabela = "SELECT * FROM `gastos` where datar = '$data'";
												}else{
                                                   
												$queryTabela = "SELECT * FROM `gastos` where datar = curDate() order by id asc";  // MONTH(datar) = '2'
												}
												$resultTabela =   mysqli_query($conexao, $queryTabela);
												//$dado   =   mysqli_fetch_array($result);
												$rowTabela = mysqli_num_rows($resultTabela);
												echo"Numero de Registros: $rowTabela";
												if($rowTabela == ''){
													echo"<h3>Nao existem dados</h3>";
													
												}else{
													?>
												
													<table class="table">
													<thead class=" text-primary">
														
														<th>
														Valor
														</th>
														<th>
														Motivo
														</th>
														<th>
														Funcionário
														</th>
														<th>
														Data
														</th>
                                                        <th>
														Ações
														</th>
													</thead>
													<tbody>
														
														<?php

														while($res_1 = mysqli_fetch_array($resultTabela)){
															$id = $res_1["id"];
															$valor  =  $res_1["valor"];
															$motivo  =  $res_1["motivo"];
															$funcionario  =  $res_1["funcionario"];
															$data  =  $res_1["datar"];
															$data2 = implode('/',array_reverse(explode
															('-', $data)));
															

															?>

															<tr>
																<td><?php echo $valor; ?> MT</td>
																<td><?php echo $motivo; ?></td>
																<td><?php echo $funcionario; ?></td>
																<td><?php echo $data2; ?></td>
																
																
																<td>
															
																<a class="btn btn-danger" href="
																pages-gastos.php?func=deleta&id=<?php
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
											
											<h4 class="modal-title">Gastos</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<form method="POST">
										<div class="modal-body">
											<div class="form-group">
											<label for="id_produto">Valor</label>
											<input type="text" class="form-control mr-2" id="txtvalor" name="txtvalor" placeholder="Valor" required>
											</div>
											<div class="form-group">
											<label for="fornecedor">Motivo</label>
												<input type="text" class="form-control mr-2" id="txtmotivo" name="txtmotivo" placeholder="Motivo" required>
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

                                        <?php


if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
  $data = $_GET['txtpesquisar'];
   $query = "select SUM(valor) as total from gastos where datar = '$data'  order by id asc"; 
}else{
 $query = "select SUM(valor) as total from gastos where datar = curDate()  order by id asc"; 
}



$result = mysqli_query($conexao, $query);
//$dado = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

 while($res_1 = mysqli_fetch_array($result)){
  $total = $res_1['total'];

?>


<div class="row mt-3">
<div class="col-md-12">
<p align="right">Total:
<?php
if($total == '') {
echo 0;
}else{
echo $total;
}

?> MT

</p>
</div>
</div>  

<?php } ?>


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
	


	

    <!-- Modal REL GASTOS -->
    <div id="modalRelGastos" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Relatório de Gastos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
              <form method="POST" action="rel/rel_gastos_data_class.php">

            <div class="row">
                 
                <div class="col-md-6">
                  <label>Data Inicial</label>
                </div>
                 <div class="col-md-6">
                  <label>Data Final</label>
                </div>
               

            </div>

                <div class="row">
                  
                <div class="col-md-6">
                  <input name="txtdataInicial" class="form-control mt-3" type="date" placeholder="Pesquisar" aria-label="Pesquisar">
                </div>
                <div class="col-md-6">
                  <input name="txtdataFinal" class="form-control mt-3 " type="date" placeholder="Pesquisar" aria-label="Pesquisar">
                </div>
               

            </div>
          </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="buttonPesquisar">Gerar Relatorio </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
            </div>
          </div>
        </div>
      </div>    



<?php include 'layout/footer.php';?>




<?php

  if(isset($_POST['button'])){
    $valor = $_POST['txtvalor'];
    $motivo = $_POST['txtmotivo'];
    $funcionario = $_SESSION['nome_usuario'];
   



    $query = "insert into `gastos`(`valor`, `motivo`, `funcionario`, `datar`) VALUES ('$valor', '$motivo', '$funcionario',CURRENT_DATE)";
 
    $result =   mysqli_query($conexao, $query);

    //recuperar ultimo id lancado
 
    $queryId = "SELECT * from `gastos` order by id desc limit 1"; 
 
    $resultId =   mysqli_query($conexao, $queryId);
    while($res_id = mysqli_fetch_array($resultId)){
        $id_gasto = $res_id['id'];
    }


    //Inserir dados na tabela de movimentos
    $querymov = "insert into `movimentos`(`tipo`, `movimento`, `valor`, `funcionario`,`datar`,`id_movimento` ) VALUES ('Saida', 'Gasto','$valor', '$funcionario',CURRENT_DATE,'$id_gasto')";
 
    mysqli_query($conexao, $querymov);
    
    
    if($result == ''){
      echo"<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar'); </script>";
      
    }else{
      echo"<script language='javascript'>window.alert('Salvo com Sucesso'); </script>";
      echo"<script language='javascript'>window.location='pages-gastos.php'; </script>";
    }

  }
?>

<!-- Excluir-->

<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM gastos where id = '$id'";
  mysqli_query($conexao,$query);

  $querymov = "DELETE FROM movimentos where movimento = 'Gasto' and id_movimento = '$id'";
  mysqli_query($conexao,$querymov);
  echo"<script language='javascript'>window.alert('Excluido com Sucesso'); </script>";
  echo"<script language='javascript'>window.location='pages-gastos.php'; </script>";
}

?>
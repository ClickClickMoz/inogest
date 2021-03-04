
<?php include 'layout/header.php';?>
<?php $page = 'movimento'; ?>
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

					<h1 class="h3 mb-3">Movimentos</h1>

					<div class="row">

                    <form>
                <div class="row">
					<div class="mb-1 col-md-1">
                        <select class="form-control mr-2" id="category" name="status">
                            <option value="Todos">Todas</option> 
                            <option value="Entrada">Entradas</option>
                            <option value="Saída">Saídas</option> 
                        </select>
				    </div>
                    <div class="mb-1 col-md-2">
                        <input name="dataInicial" class="form-control mr-sm-2" type="date" placeholder="Pesquisar" aria-label="Pesquisar">
				    </div>

                    <div class="mb-1 col-md-2">
                        <input name="dataFinal" class="form-control mr-sm-2" type="date" placeholder="Pesquisar" aria-label="Pesquisar">
				    </div>

                    <div class="mb-3 col-md-3">
                        <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
				    </div>
				</div>
            </form>
        
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									

								<br>


                <div class="row">
										<div class="col-sm-12">
										
                                        
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalRelMov">Gerar Relatório </button>

										</div>

										
										</div>

						


										<div class="content">
										<div class="row">
											<div class="col-md-12">
											<div class="card">
												<div class="card-header">
												<h4 class="card-title"> Tabela de Movimentos</h4>
												</div>
                                                <div class="card-body">
                    <div class="table-responsive">

                      <!--LISTAR TODOS OS ORÇAMENTOS -->

                      <?php


                        if(isset($_GET['buttonPesquisar'])){

                            $dataInicial = $_GET['dataInicial'];
                            $dataFinal = $_GET['dataFinal'];
                             $status = $_GET['status'];

                            if ($dataInicial == ''){
                              $dataInicial = Date('Y-m-d');
                            }

                            if ($dataFinal == ''){
                              $dataFinal = Date('Y-m-d');
                            }

                            if($status != 'Todos'){
                            
                             $query = "select * from movimentos where (datar >= '$dataInicial' and datar <= '$dataFinal') and tipo = '$status' order by datar asc";

                            }else{
                               $query = "select * from movimentos where datar >= '$dataInicial' and datar <= '$dataFinal' order by datar asc";
                            }
                          
                                                

                        }else{
                         $query = "select * from movimentos where datar = curDate() order by id asc"; 
                        }

                        

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                        if($row == ''){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>

                          
                      <table class="table">
                        <thead class=" text-primary">

                          <th>
                            Tipo
                          </th>
                          <th>
                            Movimento
                          </th>
                          <th>
                            Valor
                          </th>
                           <th>
                            Funcionário
                          </th>
                          
                            <th>
                            Data 
                          </th>
                          
                           
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $tipo = $res_1["tipo"];
                            $movimento = $res_1["movimento"];
                            $valor = $res_1["valor"];
                            $funcionario = $res_1["funcionario"];
                            $data = $res_1["datar"];
                           
                            $id = $res_1["id"];

                            $data2 = implode('/', array_reverse(explode('-', $data)));
                             
                           
                            $id = $res_1["id"];


                         
                            ?>

                            <tr>

                             

                              <?php
                              if($tipo == 'Entrada'){
                              ?>
                              <td><font color="green"><?php echo $tipo; ?></font></td>
                              <?php 
                              }else{
                                ?>
                              <td><font color="red"><?php echo $tipo; ?></font></td>

                               <?php 
                                }  ?>

                           
                             <td><?php echo $movimento; ?></td>

                              <?php
                              if($tipo == 'Entrada'){
                              ?>
                              <td><font color="green"><?php echo $valor; ?> MT</font></td>
                              <?php 
                              }else{
                                ?>
                              <td><font color="red"><?php echo $valor; ?> MT</font></td>

                               <?php 

                                     }

                                ?>
                              

                             <td><?php echo $funcionario; ?></td>





                            
                            
                             <td><?php echo $data2; ?></td>
                          
                             
                           
                            
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

                                        <?php
                        //TOTALIZAR OS VALORES DE ENTRADAS

                        if(isset($_GET['buttonPesquisar'])){

                            $dataInicial = $_GET['dataInicial'];
                            $dataFinal = $_GET['dataFinal'];
                             $status = $_GET['status'];

                            if ($dataInicial == ''){
                              $dataInicial = Date('Y-m-d');
                            }

                            if ($dataFinal == ''){
                              $dataFinal = Date('Y-m-d');
                            }

                            
                            
                             $query_entradas = "select SUM(valor) as total from movimentos where (datar >= '$dataInicial' and datar <= '$dataFinal') and tipo = 'Entrada' order by datar asc";

                             $query_saidas = "select SUM(valor) as total from movimentos where (datar >= '$dataInicial' and datar <= '$dataFinal') and tipo = 'Saída' order by datar asc";
                            
                          
                                                

                        }else{
                         $query_entradas = "select SUM(valor) as total from movimentos where datar = curDate() and tipo = 'Entrada' order by id asc";

                         $query_saidas = "select SUM(valor) as total from movimentos where datar = curDate() and tipo = 'Saída' order by id asc"; 
                        }

                        

                        $result_entradas = mysqli_query($conexao, $query_entradas);

                       $result_saidas = mysqli_query($conexao, $query_saidas);

                        
                           while($res_1 = mysqli_fetch_array($result_entradas)){
                            $total_entradas = $res_1["total"];


                             while($res_2 = mysqli_fetch_array($result_saidas)){
                            $total_saidas = $res_2["total"];

                        

                           ?>


             <div class="row mt-3">
              
                <div class="col-md-6">
                  <font size="3">Total Entradas : <font color="green"> R$ 
                    <?php
                    if($total_entradas == '' || $status == 'Saída'){
                      echo 0; 
                    }else{
                    echo $total_entradas;
                    }  
                    ?></font> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Total Saídas : <font color="red">   
                   <?php
                    if($total_saidas == '' || $status == 'Entrada'){
                      echo 0; 
                    }else{
                    echo $total_saidas;
                    }  
                    ?> MT
                   </font>
                 </font>
                 
                
                </div>

                 <div class="col-md-6">
                 
                  <p align="right">  <font size="3">Saldo Total :
                    <?php

                    if($status == 'Entrada'){
                      $total_saidas = 0;
                    }


                    if($status == 'Saída'){
                      $total_entradas = 0;
                    }

                    $total = $total_entradas - $total_saidas;  
                    if ($total >= 0){
                     echo '<font color="green"> '  .$total. ',00 MT </font>';
                    } else{
                     echo '<font color="red">  '  .$total. ',00 MT </font>';
                    }
                    ?>
                  </font> </p>
                
                </div>
             
              </div>


              <?php } } ?>


               <!-- Modal MOVIMENTACOES -->
               <div id="modalRelMov" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Relatório de Movimentações</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
              <form method="POST" action="rel/rel_mov_data_class.php">

            <div class="row">
                  <div class="col-md-4">
                    <label>Tipo</label>
                 </div>
                <div class="col-md-4">
                  <label>Data Inicial</label>
                </div>
                 <div class="col-md-4">
                  <label>Data Final</label>
                </div>
               

            </div>

                <div class="row">
                  <div class="col-md-4 mt-2">
                    <select class="form-control" id="category" name="tipo">
                     <option value="Todas">Todas</option> 
                     <option value="Entrada">Entradas</option> 
                     <option value="Saída">Saídas</option> 
                     
                     
                   
                   </select>
                 </div>
                <div class="col-md-4">
                  <input name="txtdataInicial" class="form-control mt-3" type="date" placeholder="Pesquisar" aria-label="Pesquisar">
                </div>
                <div class="col-md-4">
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

<?php

  if(isset($_POST['button'])){
    $valor = $_POST['txtvalor'];
    $motivo = $_POST['txtmotivo'];
    $funcionario = $_SESSION['nome_usuario'];
   



    $query = "insert into `gastos`(`valor`, `motivo`, `funcionario`, `datar`) VALUES ('$valor', '$motivo', '$funcionario',CURRENT_DATE)";
 
    $result =   mysqli_query($conexao, $query);
    
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
  echo"<script language='javascript'>window.alert('Excluido com Sucesso'); </script>";
  echo"<script language='javascript'>window.location='pages-gastaos.php'; </script>";
}

?>
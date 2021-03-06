
<?php include 'layout/header.php';?>
<?php $page = 'praca'; ?>
<?php include 'layout/sidebar.php';?>


		<div class="main">
		<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
		</a>
		<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" name="txtpesquisar" class="form-control" placeholder="Procurar praça…" aria-label="Search">
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

					<h1 class="h3 mb-3">Praças</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
								<br>


<div class="row">
  <div class="col-sm-12">
  	<a href="add-praca.php"> 
   		<button type="button" class="btn btn-primary mb-3">Inserir Novo </button>
	</a>

  </div>

 
</div>


 <div class="content">
   <div class="row">
	 <div class="col-md-12">
	   <div class="card">
		 <div class="card-header">
		   <h4 class="card-title"> Tabela de Praças</h4>
		 </div>
		 <div class="card-body">
		   <div class="table-responsive">



		   <!--LISTAR TODas as PRAÇAS-->
		   <?php

		   if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar']!=''){
			 $nome = $_GET['txtpesquisar'] . '%';
			 $queryTabela = "SELECT * FROM `pracas` where praca LIKE '$nome' order by praca asc";
		   }else{
		   $queryTabela = "SELECT * FROM `pracas` order by praca asc";
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
				   Praça
				 </th>
				 <th>
				   Plataforma
                 </th>
                 <th>
				   Provincia
				 </th>
				 <th>
				   Ações
				 </th>
			   </thead>
			   <tbody>
				
				 <?php

				 while($res_1 = mysqli_fetch_array($resultTabela)){
					 	$id = $res_1["id"];
                       $praca = $res_1["praca"];
                       $provincia = $res_1["provincia"];
					   $plataforma  =  $res_1["plataforma"];
				   

					   ?>

					   <tr>
						 <td><?php echo $praca; ?></td>
                         <td><?php echo $plataforma; ?></td>
                         <td><?php echo $provincia; ?></td>
						 <td>
						   <a class="btn btn-info" href="
						   edit-pracas.php?func=edita&id=<?php
						   echo $id;
						   ?>
						   ">
                           <i class="align-middle" data-feather="edit-2"></i>
						   </a>
						   <a class="btn btn-danger" href="
						   pages-cargos.php?func=deleta&id=<?php
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
	 
	 <h4 class="modal-title">Cargos</h4>
	 <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <form method="POST">
   <div class="modal-body">
	 <div class="form-group">
	   <label for="id_produto">Cargo</label>
	   <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" placeholder="Cargo" required>
	 </div>
	 
   </div>
		  
   <div class="modal-footer">
	  <button type="submit" class="btn btn-success mb-3" name="button">Salvar </button>


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

   

<!--CADASTRAR -->

<?php

  if(isset($_POST['button'])){
    $nome = $_POST['txtnome'];

    //VEERIFICAR SE O Cargo JA ESTA CADASTRADO

    $queryVerifica = "select * from cargos where cargo = '$nome'";

    $resultVerifica = mysqli_query($conexao,$queryVerifica);

    $rowVerifica = mysqli_num_rows($resultVerifica);

    if($rowVerifica > 0){
      echo"<script language='javascript'>window.alert('Cargo Ja esta Cadastrado'); </script>";
      exit();
    }


    $query = "INSERT INTO `cargos`(`cargo`) VALUES ('$nome')";
 
    $result =   mysqli_query($conexao, $query);
    
    if($result == ''){
      echo"<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar'); </script>";
      
    }else{
      echo"<script language='javascript'>window.alert('Salvo com Sucesso'); </script>";
      echo"<script language='javascript'>window.location='pages-cargos.php'; </script>";
    }

  }
?>



<!-- Excluir-->

<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM cargos where id = '$id'";
  mysqli_query($conexao,$query);
  //echo"<script language='javascript'>window.alert('Excluido com Sucesso'); </script>";
  echo"<script language='javascript'>window.location='pages-cargos.php'; </script>";
}

?>

<!--EDITAR -->

<?php 
  if(@$_GET['func'] == 'edita'){
    $id = $_GET['id'];
    $query = "select * from cargos where id = '$id'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

    while($res_1 = mysqli_fetch_array($result)){
      
      ?>
      <!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Cargos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" value="<?php echo $res_1['cargo']; ?>" required>
              </div>
              
            </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="buttonEditar">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
            </div>
          </div>
        </div>
      </div>  
      
      <script> $("#modalEditar").modal("show");</script>

  <!--Comando para editar os dados UPDATE -->
<?php
if(isset($_POST['buttonEditar'])){
  $nome = $_POST['txtnome'];
  


  if ($res_1['cargo'] != $nome){

      //VEERIFICAR SE O Cargo JA ESTA CADASTRADO

    $queryVerifica = "select * from cargos where cargo = '$nome'";

    $resultVerifica = mysqli_query($conexao,$queryVerifica);

    $rowVerifica = mysqli_num_rows($resultVerifica);

    if($rowVerifica > 0){
      echo"<script language='javascript'>window.alert('Cargo Ja esta Cadastrado'); </script>";
      exit();
    }

}

 


$query_editar = "UPDATE cargos set cargo = '$nome' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='pages-cargos.php'; </script>";
}

}
?>


<?php 
} 
}  
?>
   

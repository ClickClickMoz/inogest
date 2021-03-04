
<?php include 'layout/header.php';?>
<?php $page = 'edcusuario'; ?>
<?php include 'layout/sidebar.php';?>



		<div class="main">
		<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
		</a>

		<form class="d-none d-sm-inline-block">
					
						<div class="input-group input-group-navbar mb-1 col-md-1">
							<select class="form-control mr-2" id="tipopesquisa" name="tipopesquisa">
									<option value="telefone">Telefone</option> 
									<option value="codigo">Codigo</option> 
							</select>
						</div>
		
						<div class="input-group input-group-navbar mb-1 col-md-1">
								<input type="text" name="txtpesquisar" class="form-control" placeholder="Procurar" aria-label="Search">
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

					<h1 class="h3 mb-3">Usuários EDC</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
								<div class="container">


    

<br>


			<div class="row">
				<div class="col-sm-6">
					<a href="add-usuario-edc.php">
						<button type="button" class="btn btn-primary mb-3" data-toggle="modal">Inserir Novo Usuário </button>
					</a>
					
				</div>

				<div class="col-sm-6" <?php if(isset($_SESSION['msg'])){echo 'style="background-color: #eee;"';}?>>
				<p id="link" name="link">
				<?php 
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
					
					} ?>
				</p>
					 
				</div>

  			</div>


	<div class="content">
	  <div class="row">
		<div class="col-md-12">
		  <div class="card">
				<div class="card-header">
				<h4 class="card-title"> Tabela de Usuários EDC: <?php echo date("d/m/Y");?></h4>
				</div>
			<div class="card-body">
			  <div class="table-responsive">



			  <!--LISTAR TODOS OS USUARIOS-->
			  <?php
			  $currentdate = date("Y-m-d");
			  $nomecolaborador = $_SESSION['nome_usuario'];
			  
			  

			  if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar']!=''){
				$tipo = $_GET['tipopesquisa'];
				$telefone = $_GET['txtpesquisar'] . '%';
				$queryPro = "SELECT * FROM `usuarioedc` where categoria LIKE 'Profissional'";
				$queryLP = "SELECT * FROM `usuarioedc` where categoria LIKE 'Ligeiros e Pesados' ";

				if($tipo == "telefone"){
					$queryTabela = "SELECT * FROM `usuarioedc` where telefone LIKE '$telefone' order by id desc";
				}elseif($tipo == "codigo"){
					$queryTabela = "SELECT * FROM `usuarioedc` where codigo LIKE '$telefone' order by id desc";
				}
			
				



			  }else{
				$queryTabela = "SELECT * FROM `usuarioedc` where datar LIKE '$currentdate' and colaboradoredc LIKE '$nomecolaborador' order by id desc";
				$queryPro = "SELECT * FROM `usuarioedc` where (categoria LIKE 'Profissional' and datar LIKE '$currentdate') and colaboradoredc LIKE '$nomecolaborador' ";
				$queryLP = "SELECT * FROM `usuarioedc` where (categoria LIKE 'Ligeiros e Pesados' and datar LIKE '$currentdate') and colaboradoredc LIKE '$nomecolaborador' ";
			  }
				$resultTabela =   mysqli_query($conexao, $queryTabela);
				$resultPro =   mysqli_query($conexao, $queryPro);
				$resultLP =   mysqli_query($conexao, $queryLP);
			  
			  
				$rowTabela = mysqli_num_rows($resultTabela);
				$rowPro = mysqli_num_rows($resultPro);
				$rowLP = mysqli_num_rows($resultLP);
				echo"LP: $rowLP";
				echo"<html><br></html>PRO: $rowPro";
				echo"<html><br></html>Registros Total: $rowTabela";
			 
			if($rowTabela == ''){
				
				echo"<h3>Nao existem dados</h3>";
				
			}else{
				?>
			
				<table class="table">
				  <thead class=" text-primary">
					
					<th>
					  Nome
					</th>
					<th>
					  Telefone
					</th>
					<th>
					  Codigo
					</th>
					<th>
					  Provincia
					</th>
					<th>
					  Cidade
					</th>
					<th>
					  Categoria
					</th>
					<th>
					  Funcionario
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
						  $nome  =  $res_1["nome"];
						  $telefone  =  $res_1["telefone"];
						  $codigo  =  $res_1["codigo"];
						  $provincia  =  $res_1["provincia"];
						  $cidade  =  $res_1["cidade"];
						  $categoria = $res_1["categoria"];
						  $registado = $res_1["colaboradoredc"];
						  $data  =  $res_1["datar"];
						  $data2 = implode('/',array_reverse(explode
						  ('-', $data)));
						  ?>

						  <tr>
							<td><?php echo $nome; ?></td>
							<td><?php echo $telefone; ?></td>
							<td><?php echo $codigo; ?></td>
							<td><?php echo $provincia; ?></td>
							<td><?php echo $cidade; ?></td>
							<td><?php echo $categoria; ?></td>
							<td><?php echo $registado; ?></td>
							<td><?php echo $data2; ?></td>
							<td>
							  <a class="btn btn-info" href="
							   edit-usuarioedc.php?func=edita&id=<?php
							  echo $id;
							  ?>
							  ">
								<i class="align-middle" data-feather="edit-2"></i>
							  </a>
							  <?php 
                	if($_SESSION['cargo_usuario'] == 'administrador' || $_SESSION['cargo_usuario'] == 'gerente'){
                  

                 ?>
							  <a class="btn btn-danger" href="
							  pages-usuarios-edc.php?func=deleta&id=<?php
							  echo $id;
							  ?>
							  ">
								<i class="align-middle" data-feather="trash"></i>
							  </a>

							  <?php 
									}
							  ?>

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
		
		<h4 class="modal-title">Motoristas Click Tuk</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
	  <form method="POST">
	  <div class="modal-body">
		<div class="form-group">
		  <label for="id_produto">Nome</label>
		  <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" placeholder="Nome" required>
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
		  <label for="fornecedor">Email</label>
		   <input type="email" class="form-control mr-2" id="txtemail" name="txtemail" placeholder="Email" required>
		</div>
		<div class="form-group">
		  <label for="fornecedor">BI</label>
		   <input type="text" class="form-control mr-2" id="txtbi" name="txtbi" placeholder="Bilhete Identidade" required>
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
    $telefone = $_POST['txttelefone'];
    $endereco = $_POST['txtendereco'];
    $email = $_POST['txtemail'];
    $bi = $_POST['txtbi'];

    //VEERIFICAR SE O BI JA ESTA CADASTRADO

    $queryVerifica = "select * from motoristaclicktuk where bi = '$bi'";

    $resultVerifica = mysqli_query($conexao,$queryVerifica);

	$rowVerifica = mysqli_num_rows($resultVerifica);
	

    if($rowVerifica > 0){
      echo"<script language='javascript'>window.alert('Cliente Ja esta Cadastrado'); </script>";
      exit();
    }


    $query = "INSERT INTO `motoristaclicktuk`(`nome`, `telefone`, `endereco`, `email`, `bi`, `datar`) VALUES ('$nome','$telefone','$endereco','$email','$bi',CURRENT_DATE)";
 
    $result =   mysqli_query($conexao, $query);
    
    if($result == ''){
      echo"<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar'); </script>";
      
    }else{
      echo"<script language='javascript'>window.alert('Salvo com Sucesso'); </script>";
      echo"<script language='javascript'>window.location='pages-usuario-edc.php'; </script>";
    }

  }
?>



<!-- Excluir-->

<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM usuarioedc where id = '$id'";
  mysqli_query($conexao,$query);
  //echo"<script language='javascript'>window.alert('Excluido com Sucesso'); </script>";
  echo"<script language='javascript'>window.location='pages-usuarios-edc.php'; </script>";
}

?>

<!--EDITAR -->

<?php 
  if(@$_GET['func'] == 'edita'){
    $id = $_GET['id'];
    $queryEdita = "select * from motoristaclicktuk where id = '$id'";
    $resultEdita = mysqli_query($conexao, $queryEdita);
    $row = mysqli_num_rows($resultEdita);
    while($res_1Editar = mysqli_fetch_array($resultEdita)){
		echo "<script language='javascript'> window.alert('BI já Cadastrado!'); </script>";
      
      ?>
	  
      <!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Motorista Click Taxi</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" value="<?php echo $res_1Editar['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Telefone</label>
                <input type="text" class="form-control mr-2" name="txttelefone" id="txttelefone" placeholder="Telefone" value="<?php echo $res_1Editar['telefone']; ?>" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Endereço</label>
                <input type="text" class="form-control mr-2" name="txtendereco" placeholder="Endereço" value="<?php echo $res_1Editar['endereco']; ?>" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Email</label>
                 <input type="email" class="form-control mr-2" name="txtemail" placeholder="Email" value="<?php echo $res_1Editar['email']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">BI</label>
                 <input type="text" class="form-control mr-2" name="txtbi" id="txtbi" placeholder="Bilhete de Identidade" value="<?php echo $res_1Editar['bi']; ?>" required>
              </div>
            </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary mb-3" name="buttonEditar">Salvar </button>


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
  $telefone = $_POST['txttelefone'];
  $endereco = $_POST['txtendereco'];
  $email = $_POST['txtemail'];
  $bi = $_POST['txtbi'];


  if ($res_1['bi'] != $bi){

       //VERIFICAR SE O BI JÁ ESTÁ CADASTRADO
    $query_verificar = "select * from motoristaclicktuk where bi = '$bi' ";

    $result_verificar = mysqli_query($conexao, $query_verificar);
    $row_verificar = mysqli_num_rows($result_verificar);

    if($row_verificar > 0){
    echo "<script language='javascript'> window.alert('BI já Cadastrado!'); </script>";
    exit();
    }

}

 


$query_editar = "UPDATE motoristaclicktuk set nome = '$nome', telefone = '$telefone', endereco = '$endereco', email = '$email', bi = '$bi' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='pages-usuario-edc.php'; </script>";
}

}
?>



<?php 
} 
}  
?>
   
    


<!--Mascaras -->


<script type="text/javascript">
  $(document).ready(function(){
    $('#txttelefone').mask('(00) 00 00 000');
    $('#txtbi').mask('(00) 00000-0000');

  }); 

</script>
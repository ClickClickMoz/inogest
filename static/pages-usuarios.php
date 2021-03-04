
<?php include 'layout/header.php';?>
<?php $page = 'usuario'; ?>
<?php include 'layout/sidebar.php';?>


		<div class="main">
		<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
		</a>
		<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" name="txtpesquisar" class="form-control" placeholder="Procurar usuario…" aria-label="Search">
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

					<h1 class="h3 mb-3">Usuarios</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
								
								

      <br>


<div class="row">
  <div class="col-sm-12">
  	<a href="add-usuarios.php">
   <button type="button" class="btn btn-primary mb-3" data-toggle="modal" >Inserir Novo </button>
   </a>
  </div>

 
</div>


 <div class="content">
   <div class="row">
	 <div class="col-md-12">
	   <div class="card">
		 <div class="card-header">
		   <h4 class="card-title"> Tabela de Clientes</h4>
		 </div>
		 <div class="card-body">
		   <div class="table-responsive">



		   <!--LISTAR TODOS OS USUARIOS-->
		   <?php

		   if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
			 $nome = $_GET['txtpesquisar'] . '%';

			 $query = "select u.id, u.nome, u.usuario, u.senha, u.cargo, u.id_funcionario, f.telefone from usuarios as u INNER JOIN funcionarios as f ON u.id_funcionario = f.id where u.nome LIKE '$nome'  order by u.nome asc"; 

		   }else{
		   $query = "select u.id, u.nome, u.usuario, u.senha, u.cargo, u.id_funcionario, f.telefone from usuarios as u INNER JOIN funcionarios as f ON u.id_funcionario = f.id order by u.nome asc"; 
		   }
		   $resultTabela =   mysqli_query($conexao, $query);
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
				   Nome
				 </th>
				 <th>
				   Usuario
				 </th>
				 <th>
				   Senha
				 </th>
				  <th>
				   Cargo
				 </th>
				   <th>
				   Telefone
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
					   $senha  =  $res_1["senha"];
					   $usuario  =  $res_1["usuario"];
					   $cargo  =  $res_1["cargo"];
					   

					   ?>

					   <tr>
						 <td><?php echo $nome; ?></td>
						 <td><?php echo $usuario; ?></td>
						 <td><?php echo $senha; ?></td>
						 <td><?php echo $cargo; ?></td>
						 <td><?php echo $telefone; ?></td>
						 <td>
						   <a class="btn btn-info" href="
						   edit-usuarios.php?func=edita&id=<?php
						   echo $id;
						   ?>
						   ">
						   <i class="align-middle" data-feather="edit-2"></i>
						   </a>
						   <a class="btn btn-danger" href="
						   pages-usuarios.php?func=deleta&id=<?php
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
	 
	 <h4 class="modal-title">Usuarios</h4>
	 <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <form method="POST">
   <div class="modal-body">
	 <div class="form-group">
	   <label for="id_produto">Usuario</label>
	   <input type="text" class="form-control mr-2" id="txtusuario" name="txtusuario" placeholder="Usuario" required>
	 </div>
	 <div class="form-group">
	   <label for="id_produto">Senha</label>
	   <input type="text" class="form-control mr-2" id="txtsenha" name="txtsenha" placeholder="Senha" required>
	 </div>
	 <div class="form-group">
	   <label for="quantidade">Funcionario</label>
	   <select class="form-control mr-2" id="category" name="funcionario">
		 <?php
		 
		 $query = "SELECT * FROM funcionarios ORDER BY nome asc";
		 $result = mysqli_query($conexao, $query);

		 if(count($result)){
		   while($res_2 = mysqli_fetch_array($result)){
				?>                                             
		   <option value="<?php echo $res_2['id']; ?>"><?php echo $res_2['nome']; ?></option> 
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


<!--CADASTRAR -->

<?php

  if(isset($_POST['button'])){
    $nome = 'nome';//$_POST['nome'];
    $usuario = $_POST['txtusuario'];
    $senha = $_POST['txtsenha'];
    $funcionario = $_POST['funcionario'];
    $cargo = 'cargo';//$_POST['cargo'];

    //VEERIFICAR SE O USUARIO JA ESTA CADASTRADO

    $queryVerifica = "select * from usuarios where usuario = '$usuario'";

    $resultVerifica = mysqli_query($conexao,$queryVerifica);

    $rowVerifica = mysqli_num_rows($resultVerifica);

    if($rowVerifica > 0){
      echo"<script language='javascript'>window.alert('Usuario Ja esta Cadastrado'); </script>";
      exit();
    }


    $query = "INSERT INTO `usuarios`(`nome`, `usuario`, `senha`, `cargo`, `id_funcionario`) VALUES ('$nome','$usuario','$senha','$cargo','$funcionario')";
 
    $result =   mysqli_query($conexao, $query);
    
    if($result == ''){
      echo"<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar'); </script>";
      
    }else{
      echo"<script language='javascript'>window.alert('Salvo com Sucesso'); </script>";
      echo"<script language='javascript'>window.location='pages-usuarios.php'; </script>";
    }

  }
?>



<!-- Excluir-->

<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM usuarios where id = '$id'";
  mysqli_query($conexao,$query);
  //echo"<script language='javascript'>window.alert('Excluido com Sucesso'); </script>";
  echo"<script language='javascript'>window.location='pages-usuarios.php'; </script>";
}

?>

<!--EDITAR -->

<?php 
  if(@$_GET['func'] == 'edita'){
    $id = $_GET['id'];
    $query = "select * from usuarios where id = '$id'";
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
              
              <h4 class="modal-title">Usuarios</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Usuario</label>
                <input type="text" class="form-control mr-2" name="txtusuario" placeholder="Usuario" value="<?php echo $res_1['usuario']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Senha</label>
                <input type="text" class="form-control mr-2" name="txtsenha" id="txtsenha" placeholder="Senha" value="<?php echo $res_1['senha']; ?>" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Funcionarios</label>
                <select class="form-control mr-2" id="category" name="funcionario">
                  <?php
                  
                  $query = "SELECT * FROM funcionarios ORDER BY nome asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_2 = mysqli_fetch_array($result)){
                         ?>                                             
                    <option value="<?php echo $res_2['id_funcionario']; ?>"><?php echo $res_2['nome']; ?></option> 
                         <?php      
                       }
                   }
                  ?>
                  </select>
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
  $nome = $_POST['nome'];
  $usuario = $_POST['txtusuario'];
  $senha = $_POST['txtsenha'];
  $cargo = $_POST['cargo'];
  $funcionario = $_POST['funcionario'];


  if ($res_1['usuario'] != $usuario){

       //VERIFICAR SE O USUARIO JÁ ESTÁ CADASTRADO
    $query_verificar = "select * from usuarios where usuario = '$usuario' ";

    $result_verificar = mysqli_query($conexao, $query_verificar);
    $row_verificar = mysqli_num_rows($result_verificar);

    if($row_verificar > 0){
    echo "<script language='javascript'> window.alert('Usuario já Cadastrado!'); </script>";
    exit();
    }

}

 


$query_editar = "UPDATE usuarios set nome = '$nome', usuario = '$usuario', senha = '$senha', cargo = '$cargo', id_funcionario = '$id_funcionario' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='pages-usuarios.php'; </script>";
}

}
?>


<?php 
} 
}  
?>
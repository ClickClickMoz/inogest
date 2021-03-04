
<?php 
$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];


$dataIni = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFin = implode('/', array_reverse(explode('-', $dataFinal)));

include('../conexao.php');



 ?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>

 @page {
            margin: 0px;

        }

.footer {
    position:absolute;
    bottom:0;
    width:100%;
    background-color: #ebebeb;
    padding:10px;
}

.cabecalho {    
    background-color: #ebebeb;
    padding-top:15px;
    margin-bottom:30px;
}

.titulo{
	margin:0;
}

.areaTotais{
	border : 0.5px solid #bcbcbc;
	padding: 15px;
	border-radius: 5px;
	margin-right:25px;
}

.areaTotal{
	border : 0.5px solid #bcbcbc;
	padding: 15px;
	border-radius: 5px;
	margin-right:25px;
	background-color: #f9f9f9;
	margin-top:2px;
}

.pgto{
	margin:1px;
}



</style>


<div class="cabecalho">
	
		<div class="row">
			<div class="col-sm-5">	
			  <img src="../img/logo2.png" width="250px">
			</div>
			<div class="col-sm-7">	
			 <h3 class="display-1"><b>InoGest - Inovatis LTD</b></h3>
			 <h6 class="display-1">Rua Samuel Magaia, Cidade da Beira</h6>
			</div>
		</div>
	

</div>

<div class="container">

		
			<div class="row">
				<div class="col-sm-6">	
				   <h1 class="display-1"> RELATÓRIO DE GASTOS </h1> 
				</div>
				<div class="col-sm-6">	
				<small></small>
				</div>
				
			</div>

			<div class="row">
				<div class="col-sm-6">	
				 
				</div>
				<div class="col-sm-6">	
				<small><b> Data Inicial:</b> <?php echo $dataIni; ?> <b> Data Final:</b> <?php echo $dataFin; ?> </small>
				</div>
				
			</div>
		
		<hr>

			

						
		<br><br>

		<?php

		$total_gastos = 0;
		$quant = 0;
		

		 
                          
                           $query = "select * from gastos where datar >= '$dataInicial' and datar <= '$dataFinal' order by datar asc";
                      
                           

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                        if($row == ''){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>

		<div class="table-responsive">
		<table class="table table-striped">
		<thead class=" text-primary">
							<th scope="col">Motivo</th>
							<th scope="col">Valor</th>
							<th scope="col">Funcionário</th>
							<th scope="col">Data</th>
			</thead>


			<tbody>
			
<tr></tr>
				 <?php 
				  			
				  			

                          while($res_1 = mysqli_fetch_array($result)){
                            $motivo = $res_1["motivo"];
                            $valor = $res_1["valor"];
                            $funcionario = $res_1["funcionario"];
                            $data = $res_1["datar"];
                           
                          


                           


                            $data2 = implode('/', array_reverse(explode('-', $data)));
							

                           
                            $total_gastos = $total_gastos + $valor;
                            $quant = $quant + 1;

                           
                         
                         	
                         
                         
                            ?>

                <tr class="table-primary">
				
				<td> <?php echo $motivo; ?> </td>
				<td> <?php echo $valor; ?> MT </td>
				<td> <?php echo $funcionario; ?> </td>
				<td> <?php echo $data2; ?> </td>
				
				
				
				</tr>

			<?php }  ?>
			</tbody>
		</table>

	<?php } ?>
	</div>

		<hr>
		

		<hr>

		
			<div class="row">
				<div class="col-sm-8">	
				 <small><b> Quantidade de Gastos:</b> <?php echo $quant; ?> </small>
				</div>
				<div class="col-sm-4">	
				 <small><b> Valor Total:</b> <?php echo $total_gastos; ?>,00 MT</small>
				</div>
				
			</div>

		
		

			
			

	
</div>


<div class="footer">
 <p style="font-size:12px" align="center">InoGest - Inovatis</p> 
</div>



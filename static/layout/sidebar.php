<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="indexx.php">
          			<span class="align-middle">InoGest</span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Páginas
					</li>

					<li class="sidebar-item">
						<a data-target="#uiii" data-toggle="collapse" class="sidebar-link collapsed">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            			</a>
						<ul id="uiii" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						
						<li class="sidebar-item <?php if($page=='dashboard1'){echo 'active';}?>">
							<a class="sidebar-link" href="indexx.php">
              					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Operacional</span>
            				</a>
						</li>

						<?php 
                if($_SESSION['cargo_usuario'] == 'administrador' || $_SESSION['cargo_usuario'] == 'gerente'){
                  

                 ?>
<!--
						<li class="sidebar-item <?php //if($page=='dashboard2'){echo 'active';}?>">
							<a class="sidebar-link" href="pages-dashboard2.php">
              					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Financeiro</span>
            				</a>
						</li>-->

						<li class="sidebar-item <?php if($page=='dashboard3'){echo 'active';}?>">
							<a class="sidebar-link" href="pages-dashboard3.php">
              					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Recursos Humanos</span>
            				</a>
						</li>
						<?php }?>
						</ul>
					</li>


					<?php 
                if($_SESSION['cargo_usuario'] == 'administrador' || $_SESSION['cargo_usuario'] == 'gerente'){
                  

                 ?>

			
					<li class="sidebar-header">
						Gerência
					</li>
					
					<li class="sidebar-item <?php if($page=='funcionario'){echo 'active';}?>">
						<a class="sidebar-link" href="pages-funcionarios.php">
              				<i class="align-middle" data-feather="users"></i> <span class="align-middle">Funcionários</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($page=='usuario'){echo 'active';}?>">
						<a class="sidebar-link" href="pages-usuarios.php">
              				<i class="align-middle" data-feather="user"></i> <span class="align-middle">Usuários</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($page=='cargo'){echo 'active';}?>">
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
					<li class="sidebar-item <?php if($page=='movimento'){echo 'active';}?>">
						<a class="sidebar-link" href="pages-movimentos.php">
              				<i class="align-middle" data-feather="trending-up"></i> <span class="align-middle">Movimentos</span>
            			</a>
					</li>

					<li class="sidebar-item <?php if($page=='pagamento'){echo 'active';}?>">
						<a class="sidebar-link" href="pages-pagamentos.php">
              				<i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Pagamentos</span>
            			</a>
					</li>
					<?php } ?>
					<li class="sidebar-item <?php if($page=='gasto'){echo 'active';}?>">
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
						
						<li class="sidebar-item <?php if($page=='edcusuario'){echo 'active';}?>">
							<a class="sidebar-link" href="pages-usuarios-edc.php">
              					<i class="align-middle" data-feather="users"></i> <span class="align-middle">Usuarios EDC</span>
            				</a>
						</li>

						<li class="sidebar-item <?php if($page=='msc'){echo 'active';}?>">
							<a class="sidebar-link" href="pages-msc.php">
              					<i class="align-middle" data-feather="users"></i> <span class="align-middle">Registrar MSC</span>
            				</a>
						</li>

						<li class="sidebar-item <?php if($page=='turno'){echo 'active';}?>">
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
						
						<li class="sidebar-item <?php if($page=='clicktuk'){echo 'active';}?>">
						<a class="sidebar-link" href="pages-clicktuk.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Motoristas ClickTuk</span>
            </a>
						</li>
					

					<li class="sidebar-item <?php if($page=='clicktaxi'){echo 'active';}?>">
						<a class="sidebar-link" href="pages-clicktaxi.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Motoristas ClickTaxi</span>
            </a>
					</li>
					<li class="sidebar-item <?php if($page=='praca'){echo 'active';}?>">
						<a class="sidebar-link" href="pages-praca.php">
              <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Praças</span>
            </a>
					</li>
							
						</ul>
					</li>
				</ul>

				
			</div>
		</nav>
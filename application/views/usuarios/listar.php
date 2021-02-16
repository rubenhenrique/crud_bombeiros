<link href="<?php echo base_url('includes/css/bootstrap.min.css'); ?>" rel="stylesheet">


<div id="grid-usuarios">
	<div class="container col-md-3">
		<br><br>
		
		<?php  if ($this->session->usuario['id_perfil'] == 1){ ?>


		<a title="Editar" href="<?php echo base_url() . 'usuarios/novo/'?>">
			<button type="button" class="btn btn-success">Cadastrar usuário</button> <br> <br>
		</a>

		<?php  } ?>
  <!-- Table -->
		  <table  class="table table-striped">
		  
		   <thead>
			    <tr>
			      <th>Nome</th>
			      <th>Email</th>

			      <?php  if ($this->session->usuario['id_perfil'] == 1){ ?>
			      <th></th>
			      <th></th>
			      <?php  } ?>
			      
			    </tr>
		  	</thead>
			  
			  <tbody>	

				<?php foreach($usuarios as $usuario): ?>
				<tr>
				    <td>
				    <?php echo $usuario->nome; ?>
				    </td>
					<td>
				    <?php echo $usuario->email; ?>
					</td>
					<td>

					<?php  if ($this->session->usuario['id_perfil'] == 1){ ?>	
				    <a title="Deletar" href="<?php echo base_url() . 'usuarios/deletar/' . $usuario->id; ?>" onClick="return confirm('Confirma a exclusão deste registro?')"><button type="button" class="btn btn-danger btn-sm">Deletar</button></a><br>
					</td>
					<td>
				    <a title="Editar" href="<?php echo base_url() . 'usuarios/editar/' . $usuario->id; ?>"><button type="button" class="btn btn-primary btn-sm">Editar
				    </button></a>
				    <?php  } ?>

				    </td>
				</tr>
				<?php endforeach ?>

			 </tbody>	
			
			</table>

	</div>
</div>
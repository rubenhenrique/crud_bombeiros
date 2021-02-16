<link href="<?php echo base_url('includes/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->

<div class="container col-md-3">

<?php echo isset ($dados_usuario) ? form_open(base_url() .'Usuarios/atualizar?id='.$dados_usuario->id, 'id="form-usuarios"') : form_open(base_url() .'Usuarios/inserir', 'id="form-usuarios"'); ?>
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome"  value= "<?php echo isset ($dados_usuario) ?  $dados_usuario->nome : ''  ?>" >
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Digite o mail" value= <?php echo isset ($dados_usuario) ?  $dados_usuario->email : ''  ?> >
  </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Perfil</label>
    <select class="form-control" id="id_perfil" name="id_perfil">
      <option value=""> Escolha o perfil </option>
      <?php foreach ($perfis as $perfil) {?>
      <option value="<?php echo $perfil['id']; ?>" <?php echo (isset ($dados_usuario) && $dados_usuario->id_perfil == $perfil['id']) ?  'selected' : ''  ?> > 
          <?php echo $perfil['descricao']; ?> 
      </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha">
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
<?php echo form_close(); ?>

<?php if(isset($erros)) { ?>
<div class="alert alert-danger" role="alert">
  <?php echo $erros; ?>
</div>
<?php } ?>

<?php if(isset($sucesso)) { ?>
<div class="alert alert-success" role="alert">
  <?php echo $sucesso; ?>
</div>
<?php } ?>

</div>
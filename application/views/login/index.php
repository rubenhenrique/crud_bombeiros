<html>

<head>
  <link href="<?php echo base_url('includes/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <title>CRUD Bombeiros</title>
  
</head>
<body>

  <!-- Custom styles for this template -->
  <div class="container col-md-3">
    <br>

    <h5> Para prosseguir faça o login .</h5>

    <br>
    
    <?php echo form_open(base_url() .'Login/logar', 'id="form-usuarios"'); ?>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Digite o mail">
    </div>
    <div class="form-group">
      <label for="senha">Senha</label>
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha">
    </div>
    <button type="submit" class="btn btn-primary">Logar</button>
    <?php echo form_close(); ?>



    <?php if( $this->session->userdata('erro_logado') != null ) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $this->session->userdata('erro_logado'); ?>
      </div>
    <?php } ?>

    <?php if(isset($erros)) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $erros; ?>
      </div>
    <?php } ?>

  </div>


</body>

</html>
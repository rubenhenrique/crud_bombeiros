<html>

<head>
	<link href="<?php echo base_url('includes/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <script src="<?php echo base_url('includes/js/jquery-3.5.1.js'); ?>" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url(). "/usuarios"?>" >Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php echo "Seja bem vindo," . $this->session->usuario['nome']. "." ?>
    </ul>
    
    <a class="navbar-brand" href="<?php echo base_url(). "/login/logoff"?>" >
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Fazer logoff</button>
    </a> 
    
  </div>
</nav>

    <div id="contents"><?= $contents ?></div>
    

</body>

</html>
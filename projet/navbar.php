	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ENSIT STOCK</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
    <li class="<?php echo $active_productos;?>"><a href="productos.php"><i class='glyphicon glyphicon-barcode'></i> Produits</a></li>
    <li class="<?php echo $active_commandes;?>"><a href="commandes.php"><i  class='glyphicon glyphicon-book'></i> Commandes</a></li>
    <li class="<?php echo $active_categories;?>"><a href="categorie.php"><i  class='glyphicon glyphicon-book'></i> categories</a></li>
		<li class="<?php echo $active_etudiants;?>"><a href="etudiant.php"><i class='glyphicon glyphicon-user'></i> Etudiants</a></li>
    <li class="<?php echo $active_fournisseurs;?>"><a href="fournisseurs.php"><i  class='glyphicon glyphicon-user'></i> Fournisseurs</a></li>
    <li class="<?php echo $active_utilisateurs;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Utilisateurs</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://ensit.ci" target='_blank'><i class='glyphicon glyphicon-envelope'></i> Site Officel</a></li>
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Deconnexion</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>
<nav class="navbar navbar-default navbar-fixed-top custom-navbar" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo $data['baseurl']; ?>">My personal agenda</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="mpa-nav-bar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Page de <?php echo $data['session']['user']['login']; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $data['baseurl']; ?>profile">Mon profil</a></li>
            <?php if( $data['session']['user']['is_admin'] ): ?>
            <li><a href="<?php echo $data['baseurl']; ?>administrator">Aller sur l'interface administrateur</a>
            <?php endif; ?>
            <li class="divider"></li>
            <li><a href="<?php echo $data['baseurl']; ?>logout">Se deconnecter</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><br><br><br><br><br>
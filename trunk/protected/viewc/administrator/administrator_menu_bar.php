<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo $data['baseurl']; ?>administrator">My personal agenda (Administrateur)</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="mpa-nav-bar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Page de <?php echo $data['session_login']; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $data['baseurl']; ?>">Aller sur l'interface utilisateur</a>
            <li class="divider"></li>
            <li><a href="<?php echo $data['baseurl']; ?>logout">Se deconnecter</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
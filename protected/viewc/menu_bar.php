<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo $data['baseurl']; ?>">My personal agenda</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="mpa-nav-bar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo $data['baseurl']; ?>calendar"><span class="glyphicon glyphicon-calendar"></span> Mon calendrier</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Page de <?php echo $data['session_login']; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Mon profil</a></li>
            <li><a href="#">Statistiques</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo $data['baseurl']; ?>logout">Se deconnecter</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
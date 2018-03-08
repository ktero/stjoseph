<ul class="nav navbar-top-links navbar-right">
  <!--
  <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <?php
              // Display session variable fname
              if (isset($_SESSION['database']))
                  echo $dbname;
           ?>
          <i class="fa fa-folder fa-fw"></i> <i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-user">
          <li><a href="switcher.php"><i class="fa fa-cog fa-fw"></i>Switch S.Y.</a></li>
      </ul>
  </li>
  -->
  <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <?php
              // Display session variable fname
              if (isset($_SESSION['id']))
                  echo $user;
           ?>
          <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-user">
          <li><a href="admin_account.php"><i class="fa fa-cog fa-fw"></i>Admin account</a></li>
          <li><a href="logout_key.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
          </li>
      </ul>
      <!-- /.dropdown-user -->
  </li>
  <!-- /.dropdown -->
</ul>

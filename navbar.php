<?php
	require_once('config.php');
	function printNavBar(){
		$sessionId = session_id();
		if(empty($sessionId)) session_start();

		$loggedin = isset($_COOKIE["loggedIn"]);

		if ($loggedin) {

			if ($_COOKIE['role'] == 'A') {
				echo "
						<li><a href='index.php'>Home</a></li>
						<li><a href='list.php'>View Videos</a></li>
						<li><a href='upload.php'>Upload video</a></li>
						<li><a href='modify.php'>Modify video</a></li>
						<li><a href='editinfo.php'>Change password</a></li>
						<li><a href='logout.php'>Logout</a></li>
					";
			}
			else {
				echo "
						<li><a href='index.php'>Home</a></li>
						<li><a href='list.php'>View Videos</a></li>
						<li><a href='upload.php'>Upload video</a></li>
						<li><a href='editinfo.php'>Change password</a></li>
						<li><a href='logout.php'>Logout</a></li>
					";
			}

		}
		else {
			echo "
					<li><a href='login.php'>Login</a></li>
					<li><a href='register.php'>Register</a></li>
					<li><a href='list.php'>View Videos</a></li>
				";
		}
	}	


?>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Group 1</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php printNavBar(); ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
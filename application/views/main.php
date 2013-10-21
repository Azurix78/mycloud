<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta name="author" content="rubio_n">
		<meta charset="utf-8" />
		<link rel="icon" type="image/x-icon" href="/media/img/favicon.ico" />
		<link rel="stylesheet" href="/media/css/style.css" />
		<script type="text/javascript" src="/media/js/js.js"></script>
		
	</head>
	<body>
		<nav>
			<div id="logo">
				<img src="/media/img/logo.png" alt="logo"><a href="/">myCloud</a>
			</div>
			<? if ($user = Auth::instance()->get_user()) : ?>
			<div id="logout" onclick="deco('logout')" onmouseout="leavedeco('logout')">
				<p>• Bienvenue <?php echo $user->username;?></p>
			</div>
			<div id="h_link">
				<ul>
					<li><a href="/Home/">HOME</a></li> •
					<li><a href="/Profil/">PROFIL</a></li> •
					<li><a href="/File/">FILES</a></li> •
					<li><a href="/Share/">SHARE</a></li>
				</ul>
			</div>
			<? endif; ?>

			
		</nav>
		<div class="container">
			<?php
			if(Session::instance()->get('success'))
			{
				?>
				<h3 class="alert-success" onclick="closealert()" id="alert">
					<?php 
						echo Session::instance()->get('success');
						Session::instance()->delete('success');
					?>
				</h3>
				<?php
			}
				echo $content;
			?>
		</div>
	</body>
</html>
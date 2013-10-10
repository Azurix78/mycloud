<? if ($message) : ?>
	<h3 class="alert-message" id='alert' onclick='closealert()'>
		<? echo $message; ?>
	</h3>
<? endif; ?>

<div class="article_full">
	<div class="bar_titre">
		<h1>Bienvenue sur myCloud</h1>
	</div>
	<p>Bienvenue sur myCloud, site d'hébergement de fichier facile à utiliser.</p>
	<p>L'inscription est gratuite et vous offre 30Mo de stockage pour vos fichiers. Photos, documents, musique, vous êtes libre d'ajouter tout ce qui vous plait alors n'hésitez plus et inscrivez-vous !</p>
	<div id="inscription">
		<?php echo Form::open('Connect/create'); ?>

		<div class='block'>
			<?php echo Form::label('username', 'Username'); ?>
			<?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
			<div class="error">
				<?php echo __(Arr::get($errors, 'username')); ?>
			</div>
		</div>
		<div class='block'>
			<?php echo Form::label('email', 'Email Address'); ?>
			<?php echo Form::input('email', HTML::chars(Arr::get($_POST, 'email')),array('pattern' => "[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$")); ?>
			<div class="error">
				<?php echo __(Arr::get($errors, 'email')); ?>
			</div>
		</div>
		<div class='block'>
			<?php echo Form::label('password', 'Password'); ?>
			<?php echo Form::password('password'); ?>
			<div class="error">
				<?php echo __(Arr::path($errors, '_external.password')); ?>
			</div>
		</div>
		<div class='block'>
			<?php echo Form::label('password_confirm', 'Confirm Password'); ?>
			<?php echo Form::password('password_confirm'); ?>
			<div class="error">
				<?php echo __(Arr::path($errors, '_external.password_confirm')); ?>
			</div>
		</div>
		<?php echo Form::submit('create', 'SIGN IN',array('class' => "in_sub")); ?>
		<?php echo Form::close(); ?>
		<p class="connect_center"><?= HTML::anchor('/Connect/login', 'Login'); ?> Cliquez ici si vous êtes déjà inscrit.</p>
	</div>
</div>
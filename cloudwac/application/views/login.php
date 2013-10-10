<? if ($message) : ?>
	<h3 class="alert-message" id='alert' onclick='closealert()'>
		<? echo $message; ?>
	</h3>
<? endif; ?>

<div class="article_full">
	<div class="bar_titre">
		<h1>Login - myCloud</h1>
	</div>
	<div id="inscription">
		<?php echo Form::open('Connect/login'); ?>
		<div class='right'>
			<?php echo Form::submit('login', 'Login',array('class' => 'in_sub')); ?>
		</div>
		<div class='block'>
			<?php echo Form::label('username', 'Username'); ?>
			<?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
		</div>
		<div class='block'>
			<?php echo Form::label('password', 'Password'); ?>
			<?php echo Form::password('password'); ?>
		</div>
		<?php echo Form::close(); ?>
		<p class="connect_center"><?= HTML::anchor('/Connect/create', 'SIGN IN'); ?> Cliquez ici si vous n'êtes pas déjà inscrit.</p>
	</div>
</div>
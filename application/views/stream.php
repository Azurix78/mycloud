<div class="article_full">
	<div class="bar_titre">
		<h1>Fichier en écoute : <?php echo $file->name; ?> <a href="/File/index/<?php echo $file->id_dir; ?>">&#8617;</a></h1>
	</div>
		<audio controls class="audio_center">
  			<source src="<?php echo $audio; ?>" type="audio/mpeg">
  			<source src="<?php echo $audio; ?>" type="audio/wav">
			Votre navigateur ne supporte pas le streaming.
		</audio>
</div>
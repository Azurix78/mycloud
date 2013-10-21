<div class="article_full">
	<div class="bar_titre">
		<h1>Fichiers que vous partagez</h1>
	</div>
	<div id="share">
		<?php echo Form::open('/Share/add'); ?>
		<fieldset>
		<legend>Ajouter un fichier</legend>
		<div class='block'>
			<?php
			if($file)
        	{
        	?>
			<div class="right">
				<?php echo Form::submit('addshare', 'Partager',array('class' => 'in_sub')); ?>
			</div>
			<?php echo Form::input('email', '', array('placeholder' => 'email de votre amis','pattern' => "[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$")); ?>
			<div class="error">
				<?php echo __(Arr::get($errors, 'email')); ?>
			</div>
			<?php
			}
        		if($file)
        		{
        			?>
        			<select name="file" id="file">
        			<?php
        			foreach ($file as $value)
        			{
        				?>
        				<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
        				<?php
        			}
        			?>
        			</select>
        			<?php
        		}
        		else
        		{
        			?>
        			<p>Vous n'avez pas de fichier à partager.</p>
        			<?php
        		}
        			
        		?>
      		
		</div>
		</fieldset>
		<?php echo Form::close(); ?>

		<table>
			<tr>
				<th class="bor_d">Type</th>
				<th class="bor_d">Nom du fichier</th>
				<th class="bor_d">Partage avec</th>
				<th>Action</th>
			</tr>
			<?php
			if ($share)
			{
				foreach ($share as $value)
				{
					?>
					<tr>
						<td>
							<?php
							switch ($value->type)
							{
								case 'text':
									echo '✐';
									break;
								
								case 'video':
									echo '►';
									break;
								
								case 'audio':
									echo '♫';
									break;
								
								case 'application':
									echo '☸';
									break;
								
								default:
									echo '▨';
									break;
							}
							?>
						</td>
						<td><?php echo $value->name; ?></td>
						<td><?php echo $value->email_share; ?></td>
						<td><a href='/Share/del/<?php echo $value->id; ?>'>&#10006;</a>
						</td>
					</tr>
					<?php
				}
			}
			else
			{
				?>
					<tr><td colspan="3" style="text-align:center;">Vous n'avez pas encore partagé de fichier.</td></tr>
				<?php
			}
			
			?>
		</table>
	</div>
</div>

<div class="article_full">
	<div class="bar_titre">
		<h1>Fichiers partagés avec vous</h1>
	</div>
	<div id="share">
		<table>
			<tr>
				<th class="bor_d">Type</th>
				<th class="bor_d">Nom du fichier</th>
				<th>Action</th>
			</tr>
			<?php
			if ($shared)
			{
				foreach ($shared as $value)
				{
					?>
					<tr>
						<td>
							<?php
							switch ($value->type)
							{
								case 'text':
									echo '✐';
									break;
								
								case 'video':
									echo '►';
									break;
								
								case 'audio':
									echo '♫';
									break;
								
								case 'application':
									echo '☸';
									break;
								
								default:
									echo '▨';
									break;
							}
							?>
						</td>
						<td><?php echo $value->name; ?></td>
						<td><a href='/Share/dwl/<?php echo $value->id; ?>'>▼</a>
							<?php if ($value->ext == '.wav' OR $value->ext == '.mp3') { ?>
							<a href='/Share/stream/<?php echo $value->id; ?>'>♪</a>
							<?php } ?>
						</td>
					</tr>
					<?php
				}
			}
			else
			{
				?>
					<tr><td colspan="3" style="text-align:center;">Personne n'a partagé de fichier avec vous.</td></tr>
				<?php
			}
			
			?>
		</table>
	</div>
</div>



<? if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<? ob_start() ?>

<div class="container">
	<div class="row">
		<? foreach ($data['images'] as $image): ?>
		<div class="col-md-4"><a href="?action=edit&id=<?= $image['id']?>">
			<img src="storage/<?= $image['name']?>.png" alt="" class="img-thumbnail">
		</a></div>
		<? endforeach; ?>
	</div>
</div>

<? $content = ob_get_clean() ?>

<? include 'layout.php' ?>
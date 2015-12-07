<? if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<? ob_start() ?>

<div class="container">
	<? if ($data['warning'][0] != '') : ?>
		<div class="alert alert-warning"><?= implode( $data['warning'])?></div>
	<? endif; ?>
	<form action="" method="post">
		<div class="form-group">
			<label for="password">Укажите пароль для доступа к рисунку</label>
			<input type="password" name="password" id="password" class="form-control">
			<input type="hidden" name="id" id="id" value="<?= $data['img']['id']?>">
		</div>
		<input type="submit" class="btn btn-default btn-success" value="Отправить" id="password-submit">
	</form>
</div>

<? $content = ob_get_clean() ?>

<? include 'layout.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	echo $this->Html->charset();
	echo $this->Html->meta('keywords', Configure::read('App.keywords'));
	echo $this->Html->meta('description', Configure::read('App.description'));
	echo $this->Html->tag('title', String::insert(Configure::read('App.title'), Set::flatten(array_merge(Configure::read('App'), array('title' => $title_for_layout)))));
	echo $this->Html->meta('icon');

	echo $this->Html->css(array(
		'/flour/css/blueprint',
		'/flour/css/cake.generic',
		'/flour/css/admin.form',
		'/flour/css/tipsy',
		'/flour/css/ui-lightness/jqueryui'
	));
	echo $this->Html->script(array(
		'/flour/js/jquery/jquery',
		'/flour/js/jquery/jqueryui',
		'/flour/js/jquery/form',
		'/flour/js/jquery/tipsy',
		'/flour/js/jquery/blockui',
		'/flour/js/init'
	));

	echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<?php echo $html->div('', $this->element('nav.user'), array('id' => 'navUser')); ?>
		<div id="header">
			<h1><?php
				echo $this->Html->div('crumbs');
					echo $html->link( Configure::read('App.name'), '/');
					$temp = $html->getCrumbs(Configure::read('App.breadcrumb'));
					if(!empty($temp)) echo Configure::read('App.breadcrumb').' '.$temp;
				echo $this->Html->tag('/div'); //div.crumbs
			?></h1>
		</div>
		<?php echo $html->div('', $this->element('nav.main'), array('id' => 'navMain')); ?>
		<div id="content">

			<?php
			echo $session->flash();
			echo $content_for_layout;
			?>

		</div>
		<div id="footer">
			<?php echo $this->element('footer'); ?>
		</div>
		<div id="copyright">
			<?php echo $this->Html->link(
					$this->Html->image('/flour/img/bruensicke-logo.png', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://bruensicke.com/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
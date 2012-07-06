<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width" />
	<title>Amistad Cristiana Madrid</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('foundation');
		echo $this->Html->css('app');
		echo $this->Html->css('ac');
		echo $this->Html->css('ie');

		echo $this->Html->script('jquery-1.5.1.min');
		echo $this->Html->script('jquery.orbit-1.2.3.min');
		echo $this->Html->script('app');
		echo $this->Html->script('foundation');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container" class="wrapper">
		<div class="container" id="header">
	      <a href="https://www.facebook.com/amistadcristianamadrid" target="_blank">Facebook</a> | <a href="https://twitter.com/#!/AmistadMadrid" target="_blank">Twitter</a> | <a href="http://www.youtube.com/user/AmistadMadrid" target="_blank">Youtube</a>
	   </div>
		<div id="content" class="container">
			<div class="row">
				<div class="four columns lateral">
					<a href="<? echo $this->Html->url('/', true);?>"><img src="<? echo $this->Html->url('/');?>images/logo.png" alt="amistad cristiana madrid" class="logo"></a>
				</div>
				<div class="eight columns">
					<div class="row">
						<div class="menu container">
							<ul>
							   <li><a href="/" <?if($pageActive=='index'){ echo'class="active"';}?> >inicio</a></li>
							   <li><a href="/conocenos" <?if($pageActive=='historia'||$pageActive=='vision'||$pageActive=='valores'||$pageActive=='legalidad'){ echo'class="active"';}?>>conócenos</a></li>
							   <li><a href="/areas" <?if($pageActive=='areas'){ echo'class="active"';}?>>áreas</a></li>
							   <li><a href="/ensenanzas" <?if($pageActive=='ensenanzas'){ echo'class="active"';}?>>enseñanzas</a></li>
							   <li><a href="/contacto" <?if($pageActive=='contacto'){ echo'class="active"';}?>>contacto</a></li>
							</ul>
						</div>
					</div>
					<div class="row"><?if($pageActive=='historia'||$pageActive=='vision'||$pageActive=='valores'||$pageActive=='legalidad'){echo $this->element('submenu');}?></div>
				</div>

			</div>


			<?php echo $this->Session->flash(); ?>


			<?php echo $this->fetch('content'); ?>
		</div>
		<div class="push"></div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<footer id="footer" class="hide-on-phones hide-on-tablets footer">
	   <div class="footertitle container">
	      <div class="row">
	         <div class="pestanya">
	         Actividades semanales
	         </div>
	      </div>
	   </div>
	   <div class="footermenu">
	   <div class="container">
	      <div class="row">
	         <div class="twelve columns centered">
	            <div class="columfooter">
	               <h4>Reunión General</h4>
	               Domingos. 11:30h
	               c/ Galileo 100 >
	               <a href="#">ver mapa</a>
	            </div>
	            <div class="columfooter">
	               <h4>Ignition</h4>
	               Jóvenes en edad universitaria
	               Martes. 20:00h
	               <a href="http://facebook.com/IgnitionMadrid">facebook.com/IgnitionMadrid</a>
	            </div>
	            <div class="columfooter">
	               <h4>Reunión de Oración</h4>
	               Miércoles, 14:00 y 20:00h
	            </div>
	            <div class="columfooter">
	               <h4>Redes</h4>
	               Profesionales
	               Jueves, 20:00h
	               <a href="http://facebook.com/RedesAmistadCristiana">facebook.com/RedesAmistadCristiana</a>
	            </div>
	            <div class="columfootermini">
	               <h4>Grupos en casa</h4>
	               <a href="#">ver zonas
	               y horarios</a>
	            </div>
	            </div>
	         </div>
	      </div>
	   </div>

	   <div class="minifooter ">
	     <p> © 2012 Amistad Cristiana Madrid  | c/ Vallehermoso 70, Madrid (España)  |  T. 91 448 44 11<p>
	   </div>

	</footer>
</body>
</html>

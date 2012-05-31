<div class="row">
	<div class="four columns lateral">
		<p>AMISTAD CRISTIANA MADRID
		IGLESIA CRISTIANA MADRID</p>
		<p>Creemos que la Biblia es la Palabra inspirada por Dios para el mundo actual y que Jesucristo pagó un precio muy alto por nuestros errores.</p> 

		<p class="slogan">Aquí tienes tu casa.</p>

	</div>

	<div class="eight columns">
		<div class="featured container">
		<div id="featured">
			<? foreach($images as $image):;?>
		     <a href="http://<? echo $image['Image']['link'];?>" target="_balnk"><img src="<? echo $this->Html->url('/');?>files/images/thumb/max/<? echo $image['Image']['image']; ?>" alt="ayuno" /></a>
		    <? endforeach;?>

		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	     $(window).load(function() {
	         $('#featured').orbit({
	         directionalNav: false,
	         });
	     });
	</script>
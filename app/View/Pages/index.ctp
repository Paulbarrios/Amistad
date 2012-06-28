<div class="row">
	<div class="four columns lateral">
		<p>AMISTAD CRISTIANA MADRID
		IGLESIA CRISTIANA MADRID</p>
		<!--p>Creemos que la Biblia es la Palabra inspirada por Dios para el mundo actual y que Jesucristo pagó un precio muy alto por nuestros errores.</p-->
		Amistad Cristiana , (Iglesia Cristiana), está formada por un grupo de personas muy diferentes que tienen en común una relación con Dios, que pagó un precio muy alto por nuestros errores entregando a su hijo Jesús.
Consideramos que Jesucristo es la respuesta a las necesidades más profundas del ser humano; asimismo creemos que la Biblia es la Palabra inspirada por Dios para el mundo actual, representando nuestro código de conducta y la referencia personal de nuestras vidas.
<p>En Amistad cristiana, eres bienvenido</p>

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
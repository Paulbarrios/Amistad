<div class="row">
	<div class="four columns lateral">
		<p>AMISTAD CRISTIANA MADRID | IGLESIA CRISTIANA MADRID | AMISTAD CRISTIANA</p>
<p>Amistad Cristiana es una Iglesia Cristiana formada por un grupo de personas muy diferentes que comparten una relación personal con Dios,  que pagó un precio muy alto por nuestros errores y pecados, entregando a su propio hijo Jesús para rescatarnos de las consecuencias de nuestros actos.
Consideramos que Jesucristo es la respuesta a las necesidades más profundas del ser humano. Cristo Jesús hace posible la reconciliación de cada uno de nosotros con nuestro Creador.
Creemos que la Biblia es la Palabra inspirada por Dios para el mundo actual, representando nuestro código de conducta y la referencia personal de nuestras vidas. </p><p>En Amistad Cristiana, eres bienvenido</p>
<p class="slogan">AQUÍ TIENES TU CASA</p>

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
	         	animation: 'fade',                  // fade, horizontal-slide, vertical-slide, horizontal-push
	         });
	     });
	</script>
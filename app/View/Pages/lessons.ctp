<div class="row">
	<div class="three columns offset-by-eight">
		<a href="itpc://amistad.trial-web.net/rss">
			<img src="<? echo $this->Html->url('/');?>images/logopodcast.png" width="200px" height="70px" border="0">
		</a>
	</div>
</div>
<div class="row">
	<?php foreach ($lessons as $lesson): ?>
		<div class="ten columns centered lessons2">
			<div class="seven columns">
				<div><h4><?php echo ($lesson['Lesson']['title']); ?></h4></div>
				<div><p>Autor: <?php echo ($lesson['Lesson']['author']); ?></p></div>
				<div><p>Fecha: <?php echo ($lesson['Lesson']['date']); ?></p></div>
				<div class="reproductor">
					<object type="application/x-shockwave-flash" data="/dewplayer/dewplayer-mini.swf" width="160" height="20" id="dewplayer" name="dewplayer">
						<param name="wmode" value="transparent" />
						<param name="movie" value="dewplayer-mini.swf" />
						<param name="flashvars" value="mp3=/mp/<?php echo ($lesson['Lesson']['url']); ?>&amp;showtime=1" />
					</object>
				</div>
        <div><a href="<?php echo ($this->Html->url('/mp', true)."/".$lesson['Lesson']['url']);?> " target = "blank">Descarga</a></div>
			</div>
			<div class="three columns">
				<div><? echo $this->Amistad->videos($lesson['Lesson']['video'], 'Video', 270, 140); ?></div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<div>
  <?php
    echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
  ?>
</div>
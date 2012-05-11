<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
	<channel>
		<title>Amistad Cristiana Madrid</title> 
		<link>http://www.amistadcristianamadrid.org</link>
		<description>Predicaciones Amistad Cristiana Madrid</description>
		<language>es</language>
		<copyright>www.amistadcristianamadrid.org</copyright>
		<itunes:subtitle>Predicaciones Iglesia Evnagélica Amistad Cristiana Madrid</itunes:subtitle>

		<itunes:author>Iglesia Evangélica Amistad Cristiana Madrid</itunes:author>

		<itunes:summary>Predicaciones Semanales Iglesia Evangélica Amistad Cristiana Madrid</itunes:summary>

		<description>Predicaciones Amistad Cristiana Madrid</description>

		<itunes:owner>

		<itunes:name>Iglesia Evangélica Amistad Cristiana Madrid</itunes:name>

		<itunes:email>info@amistadcristianamadrid.org</itunes:email>

		</itunes:owner>
		<itunes:image href="http://www.amistadcristianamadrid.org/images/am.jpg" />
		<itunes:image href="http://example.com/podcasts/everything/AllAboutEverything.jpg" />
		<itunes:category text="Religion &amp; Spirituality">

		<itunes:category text="Christianity"/>

		</itunes:category>'
		<?
		foreach ($lessons as $lesson) {
			echo '<item>

			<title>'.$lesson['Lesson']['title'].'</title>

			<itunes:author>'.$lesson['Lesson']['author'].'</itunes:author>

			<itunes:subtitle>'.$lesson['Lesson']['description'].'</itunes:subtitle>

			<itunes:summary>Predicaciones Amistad Cristiana Madrid</itunes:summary>

			<enclosure url="http://www.amistadcristianamadrid.org/admin/mp/'.$lesson['Lesson']['url'].'" length="8727310" type="audio/mp3" />

			<guid>http://www.amistadcristianamadrid.org/admin/mp/'.$lesson['Lesson']['url'].'</guid>

			<pubDate>'.$lesson['Lesson']['date'].'</pubDate>

			<itunes:duration>30:00</itunes:duration>

			<itunes:keywords>cristiana, madrid, amistad, iglesia, Predicaciones</itunes:keywords>

			</item>';
		}
		?>
	</channel>
</rss>


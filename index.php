<?php 
	get_header();
?>
		<section class="timeline">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post();  ?>
					<?php switch ($format) {
						case 'news':
							include('cards/news.php');
							break;
						case 'audio':
							include('cards/music.php');
							break;
						case 'picture':
							include('cards/picture.php');
							break;
						default:
							include('cards/blog.php');
							break;
					} ?>

				<?php endwhile; ?>
			<?php else: ?>
				没有文章
			<?php endif; ?>
			<?php pagination($query_string); ?>  
		</section>
		<span id="ajax-line">2</span>
<?php 
	get_footer();
?>
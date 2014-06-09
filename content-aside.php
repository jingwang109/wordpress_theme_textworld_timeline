<?php 
	get_header();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<h2><?php the_title(); ?></h2>
						<div class="article-content">
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php 
	get_footer();
?>
<?php 
	get_header();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="article-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php 
	get_footer();
?>
<?php 
	get_header();
?>
		<div id="index-header" class="clearfix">
			<div class="index-title">
				<h1>Saying:</h1>
				<p>There is no certainty, only opportunity。</p>
			</div>
			<div class="index-slider">
				<div class="index-img">
					<a href="javascript:void(0);">
						<img src="<?php bloginfo('template_url'); ?>/image/rxy.jpg" alt="Ta">
					</a>
				</div>
			</div>
		</div>
		<p class="follow-us-here">
			follow me here
			<span></span>
		</p>
		<hr class="double-line">
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
			<?php //pagination($query_string); ?>  
		</section>
		<div id="LoadingTip" style="display:none;text-align:center;"><h4>正在加载中</h4></div>
		<div id="LoadedTip" style="display:none;text-align:center;"><h4>加载完成</h4></div>
<?php 
	get_footer();
?>
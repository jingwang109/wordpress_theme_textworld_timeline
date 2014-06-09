	</div>
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="com-md-12">
					<p>
						<span>&copy; <?php echo( date('Y') ); ?> Textworld </span>
						<span class="meta-sep">&para;</span>
						<span>Powered By WordPress <?php bloginfo('version'); ?> </span>
						<span class="meta-sep">&para;</span>
						<span>主题自制</span>
						<span class="meta-sep">&para;</span>
						<span><a target="_blank" href="http://www.miibeian.gov.cn"><?php echo get_option('zh_cn_l10n_icp_num'); ?></a></span>
						
					</p>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer();?>
	<!-- google analytics code-->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-49502035-1', 'textworld.me');
	  ga('send', 'pageview');
	</script>
</body>
</html>
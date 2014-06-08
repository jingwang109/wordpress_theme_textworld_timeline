					<article class="post post-music">
						<aside>
							<div class="roundcircle timeline-icon">
								<span class="post-type hide">news</span>
								<img src="<?php bloginfo('template_url'); ?>/image/music170.png" alt="music">
							</div>
							<a class="roundcircle timeline-time">
								<time><?php the_time('Y年n月j日') ?></time>
							</a>
						</aside>
						<section>
							<div id="simple-player">
								<ul class="sp-player-controller">
									<li class="sp-player-play"><a class="fa fa-play"></a></li>
									<li class="sp-player-pause hide"><a class="fa fa-pause"></a></li>
								</ul>
								
							</div>
							<header><h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2></header>
							<div class="content">
								<?php $music = get_attached_media('audio', get_the_ID()); ?>
							</div>
						</section>
					</article>
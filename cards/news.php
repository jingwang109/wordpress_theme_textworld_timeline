					<article class="post post-news">
						<aside>
							<div class="roundcircle timeline-icon">
								<span class="post-type hide">news</span>
								<img src="<?php bloginfo('template_url'); ?>/image/news.png" alt="client">
							</div>
							<a class="roundcircle timeline-time">
								<time><?php the_time('Y年n月j日') ?> </time>
							</a>
						</aside>
						<section>
							<img src="<?php bloginfo('template_url'); ?>/image/normal.png" alt="">
							<header><h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2></header>
							<div class="content">
								<?php the_content('阅读全文...', true); ?> 
							</div>
						</section>
					</article>
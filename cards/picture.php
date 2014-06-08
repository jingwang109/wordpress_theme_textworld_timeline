			<article class="post post-carousel">
				<aside>
					<div class="roundcircle timeline-icon">
						<span class="post-type hide">相册</span>
						<img src="<?php bloginfo('template_url'); ?>/image/camera7.png" alt="client">
					</div>
					<a class="roundcircle timeline-time">
						<time><?php the_time('Y年n月j日') ?></time>
					</a>
				</aside>
				<section>
					<?php $pictures = get_attached_media('image', get_the_ID());?>
					<header><h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2></header>
					<div id="carousel-<?php echo the_ID(); ?>" class="carousel slide" data-ride="carousel">
  						<!-- Indicators -->
  						<ol class="carousel-indicators">
  							<?php $i = 0; ?>
  							<?php foreach ($pictures as $key => $value): ?>
								<?php if ($i == 0){ $class = "active";}else{$class = "";}?>
  								<li data-target="#carousel-<?php echo the_ID();?>" data-slide-to="<?php echo $i; ?>" class="<?php echo $class; ?>"></li>
  								<?php $i++; ?>
  							<?php endforeach ?>
  						</ol>

						<div class="carousel-inner">
						<?php $i = 0; ?>
						<?php foreach ($pictures as $key => $value): ?>
							<?php if ($i == 0){ $class = "active";}else{$class = "";} $i++;?>
							<div class="item <?php echo $class; ?>">
						  		<img src="<?php echo $value->guid; ?>" alt="<?php echo $value->post_title; ?>" style="width:830px;height:496px;">
						  		<div class="carousel-caption">
						    		<?php echo $value->post_title; ?>
						  		</div>
							</div>
						<?php endforeach ?>
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-<?php echo the_ID(); ?>" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-<?php echo the_ID(); ?>" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
		
					</div>
				</section>
			</article>
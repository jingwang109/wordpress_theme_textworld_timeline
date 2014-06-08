<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="wb:webmaster" content="c7f6f9e8bdd02cf7" />
	<title><?php bloginfo('name'); ?><?php wp_title( '|'); ?></title>
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/awsomefont.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-family.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-easing.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/angular.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>
	<script src=" http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1695322929" type="text/javascript" charset="utf-8"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script type="text/javascript">
		window.console = window.console || {log: function(info){}};
	</script>
</head>
<body style="background-image:url('<?php bloginfo('template_url'); ?>/image/bg3.jpg');" id="music-body"  ng-app="PlayerApp">
	<div class="hm" ng-controller="PlayerController">
		<div class="wrap">
		<?php $music = get_attached_media('audio', get_the_ID()); ?>
		<?php $imgs = get_attached_media('image', get_the_ID()); ?>
		<!-- <?php var_dump($imgs); ?>-->
			<div class="hm-player" style="background-image:url('{{ player.current.thumb }}');">
				<a class="hm-player-list"></a>
				<div class="hm-player-content">
					<div class="hm-player-title">
						<h3>{{ player.current.title | music_title }}</h3>
						<p>{{ player.current.author }}</p>
						<p ng-if="player.current">
							<span ng-if="!player.ready" style="color: #fff;font-size: 18px;">缓冲中.......</span>
						</p>
					</div>
					<div class="hm-player-progress">
						<div class="player-progress-bg">
							<div class="player-progress-played" style="width: {{ player.progress_percent }}%;"></div>
			        		<div class="player-progress-cached" style="width: 0%;"></div>
						</div>
					</div>
					<div class="hm-player-control">
						<a class="hm-player-controller hm-pre"   ng-click="player.previous()"></a>
						<a class="hm-player-controller hm-pause"  ng-show="player.playing" ng-click="player.stop()"></a>
						<a class="hm-player-controller hm-play" ng-hide="player.playing" ng-click="player.play()"></a>
						<a class="hm-player-controller hm-next"  ng-click="player.next()"></a>
					</div>
					<span class="hide">
						<p id="hm-share-title"></p>
						<p id="hm-share-pic"></p>
						<p id="hm-share-summary"></p>
					</span>
				</div>
			</div>
			<div class="hm-share" style="text-align:center;">
				<i id="share_btn" class="fa fa-weibo" title="分享到新浪微博" target="_blank" style="color:#fff;cursor:pointer;font-size:28px;"></i>
			</div>
		</div>
		
		<div class="hm-player-asidebox" id="hm-player-asidebox">
			<div class="hm-player-boxheader">
				<a href="javascript:void(0);" class="hm-btn pull-left">歌曲</a>
				<a href="javascript:void(0);" class="hm-btn-exit pull-right" id="hide_box">X</a>
			</div>
			<div class="hm-player-boxcontent">
				<ul class="hm-player-lists">
					<li ng-repeat="program in player.current_page" ng-click="player.play(program)">
						<div class="hm-player-thumb"><img src="{{ program.thumb }}" alt=""></div>
						<div class="hm-player-detail">
							<h4>{{ program.title }}</h4>
							<p>{{ program.author }}</p>
							<i>{{ program.post_content }}</i>
						</div>
					</li>
					<!--
					<li>
						<div class="hm-player-thumb"><img src="<?php bloginfo('template_url'); ?>/image/thumb.jpg" alt=""></div>
						<div class="hm-player-detail">
							<h4>Begin Again</h4>
							<p>measure</p>
							<i>火车车厢一样的声音</i>
						</div>
					</li>
					<li>
						<div class="hm-player-thumb"><img src="<?php bloginfo('template_url'); ?>/image/thumb.jpg" alt=""></div>
						<div class="hm-player-detail">
							<h4>Begin Again</h4>
							<p>measure</p>
							<i>火车车厢一样的声音</i>
						</div>
					</li>
					<li>
						<div class="hm-player-thumb"><img src="<?php bloginfo('template_url'); ?>/image/thumb.jpg" alt=""></div>
						<div class="hm-player-detail">
							<h4>Begin Again</h4>
							<p>measure</p>
							<i>火车车厢一样的声音</i>
						</div>
					</li>
					<li>
						<div class="hm-player-thumb"><img src="<?php bloginfo('template_url'); ?>/image/thumb.jpg" alt=""></div>
						<div class="hm-player-detail">
							<h4>Begin Again</h4>
							<p>measure</p>
							<i>火车车厢一样的声音</i>
						</div>
					</li>!-->
				</ul>
			</div>
			<div class="hm-pages">
				<ul class="pagination">
					<li ng-repeat="page in player.page_num">
						<a ng-click="player.set_page(page)">{{ page }}</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--
	<?php var_dump($music); ?>
	-->
	<script type="text/javascript">
	(function(){
		$('#hide_box').click(function(){
			$('#hm-player-asidebox').animate({left: "-100%"}, 'fast', 'easeInQuad');
		});
		$('.hm-player-list').click(function(){
			$('#hm-player-asidebox').animate({left: "0"}, 'normal', 'easeInQuad');
		});
	}());
	</script>
	<script type="text/javascript">
		var app = angular.module('PlayerApp', []);
		var formatTime = function(time){
			if (time < 10){
				return "0" + time;
			}else{
				return time;
			}
		}
		app.filter('music_length', function(){
			return function(input){
				var sec = parseInt(input);
				if (input){
					var hour = 0, min = 0;
					if(parseInt(sec / 3600) > 0){
						hour = parseInt(sec/3600);
						sec = sec - hour * 3600;
					}
					if(parseInt(sec / 60) > 0){
						min = parseInt(sec / 60);
						sec = sec - min * 60;
					}

					return formatTime(hour) + ":" + formatTime(min) + ":" + formatTime(sec);
				}else{
					return "00:00:00";
				}
				
			}
		});
		app.filter('music_title', function(){
			return function(title){
				if (title){
					return title;
				}else{
					return '音乐播放器';
				}
			};
		});
		app.factory('audio', function($document){
			var audio = $document[0].createElement('audio');
			return audio;
		});

		app.factory('hrRpcService', function($http){
			var doRequest = function(){
				return $http({
					method: 'JSONP',
					url: "http://localhost/hduradio/index.php?r=api/list&callback=JSON_CALLBACK"
				});
			}
			return {
				programs: function(){
					return doRequest();
				}
			}
		});

		app.factory('player', function(audio, $rootScope){
				var player = {
					current: null,
					playing: false,
					ready: false,
					programs: null,
					page_per_num: 1,
					current_page: null,
					page_num: 0,
					play: function(program){
						if (player.playing){
							player.stop();
						}
						if (program){
							var url = program.url;
							player.current = program;
							audio.src = url;
							location.hash = "#" + program.id;
						}
						player.current_page = player.get_page(1);
						audio.play();
						player.playing = true;
						document.title = program.title + ' | ' + '<?php bloginfo('name'); ?><?php wp_title( '|'); ?>';
						$('#hm-share-title').text(program.title);
						$('#hm-share-pic').text(program.thumb);
					},
					stop: function(){
						if (player.playing){
							audio.pause();
							player.playing = false;
							//player.current = null;
						}
					},
					previous: function(){
						console.log(player.currentIndex);
						if (player.currentIndex == 0){
							player.currentIndex = player.programs.length - 1;
						}else{
							player.currentIndex -- ; 
						}
						player.play(player.programs[player.currentIndex]);
					},
					next: function(){
						if (player.currentIndex == player.programs.length){
							player.currentIndex = 0;
						}else{
							player.currentIndex ++ ; 
						}
						player.play(player.programs[player.currentIndex]);
					},
					get_page:function(the_page){
						if (parseInt(the_page, 10) != null){
							console.log('get_page' + ' ' + the_page);
							var the_start = (the_page - 1) * player.page_per_num;
							console.log('the_start ' + the_start);
							if (the_start >= 0 && the_start < player.programs.length ){
								var the_end = the_start + player.page_per_num - 1;
								var page_data = new Array();
								for(var i = the_start; i <= the_end; i++ ){
									page_data.push(player.programs[i]);
								}
								console.log(player.programs[0]);
								console.log(page_data);
								return page_data;
							}else{
								return null;
							}
						}else{
							console.log('the_page is not the number. the_page is '+ the_page);
						}
					},
					set_page:function(the_page){
						player.current_page = player.get_page(the_page + 1);
						console.log('current_page ');
						console.log(player.current_page);
					},
					get_pages:function(){
						var num_pages = parseInt(player.programs.length / player.page_per_num, 10) + ((player.programs.length % player.page_per_num == 0) ? 0 : 1);
						console.log('..'+player.programs.length);
						console.log('..'+player.page_per_num);
						console.log('..'+num_pages);

						var pages = new Array();
						for(var i = 0 ; i < num_pages; i++){
							pages.push(i);
						}
						console.log(pages);
						return pages;
					},
					currentTime: function(){
						return audio.currentTime;
					},
					currentDuration: function(){
						return audio.duration;
					}
				};
				audio.addEventListener('canplay', function(){
					$rootScope.$apply(function() {
		      			player.ready = true;
		    		});
				});

				audio.addEventListener('timeupdate', function(){
					$rootScope.$apply(function(){
						player.progress = player.currentTime();
						player.progress_percent = player.progress / player.currentDuration() * 100;
					});
				});

				audio.addEventListener('ended', function(){
					$rootScope.$apply(function(){
						player.next();
					});
				});
				return player;
			}
		);

		// app.controller('PlayerController', function($scope, player, hrRpcService){
		// 	//暂时不用ajax方式，直接用php输出好了
		// 	// hrRpcService.programs().success(function(data, status){
		// 	// 	$scope.programs = data;
		// 	// 	player.currentIndex = 0;
		// 	// 	player.programs = data;
		// 	// 	player.play(data[0]);
		// 	// 	$scope.player = player;
		// 	// });
			
		// });

		app.controller('PlayerController', function($scope, player){
			var data = new Array();
			<?php 
				$i = 0;
				$music_thumb = array();
				foreach($imgs as $key => $value){
					$music_thumb[$i++] = $value;
				} 
			?>
			<?php $i = 0; ?>
			<?php foreach($music as $key => $value): ?>
				var m = {       title: "<?php echo $value->post_title; ?>"                 , 
						          url: "<?php echo $value->guid; ?>"                       ,
						 post_content: "<?php echo $value->post_content; ?>"               ,
							   author: "<?php echo $value->post_excerpt ? $value->post_excerpt : '佚名'; ?>" ,
								thumb: "<?php echo $music_thumb[$i++]->guid; ?>",
								   id: "<?php echo $value->ID; ?>"};
				data.push(m);
			<?php endforeach; ?>
			var id = location.hash ? parseInt(location.hash.substr(1)) : "",
				dataindex = 0;
			if (id){
				for(var i = 0; i < data.length; i++){
					if(data[i].id == id){
						dataindex = i;
					}
				}
			}
			$scope.programs = data;
			player.currentIndex = dataindex;
			player.programs = data;
			player.page_num = player.get_pages();
			player.play(data[dataindex]);
			$scope.player = player;
		});

	</script>
	<script type="text/javascript">
		(function(window, document){
			function isFunction(obj){ return typeof obj === 'function'; }
			function isString(obj){ return typeof obj === 'string'; }
			function isObject(obj) { return typeof obj === 'object'; }

			function forEach(obj, iterator, context){
				var key;
				if (obj){
					if (isObject(obj)){
						if (obj.forEach && obj.forEach == forEach){
							console.log('support own foreach');
							obj.forEach(iterator, context);
						}else{
							for(key in obj){
								if (obj.hasOwnProperty(key)){
									iterator.call(context, obj[key], key);
								}
							}
						}					
					}
				}
			}

			function shallowCopy(src, dst){
				var dst = dst || {};
				for(var key in src){
					if (src.hasOwnProperty(key)){
						dst[key] = src[key];
					}
					
				}
				return dst;
			}

			var share_weibo = function(document, config){
				//if (typeof document == undefined) document = window.document;
				this.api_url = "http://v.t.sina.com.cn/share/share.php?";
				this.conf = {
					appkey: '1695322929',				
					url: document.location.href,
					pic: "",
					title: document.title,
					source: '杭电记忆',
					retcode: '0'
				};

				this.setParams(config);

				forEach(this.conf, function(value, key){
					if (isFunction(value)){
						console.log([key, value()].join("-"));
					}else if (isString(value)){
						console.log([key, value].join("-"));
					}
				});
			};

			share_weibo.prototype.setParam = function(key, value){
				if (isFunction(value) || isString(value) && (key in this.conf)){
					this.conf[key] = value;
				}
			};

			share_weibo.prototype.getParam = function(key){
				return isFunction(this.conf[key]) ? this.conf[key]() : this.conf[key];
			};

			share_weibo.prototype.setTitle = function(title) {
					this.setParam('title', title);
			};

			share_weibo.prototype.setParams = function(config){
				forEach(config, function(value, key){
					if (key && key in this.conf){
						this.setParam(key, value);
					}
				}, this);
			};

			share_weibo.prototype.getTitle = function(){
				if (isFunction(this.conf.title)){
					return this.conf.title();
				}else{
					return this.conf.title;
				}
			};

			share_weibo.prototype.joinParams = function(conf){
				conf = conf || this.conf;
				var c = shallowCopy(conf),
					s = "";
				forEach(c, function(value, key){
					c[key] =  this.encodeURIComponent(this.getParam(key));
					s +=  key +  "=" + c[key] + "&";
				}, this);
				s = s.substring(0, s.length - 2);
				return s;
			};

			share_weibo.prototype.encodeURIComponent = function(url){
				return encodeURIComponent ? window.encodeURIComponent(url) : function(url){ return url; };
			};

			share_weibo.prototype.open_share_window = function(){
				try{
					console.log(this.joinParams());
					window.open([this.api_url, this.joinParams()].join(''), 'mb', ['toolbar=0,status=0,resizable=1,width=620,height=450,left=',(screen.wdith - 620) / 2, ',top=', (screen.height - 450) / 2].join(''));
				}catch(e) {
					console.log("window_open failed");
				}
			};

			$('#share_btn').click(function(){
				var sh_b = new share_weibo(document, 
					{title: function(){
							return document.title + '来自杭电音悦台';
						}, 
						pic: function(){ 
							return $('#hm-share-pic').text(); 
						}
					});
				sh_b.open_share_window();
			});
		})(window, document);
		
	</script>
	<?php wp_footer();?>
</body>
</html>
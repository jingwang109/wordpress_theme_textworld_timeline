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
	}
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
			play: function(program){
				if (player.playing){
					player.stop();
				}
				if (program){
					var url = program.url;
					player.current = program;
					audio.src = url;
				}
				
				audio.play();
				player.playing = true;
			},
			stop: function(){
				if (player.playing){
					audio.pause();
					player.playing = false;
					//player.current = null;
				}
			},
			previous: function(){
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
				player.progress_percent = player.progress / player.currentDuration();
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

app.controller('PlayerController', function($scope, player, hrRpcService){
	hrRpcService.programs().success(function(data, status){
		$scope.programs = data;
		player.currentIndex = 0;
		player.programs = data;
		player.play(data[0]);
		$scope.player = player;
	});
	
});

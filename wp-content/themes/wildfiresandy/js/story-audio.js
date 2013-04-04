var MediaPlayer = {};
jQuery(document).ready(function($) {
	MediaPlayer.playerBox = $(".player");
	var playerW = MediaPlayer.playerBox.width();
	//setup
	MediaPlayer.storyaudio = $('<audio>');
	MediaPlayer.storyaudio.attr({'id':'storyaudio', 'type':'audio/mp3', 'src': MediaPlayer.playerBox.attr('audiosrc'), 'controls': 'controls'});
	MediaPlayer.playerBox.append(MediaPlayer.storyaudio);
	console.log("sanity check for story audio template dir :"+templateDir+" parent width = "+playerW);	
	//console.log("audio at "+MediaPlayer.storyaudio.attr('src'));
	
	if (MediaPlayer.playerBox){
		var newPlayer = new MediaElementPlayer(MediaPlayer.storyaudio, {
			audioWidth: playerW,
			audioHeight: 30,
			startVolume: 0.8,
			loop: false,
			enableAutosize: true
			});
		}
		
	});

jQuery(document).ready(function($) {
	var doc = $(document);
	var mainDiv = $("#main");
	var cbStoryLoadCheck, cbCloseCheck;
	if($("#cowbird")){
		$("#cowbird").before("<h3 class='gallery-type'>Multimedia</h3>");

		//check for cb load
		var cbCheck=setInterval(function(){checkDOMChange()},100);	
		//on cowbird loaded, add handlers 
		doc.on("cbLoaded", this, function(e) {
			//add click handlers -- to tile and close button
			var storyTiles = $(".cb-lightbox");
			storyTiles.click(function(){ 
				$.event.trigger({
					type : "cbStoryLaunched",
					cbStory : $(this).attr("data-title")
				}); 
			});

		});	

		//on story loaded
		doc.on("cbStoryLaunched", this, function(e){
			//console.log("story launched :"+e.cbStory);
			cbStoryLoadCheck=setInterval(function(){checkCBStoryLoaded()},100);

			//bring to top
			mainDiv.css({"z-index":8});	
		});

		//on story loaded
		doc.on("cbStoryLoaded", this, function(e){
			cbCloseCheck = setInterval(function(){checkCBClose()},100);	
		});

		//on story loaded
		doc.on("cbCloseReady", this, function(e){
			//console.log("cb close button ready");

			var closeButton = $(".cb-close-btn a");
			closeButton.click(function(){ 
				$.event.trigger({
					type : "cbCloseClicked",
					cbNav : $(this).parent().attr("data-nav")
				}); 
			});

		});

		//on close clicked
		doc.on("cbCloseClicked", this, function(e){
			//return to below
			mainDiv.css({"z-index":3});
		});	

	}

	var checkDOMChange = function() {
		var cbChildren = $("#cowbird").children();
		// check for #cowbird children

		if(cbChildren.length){
			stopCBCheck();
			var numCBChildren = $(".cb-lightbox").length;
			$.event.trigger({
				type : "cbLoaded",
				numStories : numCBChildren
			});

		}else{
			//console.log("still loading");
		}
	}


	// call the function again after 100 milliseconds
	var stopCBCheck = function(){
		clearInterval(cbCheck);
	}

	var checkCBStoryLoaded = function() {
		var cbStoryContent = $("#cowbird-lightbox");
		// check for #cowbird children

		if(!(cbStoryContent.is(":hidden"))){
			stopCBStoryLoadedCheck();
			$.event.trigger({
				type : "cbStoryLoaded"
			});

		}else{
			//console.log("story not yet loaded");
		}
	}


	// stop
	var stopCBStoryLoadedCheck = function(){
		clearInterval(cbStoryLoadCheck);
	}

	//close
	var checkCBClose = function() {
		var cbClose = $(".cb-close-btn");
		// check for #cowbird children

		if(cbClose.length){
			stopCBCloseCheck();
			$.event.trigger({
				type : "cbCloseReady"
			});

		}else{
			//console.log("close not yet ready");
		}

	}


	// stop
	var stopCBCloseCheck = function(){
		clearInterval(cbCloseCheck);
	}


	if($(".video_list")){
		$(".video_list").before("<h3 class='gallery-type'>Videos</h3>");
	}
});
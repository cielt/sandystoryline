(function(jQuery){
	var SandyGallery = {};
	var refreshInterval = 120000; //FOR FREQUENCY of grab (production : let's do 2 minutes)
	var newGalItems = []; //NEW ITEMS SINCE LAST TIME
	var tempArray = []; //holds all image items from feed (some stories may not include images) 	
	var galleryData = []; //CURRENTLY IN USE -- add objects to array from feed JSON
	var doc = jQuery(document);

	SandyGallery.setup = function(){
		Galleria.configure({
			height: 480,
			autoplay: false,
			transition: 'fadeslide',
			imageCrop: 'height',
			thumbCrop: 'height',
			showInfo: true,
			debug: false,
			transitionSpeed: 600,
			wait: true,
			idleMode : false,
			_toggleCaption: false
		});	
	};

	jQuery(document).ready(function(){
		//cache the gallery
		SandyGallery.gallery = jQuery('#galleria');
		var loader = jQuery("#ssl-loader");

		//CALL our functions
		SandyGallery.setup();

		(function makeRequest() {
		    jQuery.ajax({
			   beforeSend : function(){ loader.show(); },
			   type: "GET",
			   cache : false,
			   url: templateDir+"/scripts/rss-feed-data.php",
			   dataType: "json"
			}).success(function(xdata) {
				//console.log( "data : " + JSON.stringify(xdata)+xdata.stories.channel.item );
				dataCheck(xdata);
				loader.hide();
				SandyGallery.gallery.show();
		
				}).error(function(){ 
					//console.log("error"); 
				});
		    setTimeout(makeRequest, refreshInterval);
		})();


			//DATA READY handler 
			SandyGallery.gallery.bind("dataReady", function(e){
				//console.log("dataReady!");

				//update current galleryData

				// 1) do we have new entries? check date posted
				//will update at least on initial run
				if(e.oNewData.length){
					//console.log(---------------------------------------- e.oNewData.length+"new items found");

					jQuery.event.trigger({
						type : "newData",
						oToAddData : e.oNewData
					});

					} //else data unchanged since last request

				});


				//NEW DATA handler : (re)load up galleria	
				SandyGallery.gallery.bind("newData", function(e){
					//console.log("----------------------------------------newData!"+e.oToAddData);
					// check if galleria has been initialized
					if (SandyGallery.gallery.data('galleria')) {
						var sandyGal = SandyGallery.gallery.data('galleria');
						//console.log("reload gallery: "+e.oToAddData);
						sandyGal.push(e.oToAddData);

						//update galleryData
						galleryData.push(e.oToAddData);
														
						//console.log("----------------------------------------SPLICE to gallery : now "+galleryData.length+" items in galleryData");

						// else initialize galleria (1st time)
					} else {
						galleryData = e.oToAddData;
						SandyGallery.gallery.galleria({
							// add the data as dataSource
							dataSource: galleryData
						});
						//console.log("----------------------------------------INIT gallery with "+galleryData.length+" items");

					}

				});

			});

			var dataCheck = function(jsonData){
				//console.log("dataCheck called: "+jsonData.stories.channel.item.length);
				var lastUpdated = jsonData.date;

				//reset the latest feed items array & new items flag
				tempArray.length = 0;

				//item : array of item objects
				feedItems = jsonData.stories.channel.item;

				//iterate over objects in array; identify & grab image data
				for (var i=0; i<feedItems.length; i++){
					//MOST RECENT will be lowest index, 0
					var current = feedItems[i];

					//check if has image
					var contentSnippet = current.description; //returns string of HTML
					var temp = jQuery("<div>");
					temp.html(contentSnippet);
					var itemImageSrc = temp.find("img").closest("a").attr("href");
					var thumbSrc = temp.find("img").attr("src");
					var shortDesc = temp.find("p").text();
					var pubDate = current.publishedDate;

					//if so, grab it and add to array 
					if(itemImageSrc){
						tempArray.push({
							thumbnail : thumbSrc,
							image : itemImageSrc,
							title : current.title,
							description : shortDesc,
							pubdate : pubDate
						});
						//console.log(current);
					}

				}
				//take diff between newGalItems (latest) and galleryData (current)
				numNew = tempArray.length - galleryData.length;
				//get just the new items
				newGalItems = tempArray.splice(0, numNew);
				//console.log("passing on "+newGalItems.length+" gal items");

				//AFTER LOOP : trigger event : data ready
				jQuery.event.trigger({
					type : "dataReady",
					oNewData : newGalItems,
					oLastUpdated : lastUpdated
				});
			};

})(jQuery);	
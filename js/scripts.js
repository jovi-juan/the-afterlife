var itemData;


$( document ).ready(function() {
	var mobileOn;
	var mobileMod;
	var offsetUp;
	var offsetDown;
	
	var $window=$(window);
	var $document=$(document);
	var prevVideo=0;
	
	//setInterval(function(){ alert("Hello"); }, 3000);
	//setInterval(function(){
		if($document.width()<601){
			mobileMod="_sm";
			mobileOn=1;
			offsetUp="100%";
			offsetDown="0%";
		}else{
			mobileMod="";
			mobileOn=0;
			offsetUp="50%";
			offsetDown="0%";
		}
	//}, 100);
	$.getJSON( "../data/data.json", function( data ) {
		
		itemData=data;
		
		var template = Handlebars.compile($("#items-template").html());
		$(".narrative").prepend(template(data));
		var template_image=Handlebars.compile($("#image-template").html());
		$(".narrative").append(template_image(data));
		
		$(".narrative-item").css("height",$window.height()*2.5);
		
		var textScrollMargin=5;//pads top and bottom
		var startingScroll=100*($window.height()/$document.height());
		var numOfNarrativeItems=$(".narrative-item").length
		var videoBreakPoints=100/numOfNarrativeItems; 
		//startingScroll takes into account the height of the window
		
		t("startingScroll",startingScroll)
		var textBreakPoint=(100-startingScroll)/($(".tchunk").length+(2*textScrollMargin));
		var textMarginVal=(((100-startingScroll)/$(".tchunk").length)-textBreakPoint)/2;
		
		
		t("videoBreakPoints", videoBreakPoints);
		t("textBreakPoint",textBreakPoint);
		t("textMarginVal",textMarginVal);
	
		
		//$(".rc2").removeClass("transparent");
		$(".rc2").addClass("opaque");
		
		var prevScrollPercent=0;
		var transitionVideoScroll;
		var opaque;
		var transp;
		
		window.onscroll = function(){
			//console.log(getScrollPercent())
			//get which video section the reader is on the page
			var currScrollPercent=getScrollPercent();
			var currVideo=(Math.floor(currScrollPercent/(100/numOfNarrativeItems)));
			t("currVideo",currVideo);
			t("prevVideo",prevVideo);
			
			var currVidMargin=videoBreakPoints*currVideo;
			//t("currVidMargin",currVidMargin);
			t("currScrollPercent",currScrollPercent);
			//text logic
			var currFirstFadePoint=startingScroll+(currVidMargin)+ textMarginVal;
			var currSecondFadePoint=currFirstFadePoint+textBreakPoint;
			
			if (currScrollPercent> currFirstFadePoint && currScrollPercent< currSecondFadePoint){
				//fadeUpFirstElement
				t("first target",startingScroll+(currVidMargin) + textMarginVal+textBreakPoint);
				$( ".narrative-item:eq("+currVideo+") .tchunk" ).first().addClass("active");
			}else if(currScrollPercent >= currSecondFadePoint){
				//look at every tchunk element. If it is not full opacity, fade it up
				var currNarrativeItemTchunks=$( ".narrative-item:eq("+currVideo+") .tchunk" );
				var currTextToFreeze=$(".narrative-item:eq("+currVideo+") .body_text");
				//loop thru elements
				currNarrativeItemTchunks.each(function( index ) {
					if(index<currNarrativeItemTchunks.length-1){
						if (currScrollPercent>currSecondFadePoint+(textBreakPoint*index)){
							if(index==0){
								//fix to position
								//currTextToFreeze.addClass("sticky");
								//currTextToFreeze.css("top",currTextToFreeze.offset().top-$window.scrollTop())
							}
							//t("in index+1",index+1);
							t("in >target",currSecondFadePoint+(textBreakPoint*index));
							$( ".narrative-item:eq("+currVideo+") .tchunk" ).first().addClass("active");
							$( ".narrative-item:eq("+currVideo+") .tchunk:eq("+(index+1)+")" ).addClass("active");
						}
					}
				})
				//check for bodytext position, freeze if the offset is ok. TTF=text to freeze
				var currTTFlocPercent=100*((currTextToFreeze.offset().top-$window.scrollTop())/$window.height());
				var targetScrollpoint=itemData.videos[currVideo].offsetPercent;
				t("currTTFlocPercent",currTTFlocPercent);
				t("targetScrollpoint",targetScrollpoint);
				
				if(currTTFlocPercent<targetScrollpoint){
					currTextToFreeze.addClass("sticky");
					currTextToFreeze.css("top",currTextToFreeze.offset().top-$window.scrollTop())
				}
			}
			
			
			//image logic
			if(prevScrollPercent>currScrollPercent){
				var scrollDir="up";
			}else if(prevScrollPercent<currScrollPercent){
				var scrollDir="down";
			}
			currVideoTop=$(".rightcol.opaque").position().top;
			currVideoLeft=$(".rightcol.opaque").position().left;
			
			//paralax
			var sectionNeededToScroll=100*($window.height()/($document.height()*(videoBreakPoints/100)));
			if(scrollDir=="up"){
				var newVidLeft=currVideoLeft+((currScrollPercent/videoBreakPoints)*sectionNeededToScroll)*.004;
			}else if(scrollDir=="down"){
				var newVidLeft=currVideoLeft-((currScrollPercent/videoBreakPoints)*sectionNeededToScroll)*.004;
			}
			
			$(".rightcol.opaque").css("left",newVidLeft);
 			
			if(prevVideo!=currVideo){
				console.log("-------------------CHANGED-------------------"+ String(itemData.videos[currVideo].video));
				
				if((currVideo % 2)==0){
					opaque=$(".rc2");
					transp=$(".rc1");
				}else{
					opaque=$(".rc1");
					transp=$(".rc2");
				}
				offsetPercentVideo=itemData.videos[currVideo].offsetPercentVideo;
				transitionVideoScroll=100*((($document.height()*(currScrollPercent/100))+($window.height()*(offsetPercentVideo/100)))/$document.height());
				t("transitionVideoScroll",transitionVideoScroll);	
			}	
			
			if(currScrollPercent>transitionVideoScroll){
				opaque.addClass("opaque");
				opaque.css("z-index",-2);
				transp.removeClass("opaque");
				transp.css("z-index",-1);
				opaque.find("img").attr("src","images/"+itemData.videos[currVideo].video);
			}
			prevScrollPercent=currScrollPercent;
			prevVideo=currVideo;
		}
	})
		
	function getScrollPercent(){
		var theScroll=100*(($window.height()+$window.scrollTop())/($document.height()))
		if (theScroll>99){theScroll=99.99999};
		return theScroll;
	}
	
	function t(text, varName){
		console.log(text+ ":" +varName);
	}
	
}) // end ready();
			
        // ts.goTo(0); 
        
       /* 
        
        	var waypoints = $('.narrative-item').waypoint({
	  handler: function(direction) {
		console.log(this.element.id + ' hit '+getScrollPercent());
		//console.log($(".body_text", this).height())
		//console.log(this);
		
	  },
	  //offset:"20%"
	  offset: function() {
		return -this.element.clientHeight
	  }
	})
	
	var internal_waypoints= $('.body_text').waypoint({
		handler: function(direction) {
			console.log('in element hit '+getScrollPercent()) +" "+$('.body_text').height();
			
			//console.log($(".body_text", this).height())
			//console.log(this);
		  }
	})
	
	var parent_waypoints = $('.parent').waypoint({
	  offset:'80%',
	  handler: function(direction) {
		console.log(this.element.id + ' parent hit')
	  }
	  
	})
	*/
var IE6 = (navigator.userAgent.indexOf("MSIE 6")>=0) ? true : false;
if(IE6){

	$(function(){
		
		$("<div>")
			.css({
				'position': 'absolute',
				'top': '0px',
				'left': '0px',
				backgroundColor: '#333',
				'opacity': '0.75',
				'width': '100%',
				'height': $(document).height(),
				zIndex: 5000
			})
			.appendTo("body");
			
		$("<div><img src='http://css-tricks.com/examples/IE6Blocker/no-ie6.png' alt='' style='float: left;'/><a href='http://www.mozilla.com/firefox/' target='_blank'>Get Firefox</a>")
			.css({
				backgroundColor: 'white',
				'top': '50%',
				'left': '50%',
				marginLeft: -210,
				marginTop: -100,
				width: 410,
				paddingRight: 10,
				height: 200,
				'position': 'absolute',
				zIndex: 6000
			})
			.appendTo("body");
	});		
}
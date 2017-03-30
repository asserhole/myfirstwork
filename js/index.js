$(function  () {

		var $lis = $('#imgs li'),
		len = $lis.length,
		liWidth = $lis.width(),
		currentIndex = 0,
		nextIndex = 1,
		timer = null,
		n = 1;
	
	$('#imgs').css("width", (len+2)*liWidth);

	$('#imgs').css("left",-liWidth);

	$('#imgs').children().eq(0).clone().appendTo($('#imgs'));

	$('#imgs').children().last().prev().clone().insertBefore($('#imgs').children().eq(0));

	
	var html = '';
	for(var i=0;i<len;i++){
		html += "<li></li>";
	}


	$("#dots").append(html).children().eq(0).addClass('act');

	$("#dots").on('click', 'li', function  () {
		var index = $(this).index();
		nextIndex = index;
		move();
	});

	$("#prev").click(function  () {
		n = n - 2;
		if(n<-1){
			n = len - 2;
			$('#imgs').css("left",-liWidth*len);
		}
		nextIndex = currentIndex - 1;
		if(nextIndex < 0){
			nextIndex = len - 1;
		}
		move();
	});

	$('#next').click(move);

	$('.slide').hover(function  () {
			clearInterval(timer);
			$('.btn').show();
		},function  () {
			timer = setInterval(move,3000);
			$('.btn').hide();
		}).trigger('mouseleave');

	function move () {
		var _left = -liWidth*(n+1);
		$('#imgs').stop().animate({left:_left},400,function  () {
			if(n>=len+1){
				n = 1;
				$('#imgs').css("left",-liWidth);
			}
		});

		$('#dots li').eq(nextIndex).addClass('act');
		$('#dots li').eq(currentIndex).removeClass('act');

		n++;

		currentIndex = nextIndex;
		nextIndex++;

		if(nextIndex >=len){
			nextIndex = 0;
		}
	}
})
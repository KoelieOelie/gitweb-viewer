$( document ).ready(function() {
	var minetip = document.getElementById("minetip-tooltip");

	$(".have_item_in_slot").mouseover(function(event) {
		var tooltip="<span>"+event.currentTarget.childNodes[1].dataset.tooltip_label+"</span></br>";
		tooltip+="<span>"+event.currentTarget.childNodes[1].dataset.tooltip_key+"</span>";
	  minetip.innerHTML = tooltip;
	  minetip.classList.add("active");
	});

	$(".have_item_in_slot").mouseout(function() {
	  minetip.classList.remove("active");
	  minetip.style="";
	  minetip.innerHTML="";
	});

	$(".have_item_in_slot").mousemove(function (event) {
	  pos (minetip, 5, -30, event);
	});

	var pos = function (o, x, y, event) {
		var posX = 0, posY = 0;
		var e = event || window.event;
		if (e.pageX || e.pageY) {
			posX = e.pageX;
			posY = e.pageY;
		} else if (e.clientX || e.clientY) {
			posX = event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
			posY = event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
		}
		o.style.top = (posY + y) + "px";
		o.style.left = (posX + x) + "px";
	}
});

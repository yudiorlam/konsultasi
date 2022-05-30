var Lslide      = document.querySelectorAll('.Lslide'),
    Rslide      = document.querySelectorAll('.Rslide'),
    control     = document.querySelectorAll('.oncontrol'),
    slideHeight = document.querySelector('.wrapper').clientHeight,
    color = ['#FD5D5D', '#e5d3d0', '#71b3d6'],
    index = 0;


function init() {
    slideHeight = document.querySelector('.wrapper').clientHeight;
    for (i = 0; i < Lslide.length; i++) {
        Lslide[i].style.backgroundColor = color[i];
        Lslide[i].style.top = -slideHeight * i + "px";
        Rslide[i].style.top = slideHeight * i + "px";
    }  
}
init();
mulai();

window.addEventListener('resize', function(){
    init();
});

var intervalAJG;
var isTop = false;

function mulai() {
	clearInterval(intervalAJG);
	intervalAJG = setInterval(function() {
		if(isTop == true){
			moveToTop();
			isTop = true;
		} else {
			moveToBottom();
			isTop = false;
		}
		transition();
	}, 5000);
}

function moveToTop() {

    index++;
    for (el = 0; el < Lslide.length; el++) {
        Lslide[el].style.top = parseInt(Lslide[el].style.top) + slideHeight + "px";
        Rslide[el].style.top = parseInt(Rslide[el].style.top) - slideHeight + "px";
    }

    if (index > Lslide.length-1) {
        index = 0;
        for (el = 0; el < Lslide.length; el++) {
            Lslide[el].style.top = -slideHeight * el + "px";
            Rslide[el].style.top = slideHeight * el + "px";
        }
    }
}

function moveToBottom() {
    index--;
    for (el = 0; el < Lslide.length; el++) {
        Lslide[el].style.top = parseInt(Lslide[el].style.top) - slideHeight + "px";
        Rslide[el].style.top = parseInt(Rslide[el].style.top) + slideHeight + "px";
        
    }
    if (index < 0) {
        index = Rslide.length-1;
        for (el = 0; el < Lslide.length; el++) {
            Lslide[el].style.top = parseInt(Lslide[el].style.top) + slideHeight * Lslide.length + "px";
            Rslide[el].style.top = parseInt(Rslide[el].style.top) - slideHeight * Rslide.length + "px";
        }
    }
}

function transition() {
    for (t = 0; t < Lslide.length; t++) {
        Lslide[t].style.transition = "all 0.8s";
        Rslide[t].style.transition = "all 0.8s";
    }
}
  

for (t = 0; t < control.length; t++) {
    control[t].addEventListener("click", function() {

        if (this.classList.contains('control-top')) {
            moveToTop();
			isTop = true;
        } 
        if (this.classList.contains('control-bottom')) {
            moveToBottom();
			isTop = false;
        }

        transition()
   
    });
}


var wheeling;
function mousemouve(e) {

    clearTimeout(wheeling);
    e.preventDefault();
    var e = window.event || e; 
    var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
    
    wheeling = setTimeout(function() {
        wheeling = undefined;
        if (delta === 1) {
            moveToTop();
			isTop = true;
        }
        if (delta === -1) {
            moveToBottom();
			isTop = false;
        }
    }, 100);

    transition()
}

document.addEventListener("mousewheel", mousemouve);
document.addEventListener("DOMMouseScroll", mousemouve);
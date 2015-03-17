function toggle_comments()
{
	document.getElementById("createcomment").style.display=document.getElementById("createcomment").style.display=="none"?"block":"none";
}

function show_menu()
{
	document.getElementById("overlay").classList.remove("roll_out");
	document.getElementById("overlay").classList.add("roll_in");
}

function hide_menu()
{
	document.getElementById("overlay").classList.remove("roll_in");
	document.getElementById("overlay").classList.add("roll_out");
}

function setup()
{
	elements=document.getElementsByClassName("menu-item");
	for(i=0;i<elements.length;i++)
	{
		elements[i].firstChild.setAttribute("title",elements[i].firstChild.innerHTML);
	}
}

document.onkeypress=function(event){
	event = event || window.event;
	//alert(event.keyCode);
	switch(event.keyCode) {
		case 27:
			if(document.getElementById("overlay").classList.contains("roll_in"))
			{
				console.log("PTTV: ESC pressed. Try closing the overlay...");
				hide_menu();
			} else {
				console.log("PTTV: ESC pressed. Overlay already closed");
			}
			break;
		}
}

document.onload=setup();

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
}

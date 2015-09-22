<script type="text/javascript">
	
functtion load(){
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject('Microsoft.XMLHTP');
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status ==200){
			document.getElementByClassName('entry').innerHtml = xmlhttp.responseText;
		}

		xmlhttp.open('GET', '/leaderboard/' + yr);
	}
}


</script type="text/javascript">
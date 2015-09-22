<script type="text/javascript">
	
function load(yr){
	console.log('xxx');
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject('Microsoft.XMLHTP');
	}
	var url = document.location.pathname.substring(0,document.location.pathname.lastIndexOf('/')+1);
	xmlhttp.open('GET', url+ yr, true);
	xmlhttp.onreadystatechange = function(){
		console.log(xmlhttp.readyState);
		console.log(xmlhttp.status);
		if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
			console.log('hh');
			$('#entry').html(xmlhttp.responseText);
		}
	}
	xmlhttp.send();
}

$(document).ready(function(){
	$('.but').click(function(){
		console.log(document.location.hostname);
		console.log(this.getAttribute('yr'));
		load(this.getAttribute('yr'));

	});
});

</script type="text/javascript">
<script type="text/javascript">
	
function load(yr){
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject('Microsoft.XMLHTP');
	}
	var url = document.location.pathname.substring(0,document.location.pathname.lastIndexOf('/')+1);
	xmlhttp.open('GET', url+ yr, true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
			$('#entry').html(xmlhttp.responseText);
		}
	}
	xmlhttp.send();
}

$(document).ready(function(){
	$('.but').click(function(){
		load(this.getAttribute('yr'));

	});
});

</script type="text/javascript">
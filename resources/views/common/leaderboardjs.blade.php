
	
<script type="text/javascript">
	
function load(yr){
	var url = document.location.pathname.substring(0,document.location.pathname.lastIndexOf('/')+1);
	$.get(
		url + yr,
		function (data){
			var list = '';
			for (i = 0; i < data.length; i++){
				list +='<p>' + data[i].email + '</p>';
			}
			$('#entry').html(list);
		});
}

$(document).ready(function(){
	$('.but').click(function(){
		load(this.getAttribute('yr'));

	});
});

</script type="text/javascript">


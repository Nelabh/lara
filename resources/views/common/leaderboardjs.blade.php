<script type="text/javascript">
	
function load(yr){
	var url = document.location.pathname + '/';
	$.get(
		url + yr,
		function (data){
			var list = '';
			for (i = 0; i < data.length; i++){
				list +='<li>' + data[i].fname +' '+ data[i].lname + '</li>';
			}

			console.log(list);
			$('#entry').html(list);
		});
}

$(document).ready(function(){
	$('.but').click(function(){
		load(this.getAttribute('yr'));

	});
});

</script type="text/javascript">


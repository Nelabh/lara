<script type="text/javascript">
	
function load(yr){
	var url = document.location.pathname + '/';
	$.get(
		url + yr,
		function (data){
			var list = '<th>Rank</th> <th>Name</th> <th>Score</th>';
			for (i = 0; i < data.length; i++){
				list += "<tr><td>" + (i+1) +"</td> <td>"+ data[i].fname + " " + data[i].lname + "</td> <td>" + data[i].points+"</td> </tr>";
			}

			//console.log(list);
			document.getElementById('table').innerHTML = list;
		});
}

$(document).ready(function(){
	$('.but').click(function(){
		load(this.getAttribute('yr'));

	});
});

</script type="text/javascript">


<script type="text/javascript">



$(document).ready(function(){
	function load(){
	var url = document.location.pathname+'/check';
	var lvl = $('#level').html().substring($('#level').html().lastIndexOf(' ')+1);
	var values = { _token:$('#answer').attr('name'), value: $('#answer').val(), level : lvl};
	$.ajax({
			url: url,
			type: 'POST',
			data: values,
			success: function (data){
				if (data.status == '1'){
					$('#question').html(data.ques);
					$('#level').html('LEVEL - ' + (parseInt(lvl) + 1));
					$('#points').html(data.score);
					document.getElementById('answer').value='';
					$('#msg').css('color','green');
					$('#msg').html('Correct Answer!!');
					$('#rank').html('Global Rank : ' + data.rank);
					var x = document.getElementById('msg');
					/*var list = "";
					console.log(data.scrtrl);
					for (var i = 0;i<=data.scrtrl.length; i++) {
						list = list + "<li><a class = \'navigate\' x=\'"+ i +"\'>LEVEL - " + i+"</a></li>";
					}*/
					
					
					setTimeout(function(){
						x.innerHTML = '';
					},3000);
					/* hide Textbox if already answered the question...;
					*/
				}else{
					$('#msg').css('color','red');
					$('#msg').html('Thats the wrong answer!!');
					$('#rank').html('Global Rank : ' + data.rank);
					var x = document.getElementById('msg');
					setTimeout(function(){
						x.innerHTML = '';
					},3000);
				}
				
			}
			});
}

function navigate(ques){
	var url = document.location.pathname+'/navigate/'+ques;
	$.ajax({
			url: url,
			type: 'GET',
			success: function (data){
				$('#question').html(data.ques);
				$('#level').html('LEVEL - ' +ques);
				document.getElementById('answer').value='';
				if(data['trail'].charAt(ques) == 2){
					//hide INPUT BOX
				}

			}
		});
	}

	$('#but').click(function(){
		load();
	});

	$('.navigate').click(function(){
		var q_no = $(this).attr('x');
		console.log(q_no);
		navigate(q_no); 
	});
/*
	document.getElementById()*/
});

</script type="text/javascript">
<script type="text/javascript">

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

					/* hide Textbox if already answered the question...;
					*/

				}else{
					$('#status').html('Thats the wrong answer!!');
				}
				
			}
			});
}

function navigate(ques){
	var url = document.location.pathname+'/navigate/ques';
	$.ajax({
			url: url,
			type: 'GET',
			data: values,
			success: function (data){
				$('#question').html(data);
				/* hide Textbox if already answered the question...;
					
				*/	
			}
			});
}

$(document).ready(function(){
	$('#but').click(function(){
		load();
	});

	$('.nav').click(function(){
		var q_no = this.attr('q_no');
		navigate(q_no); 
	});
});

</script type="text/javascript">
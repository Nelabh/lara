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
				if (data != 'Hard Luck'){
					$('#question').html(data);
				}else{
					$('#status').html(data);
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
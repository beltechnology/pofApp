 $(function(){  
 $('#stateSelect').on('change',function(e){
            $.get("{{ url('api/employee')}}", { option: $(this).val() }, 
            function(data) {
            var numbers = $('#selectCity');
            numbers.empty();
           $.each(data, function(key, value) {numbers
              .append($("<option></option>").attr("value",key).text(value)); 
              });

            });

        });

    });
	$(document).ready(function(){
		
		$('.date').datetimepicker({
                    format: "DD/MM/YYYY",
					pickTime: false
                });

	});
	
   
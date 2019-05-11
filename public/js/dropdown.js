$("#Estado").change(function(event)
{
	$.get("municipio/"+event.target.value+"", function(response, Estado){
		console.log(response);
		$("#Municipio").empty();
		for (var i = 0; i < response.length; i++) {
			$("#Municipio").append("<option value='"+response[i].Registro+"'>"+response[i].Nombre+"</option>");
		}
	});
});
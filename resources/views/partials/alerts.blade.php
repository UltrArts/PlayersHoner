<script>

	document.addEventListener('livewire:load', function () {
        Livewire.on('alert_response', function (message, status, url) {
            displayAlerts(message, status, url);
        });
    });


	function displayAlerts(message, status, url){
		var content = {};
		var state = null;
		var placementFrom = "bottom";
		var placementAlign = "right";
		if(status == "success"){
			state = "success";
			content.icon = 'la la-check-square-o'
			content.title = 'Sucesso!';
		}
		else if(status == "error"){
			state = "danger";
			content.icon = 'la la-times-circle-o'
			content.title = 'Erro!';
		}else if(status == "info"){
			state = "info";
			content.icon = 'la la-info-circle'
			content.title = 'Notificação!';
		}

		var style = "withicon";

		content.message = message;
		content.url = url;
		content.target = '_blank';

		$.notify(content,{
			type: state,
			placement: {
				from: placementFrom,
				align: placementAlign
			},
			time: 1000,
		});
	}
</script>
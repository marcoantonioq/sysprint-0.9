administration = function() {

	$(".updateAjax").each(function(index, el) {
		var updateItem = $(this);
		$(this).click(function(event) {
			$.ajax({
				type: "GET",
			    url: $(this)[0].href,
			    success: function(data) {
			    	// alert(data);
			    	updateItem.html(data);
			    },
			    error: function(data){
			    	// alert("fail. :(");
			    }

			});
			return false;
		});
	});


	$(".statusAjax")
		.each(function(){

			var icon = $(this);
			
			icon.click(function(event) {				
				$.ajax({
					type: "GET",
				    url: $(this)[0].href,
				    success: function(data) {
				    	// alert(data);
				    	// alert("Update");
				        if(data == 1) {
				  	      	icon.removeClass('icon-remove');
				        	icon.addClass('icon-ok');
				        } else {
				        	icon.removeClass('icon-ok');
				        	icon.removeClass('beforeAjax');
				        	icon.addClass('icon-remove');
				        }
				    },
				    beforeSend: function(){
				        icon.removeClass('icon-ok');
				        icon.addClass('beforeAjax');
				    },
				    error: function(data){
				    	alert("fail. :(");
				    }

				});
				return false;
			});
		})
}

printes = function () {
	
	// alert("Chamou");
	$(".profile").each(function(){
		var impressoes = $(this).find(".impressoes");
		if (typeof impressoes[0] !== "undefined" ) {
			$.ajax({
				type: "GET",
			    url: impressoes[0].href,
			    success: function(data) {
			    	// alert(data);
			    	impressoes.html(data);
			    },
			    error: function(data){
			    	// alert("fail. :(");
			    }

			});			
		};
	})
}

$(document).ready(function() {	
	administration();

	printes();
	setInterval(printes, 50000);
});

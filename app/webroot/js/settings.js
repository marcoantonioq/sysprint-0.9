autoSave = function(){
	var formData = $("#SettingIndexForm");

	// alert(formData.attr("action"));
	$("input")
		.each(function(){
			var input = $(this);
			input.change(function(event) {				
				$.ajax({
					type: "POST",
				    url: formData.attr("action"),
				    data: formData.serialize(),
				    success: function(data) {
				        input.removeClass('beforeAjax');
				    },
				    beforeSend: function(){
				        input.addClass('beforeAjax');
				    },
				    error: function(data){
				    	alert("fail. :(");
				    }
				});
				return false;
			});
		})
}

administrationAD = function() {

	var formData = $("#SettingIndexForm");

	$("input[id^='AD']").each(function(){
		var input = $(this);
		var message = $("#admessage");
		
		input.change(function(event) {				
			$.ajax({
				type: "POST",
			    url: message.data("url"),
			    data: formData.serialize(),
			    success: function(data) {
			  	    message.removeClass('hide');
			  	    message.text(data);
			        input.removeClass('beforeAjax');
			    },
			    beforeSend: function(){
			    	// autoSave();
			        input.addClass('beforeAjax');
			    },
			    error: function(data){
			    	// alert("fail. :(");
			    }

			});
			return false;
		});		
	})
}


$(document).ready(function() {	
	administrationAD();
	autoSave();


$(document).ready(function(){
  var activeTab = sessionStorage.getItem("Setting.nav.tab");
  if(activeTab && activeTab != "" && activeTab != "undefined"){
    $("#myTab li").removeClass("active");
    $("#myTab li[tab="+activeTab+"]").addClass("active");

    $("#myTabContent div.tab-pane").removeClass("active in");
    $("#myTabContent #"+activeTab).addClass("active in");
    // alert(tab.attr("class"));
  }

  // tab-pane fade active in

  $("#myTab li").click(function(){
    sessionStorage.setItem("Setting.nav.tab", $(this).attr("tab"));
  });
 
  var alternar = function(){
    if ($(this)[0].checked) {
      $("#toggleAD").show();
    } else{
      $("#toggleAD").hide();
    }
  }
  // habilitado utenticação
  if ($("input#Auth")[0].checked) {
    $("#toggleAD").show();
  } else{
    $("#toggleAD").hide();
  }
  
  $("input#Auth").click(alternar);
});
});


/*
	by: Marco Antônio Queiroz
	IFG - Campus Cidade de Goias
*/


/**
 * Navigation
 *
 * @return void
 */

navigationSpool = function(){

	// Botão mostrar All
	var allSpool = $("#allSpool");

	var activeSpools = function(e){
		
		var v = $("tbody td[data-th='Status']");

		if (e == "Ativos") {
			allSpool.html("Ativos");
			v.each(function(e){
				$(this).parent().show();
			})
			
		} else {
			allSpool.html("All");
			v.each(function(e){
				var valor = $(this).attr("value");
				if (valor == 0) {
					$(this).parent().hide();
				};		
			})
		};
	}
	

	allSpool.click(function(){
		if (allSpool.html() == "All") {
			activeSpools("Ativos");
		} else {
			activeSpools("All");
		};
	})
	activeSpools("All");

}

spoolsActive = function(){
	var obj = $("#spoolsActive");
	var url = $("#UrlSpools")[0];
	// alert(url);

	$.ajax({
	    url: url,
	    type: "GET",
	    contentType:false,
	    processData: false,
	    cache: false,
	    success: function(data){
	        // alert(data);
	        obj.html(data);
	    }
	});
}

printesFunctions = function () {
	$("a.options").click(function(e){
		$(".options:not(a.options)").toggle();
        e.stopPropagation;
        e.preventDefault;
        return false;

	});
	$("a.options").click();
}


profile = function()
{
    $(".iconprofile").each(function (index, e) {
        var printer = $(this);
        // var title = printer.attr('title').substring(0,4);
        $(this).tooltip('hide');
    });

    $(".profile").each(function (index, e) {
        var profile = $(this);
        profile.dblclick(function(e){
            var url = profile.find("a.link");
            window.location.href=url[0].href;
            e.stopPropagation;
            e.preventDefault;
            return false;
        })
    });
}

/*
    Upload File Drag and Dow
*/

function sendFileToServer(formData,status)
{
    var uploadURL =$("#uploadURL")[0].href; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
        url: uploadURL,
        type: "POST",
        contentType:false,
        processData: false,
        cache: false,
        data: formData,
        success: function(data){
            $("#status1").append("File upload Done<br>");
        }
    });
    spoolsActive();
}

function handleFileUpload(files,obj)
{
	try {
        var printer = obj.attr("printer");

    	for (var i = 0; i < files.length; i++)
       	{
            var fd = new FormData();
            fd.append('print_id', printer);
            fd.append('file', files[i]);
            sendFileToServer(fd,status);
       	}

    } catch(err) {
        // alert("Erro upload");
    }
}

$(document).ready(function() {
	navigationSpool();

	spoolsActive();
	setInterval(spoolsActive, 10000);
	
    printesFunctions();

	// reloadPage
	// setInterval(reloadPage, 5000);

    var obj = $(".profile");

    obj.on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).css('border', '3px solid #90C64C');
    });

    obj.on('dragover', function (e){
		e.stopPropagation();
		e.preventDefault();
    });

    obj.each(function(){
        $(this).on('drop', function (e) {
            e.preventDefault();
            var files = e.originalEvent.dataTransfer.files;
            handleFileUpload(files,$(this));
        });
    })

    // Soltar sobre o document
    $(document).on('drop', function (e){
        // alert($("#uploadURL")[0].href);
        var files = e.originalEvent.dataTransfer.files;

        // var inputFiles = $("#SpoolFile");
        // inputFiles[0].value = files;

        // inputFiles.css({
        //   background: "yellow",
        //   border: "3px red solid"
        // });

    });

    $(document).on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    $(document).on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        obj.css('border', '3px dotted #90C64C');
    });

    $(document).on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();
        obj.css('border', '');
    });
});

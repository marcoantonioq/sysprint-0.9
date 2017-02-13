
/*
	by: Marco Antônio Queiroz
	IFG - Campus Cidade de Goias
*/


/**
 * Navigation
 *
 * @return void
 */

navigation = function(){

	$('.close').click(function(){
		$('.message').fadeToggle();
		return false;
	});


	$('.togle').each(function(){
		var message = $(this);
		setTimeout(function(){
			// alert("Hide");
			message.slideUp();
		}, 4000);
	});

	// Menu
	$('.app').click(function(){
		$('.menu a').toggle(500);
	})
	$('.menu a').hide();

	$('.menu').on('blur', function(e){
		$('.menu a').hide();
	})


	// menu
	$('#rowmenus').hide();

	$("#btnmenu").bind('click', function(e) {
		$('#rowmenus').fadeToggle();
		e.stopPropagation();
		return false;
	});


}

table = function()
{

    $(".table").each(function(){
    	$(this).stupidtable();
    })

	// Filter
	$('#filter').hide();
	$('table th[class=btnFilter]').click(function(){
		$('#filter').fadeToggle();
		$('#FilterId').focus();
		return false;
	});

	// Marcar todas celulas
	$("#allrow").click(function(event) {
		var check = this.checked;
		var rows = $(":input[id^=row]");
		rows.each(function(){
			this.checked = check;
		});
	});

	// Percorrer tabelas ocultando as colunas com th hide
	$("table").each(function(table){
		var tabela = $(this);
		$(this).find("th").each(function(th){
			if ( $(this).hasClass("hide") ) {
				tabela.find("th:nth-child("+(th+1)+"),td:nth-child("+(th+1)+")").hide();
			};
		});
	});

	$(".actions > select").mousedown(function(e){
		if (e.which === 3) {
			$(this).parent().html('<input name="data[Pagination][limit]" class="span12" autocomplete="off" onfocus="this.select();" autofocus="1" placeholder="Limite..." id="selectID" type="input">');
			e.cancelBubble = true
			e.returnValue = false;
			e.stopPropagation();
			return false;
		};
    });



	// $(".actions > select")
	// 	.dblclick(function(index, el){
	// 		// alert(index);
	// 	    alert("ALert double");
	// 	})
	// 	.click(function(index, el){
	// 	    alert("ALert click");
	// 	})
	// 	.attr('style', 'background:red');
}

plugins = function()
{
	// Gerando Barcode js
	// var settings = {
 //      barWidth: 2,
 //      barHeight: 50
 //    };

 //    $(".barcode").each(function(index, el) {
 //    	var code = $(this).attr('value');
 //    	$(this).barcode(code, 'code128', settings);
 //    });
}

form = function()
{
	if ( $("form:not(#FilterIndexForm)") ) {
    	// $("form:not(#FilterIndexForm) :input[id$=Cpf]").mask("999.999.999-99")
    	// $("form:not(#FilterIndexForm) :input[id$=Phone]").mask("(99) 9999-9999")
    	// $("form:not(#FilterIndexForm) :input[id$=Password]").val("")
    	// $("form:not(#FilterIndexForm) textarea").attr('class', 'ckeditor')
    	// $("form:not(#FilterIndexForm) :input[id$=Password]").val("")
    	// input file
    	$("form:not(#FilterIndexForm) :input[id$=Image]").attr('type', 'file')
    	// $("form:not(#FilterIndexForm) :input[id$=File]").attr('type', 'file')
    	// $("form:not(#FilterIndexForm) :input[type=file]").attr('class', 'btn btn-file')
    	$("form:not(#FilterIndexForm) :input[id$=ImageDir]").parent().hide()
    	$("form:not(#FilterIndexForm) :input[id$=FileDir]").parent().hide()
    	// input count
    	$("form:not(#FilterIndexForm) :input[id$=Count]").parent().hide()

    	$(":input[id$=Date]").mask("99/99/9999 99:99:99");

    	// $('input[type=file]').bootstrapFileInput();
		// $('.file-inputs').bootstrapFileInput();
	};


    //  input int
    $("input[type=number]").bind('keydown', function(e){
    	var keyCode = e.which;
    	// alert(keyCode);
    	var isStandart = ( (keyCode > 47 && keyCode < 58) || (keyCode > 95 && keyCode < 106) );
    	var isOther = (",8,46,37,38,39,40,9,".indexOf(","+keyCode+",") > -1);
    	if (isStandart || isOther) {
    		return true;
    	};
    	return false;
    });
}


loadURL = function(){
	var obj = $(".loadurl").each(function(){
		var url = $(this)[0];
		// alert(url);

		$.ajax({
		    url: url,
		    type: "GET",
		    contentType:false,
		    processData: false,
		    cache: false,
		    success: function(data){
		    	var pai = $(this).parent().parent().parent().parent().parent();
		    	// $(this).after(data);
		        // alert(data);
		        $(".chart").after(data);
		        // pai.html(data);
		    }
		});		
	})

}

$(document).ready(function(){
	loadURL();
	navigation();
	table();
	plugins();
	form();
	profile();
	varkey();
	// Admin.extra();
});

var varkey = function(){

	$(window).keydown(function(e){
		// bloquear ctrl + j,
		// para o leitor de codigo de barras

		// alert(e.ctrlKey);
		// alert(e.keyCode);

		if (e.ctrlKey && e.keyCode==74){
		    return false;
		}

		// Decla ctrl + f: filtro avançado
		if (e.ctrlKey && e.keyCode == 70)
		{
			$("#filter").show(1000);
			$("#FilterId").focus();
			return false;
		};

		if( (e.keyCode > 95 && e.keyCode < 106 ) || (e.keyCode > 47 && e.keyCode < 58 ) )
		{
			if( ! $("#FilterId").is(":visible") )
			{
				$("#filter").show(1000);
			}

		}

		// F5: reload page
		if (e.keyCode == 116)
		{
			location.reload(true);
			return false;
		}


		// alert(e.keyCode);
		if(e.keyCode == 13)
		{
			// return false;
			// alert("Enter");
			// $("#FilterIndexForm").submit();
		}

	})
}

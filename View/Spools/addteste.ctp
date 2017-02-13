

			<form id="formulario" method="post" enctype="multipart/form-data">
			    <input name="arquivo" 'class'='span12 btn' type="file" />
			    <button>preview</button>
			</form>


<div class="" id="preview">

</div>

<script type="text/javascript">
$("#formulario").change(function (evt) {
	evt.preventDefault();
	var formData = new FormData(this);

	$.ajax({
			url: 'preview',
			type: 'POST',
			data: formData,
			success: function (data) {
					$("#preview").html(data);
			},
			cache: false,
			contentType: false,
			processData: false,
			xhr: function() {  // Custom XMLHttpRequest
					var myXhr = $.ajaxSettings.xhr();
					if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
							myXhr.upload.addEventListener('progress', function () {
									/* faz alguma coisa durante o progresso do upload */
							}, false);
					}
			return myXhr;
			}
	});
});
</script>

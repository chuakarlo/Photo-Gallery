var Home = {
	upload : function() {
		$.ajax({
			url : 'home/doUpload/',
			type : 'POST',
			cache : false,
			data : new FormData($('#uploadphotoform')[0]),
			processData : false,
			contentType : false,
			success : function(data) {
				try {
					var obj = jQuery.parseJSON(data);

					if (obj['status'] == 'true') {
						Home.hideModal('#uploadmodal');

						$('#successmsg').removeClass('hidden');
						$('#successmsg').html(obj['successmsg']);
					} else {
						$('#errmsg').removeClass('hidden');
						$('#errmsg').html(obj['errmsg']);
					}
				} catch(e) {
					alert(e);
				}
			},
			error : function() {
				alert('not success');
			}
		});
	},
	tag : function() {
		$.ajax({
			url : 'home/doTag/',
			type : 'POST',
			cache : false,
			data : $('#tagphotoform').serialize(),
			success : function(data) {
				try {
					var obj = jQuery.parseJSON(data);

					if (obj['status'] == 'true') {
						Home.hideModal('#tagmodal');

						$('#successmsg').removeClass('hidden');
						$('#successmsg').html(obj['successmsg']);
					} else {
						$('#errmsg').removeClass('hidden');
						$('#errmsg').html(obj['errmsg']);
					}
				} catch(e) {
					alert(e);
				}
			},
			error : function() {
				alert('not success');
			}
		});
	},
	hideModal : function(obj) {
		$(obj).modal('hide');
	},
	loadModal : function() {
		$('#uploadmodal input[type="file"]').val("");

		$('#errmsg').addClass('hidden');
		
		$('#uploadmodal').modal({backdrop: 'static', keyboard: false});
	},
	loadTagModal : function(id) {
		$('#tagmodal input[type="text"]').val("");

		$('#errmsg').addClass('hidden');

		$('#photoId').val(id);
		
		$('#tagmodal').modal({backdrop: 'static', keyboard: false});
	},
	loadData : function() {
		$('img')[$('img').length-1].id
		$.ajax({
			url : 'home/loadMorePhotos/' + $('img')[$('img').length-1].id,
			type : 'POST',
			cache : false,
			success : function(data) {
				try {
					var obj = jQuery.parseJSON(data);

					obj['data'].forEach(function(item, index) {
						Home.displayImage(item['photoId'], item['file_name'], item['image_tags']);
					});
				} catch(e) {
					alert(e);
				}
			},
			error : function() {
				alert('not success');
			}
		});
	},
	displayImage : function(id, file_name, image_tags) {
		var html = "<div class='col-md-4'>" +
						"<img src='uploads/" + file_name + "' height='300' width='300' id='" + id + "' onclick='Home.loadTagModal(" + id + ")'>" +
							"<label>Tags:";

		var str = image_tags.split(',');

		str.forEach(function(item, index) {
			html += "<a href='#'>" + item + "</a> ";
		});

		html += "</label></div>";

		$('#photodump').append(html);
	}
}
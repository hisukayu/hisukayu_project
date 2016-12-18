/**
 *
 */
$(function(){

	var redirect_url = "hisukayu_project/cms/admin_contents/";

	$('.del_link').click(function() {
		if (!confirm('データ削除します\nよろしいですか？')) {
			return false;
		}
	});


	// お知らせ 公開状態の更新
	$('#state-update-btn').click(function(){
		var post_url = "https://" + location.host + "/" + redirect_url;
		var id = $(this).attr('data-infoid');
		var state_detail = $("select[name=state] option:selected").val();

		$.ajax(
			{
				url  : post_url,
				type : 'POST',
				data : {
					info_id : id,
					state : state_detail,
					request_main : "main",
					request_data : "info_state_update"
				},
				success: function(data) {
					location.reload();
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {

				}
			}
		);
	});

	// お知らせ 公開日時の更新
	$('#date-update-btn').click(function(){
		var post_url = "https://" + location.host + "/" + redirect_url;
		var id = $(this).attr('data-infoid');
		var year = $("input[name=year]").val();
		var month = $("input[name=month]").val();
		var day = $("input[name=day]").val();
		var hour = $("input[name=hour]").val();
		var minute = $("input[name=minute]").val();
		var seconds = $("input[name=seconds]").val();

		$.ajax(
			{
				url  : post_url,
				type : 'POST',
				data : {
					info_id : id,
					year : year,
					month : month,
					day : day,
					hour : hour,
					minute : minute,
					seconds : seconds,
					request_main : "main",
					request_data : "info_date_update"
				},
				success: function(data) {
					location.reload();
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert(XMLHttpRequest);
				}
			}
		);
	});
});
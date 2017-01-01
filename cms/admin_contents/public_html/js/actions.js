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
		var post_url = "http://" + location.host + "/" + redirect_url;
		var id = $(this).attr('data-infoid');
		var state_detail = $("select[name=state] option:selected").val();

		$.ajax({
			type: "POST",
			url: post_url,
			data : {
				info_id : id,
				state : state_detail,
				request_main : "main",
				request_data : "info_state_update"
			},
			success: function(res){
				if(res == "no data" ){
					$("#state-result").html('<span class="update-ng" >公開状態を選択してください</span>').delay(3000).fadeOut(3000, "swing", function() {
						$("#state-result").css({'display':'block'});
						$("#state-result .update-ng").css({'display': 'none'});
				    });
				}else if(res == "not update" ){
					$("#state-result").html('<span class="update-ng" >更新失敗しました</span>').delay(3000).fadeOut(3000, "swing", function() {
						$("#state-result").css({'display':'block'});
						$("#state-result .update-ng").css({'display': 'none'});
				    });
				}else {
					$("#state-result").html('<span class="update-ok" >更新しました</span>').delay(3000).fadeOut(3000, "swing", function() {
						$("#state-result").css({'display':'block'});
						$("#state-result .update-ok").css({'display': 'none'});
				    });
				}
			}
		});
	});

	// お知らせ 公開日時の更新
	$('#date-update-btn').click(function(){
		var post_url = "http://" + location.host + "/" + redirect_url;
		var id = $(this).attr('data-infoid');
		var year = $("input[name=year]").val();
		var month = $("input[name=month]").val();
		var day = $("input[name=day]").val();
		var hour = $("input[name=hour]").val();
		var minute = $("input[name=minute]").val();
		var seconds = $("input[name=seconds]").val();

		$.ajax({
			type: "POST",
			url: post_url,
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
			success: function(res){
				if(res == "no data" ){
					$("#date-result").html('<span class="update-ng" >公開日時を入力してください</span>').delay(3000).fadeOut(3000, "swing", function() {
						$("#date-result").css({'display':'block'});
						$("#date-result .update-ng").css({'display': 'none'});
				    });
				}else if(res == "not update" ){
					$("#date-result").html('<span class="update-ng" >更新失敗しました</span>').delay(3000).fadeOut(3000, "swing", function() {
						$("#date-result").css({'display':'block'});
						$("#date-result .update-ng").css({'display': 'none'});
				    });
				}else {
					$("#date-result").html('<span class="update-ok" >更新しました</span>').delay(3000).fadeOut(3000, "swing", function() {
						$("#date-result").css({'display':'block'});
						$("#date-result .update-ok").css({'display': 'none'});
				    });
				}
			}
		});
	});



});
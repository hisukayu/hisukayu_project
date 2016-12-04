/**
 *
 */
$(function(){


	$('.del_link').click(function() {
		if (!confirm('データ削除します\nよろしいですか？')) {
			return false;
		}
	});


});
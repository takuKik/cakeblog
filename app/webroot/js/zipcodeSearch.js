$(function () {
	//検索ボタンをクリックされたときに実行
	$("#search_btn").click(function () {
		//検索結果をリセット
		$('#zip_result').children().remove();
		//入力値をセット
		var param = {zipcode: $('#zipcode').val()};
		var send_url = "/zipcodes/search";
		$.ajax({
			type: "post",
			data: param,
			url: send_url,
			dataType: "json",
			success: function (res) {
				//該当する住所を表示
				if(res!==null){
				res.forEach(function(value) {
					add = '';
					add +=  value.Zipcode.pref;
					add +=  value.Zipcode.city;
					add +=  value.Zipcode.street;
					$('#zip_result').append($('<option>').text(add));
				});
				}else{
					alert("レコードが存在しません");
				}
			},
			error: function (res, status, errors) {
				alert(res + ', ' + status + ', ' + errors);
			}
		});
		return false;
	});
	//検索結果を選択
	$("#select_btn").click(function () {
		$('#select_result').val($('#zip_result').val());
	});
});

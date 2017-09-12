var kiwis = 0;

$('#btn').click(function () {
	if (kiwis === 0){
		$('#kiwis3').hide();
		$('#kiwis2').show();
		kiwis = 1;
	} else if (kiwis === 1){
		$('#kiwis2').hide();
		$('#kiwis1').show();
		kiwis = 2;
	} else if (kiwis === 2){
		$('#kiwis1').hide();
		$('#kiwis').show();
		kiwis = 3;
	} else if (kiwis === 3){
		$('#kiwis').hide();
		$('#kiwis3').show();
		kiwis = 0;
	}		
})
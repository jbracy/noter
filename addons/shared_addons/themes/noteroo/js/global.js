function check_ad_free(){
	var ad_free = document.getElementById('ad_free');
	var cc_type = document.getElementById('credit_card_type');
	var cc_num = document.getElementById('credit_card_number');
	if(ad_free.checked == true && cc_type.value == 'default' || ad_free.checked == true && cc_num.value == "")
	{
		alert('Credit Card info is required for an ad free experience! Thank you.');
		return false;
	}
}
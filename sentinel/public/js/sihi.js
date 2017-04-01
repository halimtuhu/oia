type = ['','info','success','warning','danger'];


sihi = {
	showNotification: function(alertType, alertMsg, alertAlign){
  	$.notify({
    	icon: "pe-7s-pin",
    	message: alertMsg
    },{
        type: alertType,
        timer: 3000,
        placement: {
            from: "top",
            align: "right"
        }
    });
	}
}

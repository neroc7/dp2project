

/* validation function for add_stock_item.php form*/
function validation(){
	var errMsg= "";
	var result = true;


	var quantity = document.getElementById("quantity").value;




	if(quantity.trim() == ""){
		errMsg = errMsg + "Please fill in quantity\n";
		result = false;
	} else if (isNaN(quantity)){
		errMsg = errMsg + "quantity must be number\n";
		result = false;
	}



	if(errMsg != ""){
	alert(errMsg);

	}
	return result;

}



function init(){

	var New_record = document.getElementById("new_record");
	New_record.onsubmit = validation;

}

window.onload = init;
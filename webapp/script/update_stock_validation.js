

/* validation function for add_stock_item.php form*/
function validation(){
	var errMsg= "";
	var result = true;


	var stockitem = document.getElementById("quantity").value;
	var price = document.getElementById("price").value;



	// if(price.trim() == ""){
	// 	errMsg = errMsg + "Please fill in price\n";
	// 	result = false;
	// } else if (isNaN(price)){
	// 	errMsg = errMsg + "Price must be number\n";
	// 	result = false;
	// } else if (price < 0){
	// 	errMsg = errMsg + "Price have to be positive\n";
	// 	result = false;
	// }


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
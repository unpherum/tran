const PopuateDPDPricing = (data, selected_country, selected_zipcode, weight) => {

	var price = null;
	var selected_zipcode_asterisk = selected_zipcode.substring(0,2)+'*';
	var continue_searching = true;
	$.each(data, function(pricing_key, pricing_value){
					  
		var countries = pricing_value.country.split(',');
		countries = countries.map(Function.prototype.call, String.prototype.trim);
		//if can't split, then it might has one value
		if(!countries && pricing_value.country) countries.push(pricing_value.country.trim());
		if(!countries) return; //if still empty then break
		if(countries.includes(selected_country.prefix) && continue_searching){

			//if have exclude check if first
			// whether there is some exlude zipcode here match with the chosen one
			if(pricing_value.exclude){
				var exclude_zipcodes = pricing_value.exclude.split(',');
				exclude_zipcodes = exclude_zipcodes.map(Function.prototype.call, String.prototype.trim);
				// if the chosen one is contain in the blacklist zicode here
				// do nothing because there is no price here
				if(exclude_zipcodes.includes(selected_zipcode) || exclude_zipcodes.includes(selected_zipcode_asterisk)){

					continue_searching = false;
					return;
				}

		  	}

		 	//otherwise check on zipcodes
		  	if(pricing_value.zipcode){
				var zipcodes = pricing_value.zipcode.split(',');
				zipcodes = zipcodes.map(Function.prototype.call, String.prototype.trim);
				//if can't split, then it might has one value
				if(!zipcodes && pricing_value.zipcode) zipcodes.push(pricing_value.zipcode.trim());
				if(!zipcodes) return; //if still empty then break
				if(zipcodes.includes(selected_zipcode) || zipcodes.includes(selected_zipcode_asterisk) || zipcodes.includes('*')){
					//yes the zipcode is exist here.
					//check if there is a fees array
					var fees = pricing_value.fees;
					var fees_array = fees.split(',');
					if(!fees_array && fees) fees_array.push(fees);
					if(!fees){
						//how comes it has no fees break everything
						continue_searching = false;
						return;
					}
					//there are fees, get them
					var found_fee = _.find(fees_array, function(fee) {
						var fee_split = fee.split(':');
						fee_split = fee_split.map(Function.prototype.call, String.prototype.trim);
						if(!fee_split) return;
						var kg = parseInt(fee_split[0]);

						if(weight == kg){

							var dpdPricing = (parseFloat(fee_split[1]) + parseFloat(pricing_value.extra)).toFixed(2);

							price = dpdPricing;
							return dpdPricing;
						} 
						  
					});

					//leave loop because found found the zipcode here
					continue_searching = false;
					return;
				  
				}

		  	}

		}

	});

	return (price);
}

export default PopuateDPDPricing;
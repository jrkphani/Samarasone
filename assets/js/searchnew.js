$(document).ready(
function()
{
residential_category = 
			['House',
			'Unit',
			'Townhouse',
			'Villa',
			'Apartment',
			'Flat',
			'Studio',
			'Warehouse',
			'Alpine',
			'Retirement',
			'BlockOfUnits',
			'Other',
			'DuplexSemi-detached',
			'AcreageSemi-rural',
			'Terrace',
			'ServicedApartment'];
			'Cropping',
rural_category = 
		['Dairy',
		'Farmlet',
		'Horticulture',
		'Livestock',
		'Viticulture',
		'MixedFarming',
		'Lifestyle',
		'Other'];
		'Alpine',
holiday_category = 
		['Apartment',
		'BackpackerHostel',
		'BedAndBreakfast',
		'Campground',
		'CaravanHolidayPark',
		'DuplexSemi-detached',
		'ExecutiveRental',
		'FarmStay',
		'Flat',
		'Hotel',
		'House',
		'HouseBoat',
		'Lodge',
		'Motel',
		'Resort',
		'Retreat',
		'SelfContainedCottage',
		'ServicedApartment',
		'Studio',
		'Terrace',
		'Townhouse',
		'Unit',
		'Villa',
		'Other'];
commercial_category=[
		'Commercial Farming',
		'Land/Development',
		'Hotel/Leisure',
		'Industrial/Warehouse',
		'Medical/Consulting',
		'Offices',
		'Retail',
		'Showrooms/Bulky Goods'];

	$('.radio').click(function() {
		var page_type=$('#page_type').val();
		if(page_type=='residential')
		{
			$('#category').html('');
			$('#property').html('<option value"">Select</option>');
			var buy_type=$(this).val();

			if(buy_type=="sale")
			{
				property = ['Residential','Rural','Land'];
				$.each(property, function(key, value) {   
				 $('#property').append('<option value"'+value+'">'+value+'</option>'); 
				});
			}
			else if(buy_type=="lease")
			{
				property = ['Rental','Holiday'];
				$.each(property, function(key, value) {   
				$('#property').append('<option value"'+value+'">'+value+'</option>');
				});
			}
		}
		});

		$('#property').change(function()
		{
			$('#category').html('');	
			if($(this).val() == 'Residential' || $(this).val() == 'Rental')
			{
				$.each(residential_category, function(key, value) {   
					$('#category').append('<input type="checkbox" name="category[]" value="'+value+'" /> '+value+'</br>');
				});
			}
			else if($(this).val() == 'Rural')
			{
				$.each(rural_category, function(key, value) {   
					$('#category').append('<input type="checkbox" name="category[]" value="'+value+'" /> '+value+'</br>');
				});
			}
			else if($(this).val() == 'Holiday')
			{
				$.each(holiday_category, function(key, value) {   
					$('#category').append('<input type="checkbox" name="category[]" value="'+value+'" /> '+value+'</br>');
				});
			}
			else if($(this).val() == 'Commercial')
			{
				$.each(commercial_category, function(key, value) {   
					$('#category').append('<input type="checkbox" name="category[]" value="'+value+'" /> '+value+'</br>');
				});
			}
		});
		$('#search').click(function(event)
		{
			error_msg = "";
			event.preventDefault();
			if($('input:radio[name=type]:checked').val() == undefined)
			{
				error_msg = "Please select a type";
			}
			else if( ($('#property').val() !='Select') && ($('#property').val()) ) 
			{
				$('#form').submit();
			}
			else
			{
				error_msg = "Please select a property";
			}
			$('#error_msg').html(error_msg);
		});

	$('.pagenation a').click(function ()
	{
	    var link = $(this).get(0).href; // get the link from the DOM object
	    var form = $('#form'); // get the form you want to submit
	    var segments = link.split('/');
	    // assume the page number is the fifth parameter of the link
	    $('#page').val(segments[6]); // set a hidden field with the page number
	    form.attr('action', link); // set the action attribute of the form
	    form.method="post";
	    form.submit(); // submit the form
	    return false; // avoid the default behaviour of the link
	});
});
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
	$('.radio').click(function() {
		$('#category').html('');
		$('#property').html('<option value"">Select</option>');	
		if($(this).val() == "buy")
		{
			property = ['Residential','Rural','Land'];
			$.each(property, function(key, value) {   
			 $('#property').append('<option value"'+value+'">'+value+'</option>'); 
			});
		}
		else
		{
			property = ['Rental','Holiday'];
			$.each(property, function(key, value) {   
			$('#property').append('<option value"'+value+'">'+value+'</option>');
			});
		}
		});
		$('#property').change(function()
		{
			$('#category').html('');	
			if($(this).val() == 'Residential' || $(this).val() == 'Rental')
			{
				$.each(residential_category, function(key, value) {   
					$('#category').append('<option value"'+value+'">'+value+'</option>'); 
				});
			}
			else if($(this).val() == 'Rural')
			{
				$.each(rural_category, function(key, value) {   
					$('#category').append('<option value"'+value+'">'+value+'</option>'); 
				});
			}
			else if($(this).val() == 'Holiday')
			{
				$.each(holiday_category, function(key, value) {   
					$('#category').append('<option value"'+value+'">'+value+'</option>'); 
				});
			}
		});
		$('#search').click(function(event)
		{
			event.preventDefault();
			if( ($('#property').val() !='Select') && ($('#property').val()) ) 
			{
				$('#form').submit();
			}
			else
			{
				alert("Please select property type");
			}
		});
});
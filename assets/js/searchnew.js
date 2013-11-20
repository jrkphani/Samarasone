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

var business_category=new Array();
business_category['Accommodation/Tourism']=[
         'Aged Care',
         'Backpacker/Hostel',
         'Boarding Kennels',
         'Caravan Park',
         'Function Centre',
         'Guest House/B&B',
         'Hotel',
         'Management Rights',
         'Motel',
         'Resort',
         'Retirement Village',
         'Theme Park',
         'Tours'];
business_category['Automotive']=[
         'Accessories/Parts',
         'Aeronautical',
         'Auto Electrical',
         'Bike and Motorcycle',
         'Car Dealership',
         'Car Rental',
         'Car Wash',
         'Detailing',
         'Driving Schools',
         'Marine',
         'Mechanical Repair',
         'Panel Beating',
         'Service Station',
         'Truck',
         'Wreckers'];
business_category['Beauty/Health']= [
         'Beauty Products',
         'Beauty Salon',
         'Dental',
         'Hair',
         'Hospital',
         'Medical',
         'Nails',
         'Nursing Home',
         'Massage',
         'Health Spa',
         'Medical Practice',
         'Natural Therapies',
         'Recreation/Sport'];
business_category['Education/Training']=[
         'Child Care',
         'Employment/Recruitment',
         'Educational',
         'Training'];
business_category['Food/Hospitality'] =[
         'Alcohol/Liquor',
         'Bakery',
         'Butcher',
         'Cafe/Coffee Shop',
         'Catering',
         'Convenience Store',
         'Deli',
         'Distributors',
         'Fruit/Veg',
         'Juice Bar',
         'Manufacturers',
         'Restaurant',
         'Retailer',
         'Supermarket',
         'Takeaway Food',
         'Wholesalers'];
business_category['Franchise']=new Array();
business_category['Home/Garden']=[
         'Home Based',
         'Homewares/Hardware',
         'Irrigation Services',
         'Gardening',
         'Nursery'];
business_category['Import/Export/Whole'] =[
         'Freight',
         'Customs',
         'Import',
         'Export',
         'Wholesale'];
business_category['Industrial/Manufacturing'] = [
         'Building and Construction',
         'Civil',
         'Clothing/Footwear',
         'Electrical',
         'Food/Beverage',
         'Furniture/Timber',
         'Glass/Ceramic',
         'Machinery/Metal',
         'Manufacturing/Engineering',
         'Mining/Earth Moving',
         'Oil/Gas',
         'Paper/Printing',
         'Plastic',
         'Water',
         'Welding'];
business_category['Leisure/Entertainment'] = [
         'Adult',
         'Aircraft',
         'Amusements',
         'Aquatic/Marine',
         'Arts/Crafts',
         'Bars/Nightclubs',
         'Function Centre',
         'Gambling',
         'Garden/Nurseries',
         'Hotel',
         'Music/Video',
         'Recreation/Sport',
         'Sports Complex/Gym',
         'Vending'];
business_category['Professional'] =[
         'Accounting',
         'Advertising/Mkting',
         'Bookkeeping',
         'Brokerage',
         'Civil',
         'Communications',
         'Computer/IT',
         'Finance',
         'Insurance',
         'Internet',
         'Legal',
         'Media',
         'Medical',
         'Property/Real Estate',
         'Recruitment',
         'Scientific',
         'Security',
         'Travel'];
business_category['Retail']=[
         'Clothing/Accessories',
         'Entertainment/Tech',
         'Florist/Nursery',
         'Food/Beverage',
         'Health/Beauty',
         'Homeware/Hardware',
         'Newsagency/Tatts',
         'Office Supplies',
         'Animal related',
         'Pharmacies',
         'Post Offices',
         'Vending'];
business_category['Rural'] = [
         'Aerial',
         'Agricultural',
         'Aquaculture',
         'Crop Harvesting',
         'Dairy Farming',
         'Farming',
         'Fertiliser',
         'Fishing/Forestry',
         'Fruit Picking',
         'Hunting/Trap',
         'Insemination',
         'Irrigation Services',
         'Land Clearing',
         'Livestock',
         'Machinery',
         'Mustering',
         'Shearing',
         'Wool Classing'];
business_category['Services']=[
         'Aircraft',
         'Alarms',
         'Animal related',
         'Boats/Marine',
         'Car/Bus/Truck',
         'Cleaning',
         'Communication',
         'Copy/Laminate',
         'Courier',
         'Driving Schools',
         'Entertainment',
         'Garden/Household',
         'Hire/Rent',
         'Limousine/Taxi',
         'Machinery',
         'Management Rights',
         'Medical',
         'Mobile Services',
         'Pest related',
         'Pool/Water',
         'Print/Photo',
         'Repair'];
business_category['Transport/Distribution']=[
         'Air',
         'Bus',
         'Car',
         'Parking',
         'Rail',
         'Road',
         'Sea',
         'Taxi',
         'Truck'];

	$('.radio').click(function() {
		var page_type=$('#page_type').val();
		$('.moresearch').hide();
		$('.moreinput').val('');
		if(page_type=='residential')
		{
			$('#category').html('');
			$('#property').html('<option value = "">Select</option>');
			var buy_type=$(this).val();

			if(buy_type=="sale")
			{
				property = ['Residential','Rural','Land'];
				$.each(property, function(key, value) {   
				 $('#property').append('<option value = "'+value+'">'+value+'</option>'); 
				});
			}
			else if(buy_type=="lease")
			{
				property = ['Rental','Holiday'];
				$.each(property, function(key, value) {   
				$('#property').append('<option value = "'+value+'">'+value+'</option>');
				});
			}
		}
		});

		$('#property').change(function()
		{
			$('#category').html('');
			$('#moresearch, .category, .bedroom').show();
			$('.moresearch').hide();
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
			else if($(this).val() == 'Land' || $(this).val() == 'CommercialLand')
			{
				$('#moresearch, .moresearch, .category, .bedroom').hide();
				$('#area').show();
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
				error_msg = "Please select Buy or "+radio_txt;
			}
			else if( ($('#property').val() !='Select') && ($('#property').val()) ) 
			{
				$('#form').submit();
			}
			else
			{
				error_msg = "Please select a property type";
			}
			$('#error_msg').html(error_msg);
		});

		$('.category').change(function(){
			business_category_class = $(this).attr("classAttr");
			if($(this).is(":checked"))
			{
				business_category_val = $(this).val();
				$.each(business_category[business_category_val], function(key, value) {   
					$('#sub_category').append('<span class="'+business_category_class+'"><input type="checkbox" name="sub_category[]" value="'+value+'" /> '+value+'</br></span>');
				});
			}
			else
			{
				$('.'+business_category_class).remove();
			}
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
	$('#moresearch').click(function()
	{
		$('.moresearch').toggle();
	});
	if($('#property').val() == 'Land' || $('#property').val() == 'CommercialLand')
			{
				$('#moresearch, .moresearch, .category, .bedroom').hide();
				$('#area').show();
			}
});
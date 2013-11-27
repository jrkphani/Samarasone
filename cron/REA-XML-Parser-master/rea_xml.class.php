<?php
/**
 *
 * Author: Ben Dougherty
 * URL: http://www.devblog.com.au, 
 *	 	http://www.mandurahweb.com.au
 *
 * This code was written for a project by mandurahweb.com. Please give credit if you
 * use this code in any of your projects. You can see a write-up of this code been
 * used to create posts in WordPress here: http://www.devblog.com.au/rea-xml-parser-and-wordpress
 *
 * This code is licensed under with the GPL and may be used and distributed freely. 
 * You may fork the code make changes add extra features etc.
 *
 * Any changes to this code should be released to the open source community.
 *
 *
 * REA_XML allows you to easily retrieve an associative arary of properties
 * indexed by propertyList. Properties types as specified in the REAXML documentation
 * include:
 * 		residential
 *		rental
 *		land
 * 		rural
 *		commercial
 *		commercialLand
 *		business
 *
 * USAGE:
 * 		$rea = new REA_XML($debug=true); //uses default fields
 *		$properties = $rea->parse_dir($xml_file_dir, $processed_dir, $failed_dir, $excluded_files=array());
 * 
 * or 	$property = $rea->parse_file();
 *
 * For a full list of fields please see. http://reaxml.realestate.com.au/ and click 'Mandatory Fields'
 *
 *
 */

class REA_XML {

	/* Default Fields we return. You can specify any
	 * fields int the REA XML standard
	 */
	private $fields = array (
                'priceView',
                'description',
                'features' => array(
                        'bedrooms',
                        'bathrooms',
                        'garages',
                        'carports',
                        'airConditioning',
                        'pool',
                        'alarmSystem',
                        'otherFeatures',
                ),
                'address' => array(
                        'streetNumber',
                        'street',
                        'suburb',
                        'state',
                        'postcode',
                ),        
                'images',
                'status',
        );

	/* default files exluded when parsing a directory */
	private $default_excluded_files = array(".", "..");

	/* Keeps track of excluded files */
	private $excluded_files;

	function REA_XML($debug=false, $fields=array()) {

		/* Use requested fields if set */
		if(!empty($fields)) {
			$this->fields = $fields;
		}
		$this->debug = $debug; /* Set debug flag */
		
	}

	/*
	 * xml_string $xml_string
	 *
	 * Returns an associative array of properties keyed by property type
	 * for the XML string. XML string must be valid.
	 */
	function parse_xml($xml_string) {

		$properties = array();
		$properties_array = array();
		$xml = false;

		try {
			/* Create XML document. */

			/* Some of the xml files I receive were invalid. This could be due to a number
			 * of reasons. SimpleXMLElement still spits out some ugly errors even with the try
			 * catch so we supress them when not in debug mode
			 */
			 if($this->debug) {
				$xml = new SimpleXMLElement($xml_string);	 	
			 }	
			 else {
			 	@$xml = new SimpleXMLElement($xml_string);	
			 }		 
			
		}
		catch(Exception $e) {
			$this->feedback($e->getMessage());
		}

		/* Loaded the file */
		if($xml !== false) {

			/* Get property type */
			$property_root = $xml->xpath("/propertyList/*");
			if(isset($property_root[0])) {
				$property_type = $property_root[0]->getName();	
			}
			
			/* Some XML files don't even have a type and caused errors */
			if(!empty($property_type)) {
				/* Select the property type. */
				$properties = $xml->xpath("/propertyList/$property_type");
			}
		}


		/* We have properties */
		if(is_array($properties) && count($properties) > 0) {
			foreach($properties as $property) {
				$prop = array();//reset property

				/* For every property we select all
				 * the requested fields 
				 */
				foreach($this->fields as $key => $field) {
					if(is_array($field)) {
						if($key == "attrValue" || $key == "attrName" || $key == "attrhref")
						{
							foreach($field as $sub_field) 
							{
								if($property->$sub_field)
								{
									if($key == "attrValue")
									{
										$prop[$sub_field] = (string)$property->$sub_field->attributes()->value;
									}
									else if($key == "attrhref")
									{
										foreach($property->$sub_field as $attrhref)
										$prop[$sub_field][] = (string)$attrhref->attributes()->href;
									}
									else
									{
										$prop[$sub_field] = (string)$property->$sub_field->attributes()->name;
									}
								}
							}
						} 
						else if(count($property->{$key}) > 0)
						{
							if($key == 'listingAgent')
							{
								foreach($property->{$key} as $listingAgent)
								{
									$temp_arr =array();
									foreach($field as $sub_field) {
									$temp_arr[$sub_field] = (string)$listingAgent->{$sub_field};
									}
									$prop[$key][] = $temp_arr;
								}
							}
							else if($key == 'businessCategory')
							{
								//this will get names from businessCategory and businessSubCategory tags
								//ref : http://reaxml.realestate.com.au/docs/reaxml1-xml-format.html#businessCategory
								$temp_str="";
								$temp_str1="";
								foreach($property->{$key} as $businessCategory)
								{
									//use this http://stackoverflow.com/questions/15736445/mysql-query-to-search-multiple-values-in-comma-separated-list-with-and-clause
									$temp_str = $temp_str.(string)$businessCategory->{'name'}.",";
									foreach($businessCategory->{'businessSubCategory'} as $businessSubCategory)
									{
										$temp_str1 = $temp_str1.(string)$businessSubCategory->{'name'}.",";
									}
								}
								$prop[$key] = $temp_str;
								$prop['businessSubCategory'] = $temp_str1;
							}
							else
							{
								foreach($field as $sub_field) {
								$prop[$key][$sub_field] = (string)$property->{$key}->{$sub_field};
								}
							}
						}
					}
					else { /* Different handling for multivalues*/
						//if(($field == "images" || $field == "objects" ) && count($property->$field) > 0) 
						if($field == "images" && count($property->$field) > 0) 
						{
							foreach($property->$field->img as $img) {
								$attr = $img->attributes();
								if($attr->url)
								$prop[$field][] = (string)$attr->url;
							}
						}
						else if($field == "inspectionTimes" && count($property->$field) > 0) 
						{
							foreach($property->$field->inspection as $inspection) {
								$prop[$field][] = (string)$inspection;
							}
						}
						else if(count($property->$field) > 0){
							$prop[$field] = (string)$property->{$field};
						}
						
					}
				}

				if(in_array("status", $this->fields)) {
					$attr = $property->attributes();

					//save status
					$prop['status'] = (string)$attr->status;
					$prop['modTime'] = (string)$attr->modTime;
				}

				/* Save the property */
				$properties_array[$property_type][] = $prop;
			}
		}	

		return $properties_array;	
	}

	/**
	 * string $xml_file_dir
	 * string $processed_dir
	 * string $failed_dir
	 * string[] $excluded_files
	 *
	 * Returns an associative array of properties keyed by property type
	 */
	function parse_directory($xml_file_dir, $processed_dir=false, $failed_dir=false, $excluded_files=array()) {
		$properties = array();
		if(file_exists($xml_file_dir)) {
			if($handle = opendir($xml_file_dir)) {

				/* Merged default excluded files with user specified files */
				$this->excluded_files = array_merge($excluded_files, $this->default_excluded_files);

				/* Loop through all the files. */
				while(false !== ($xml_file = readdir($handle))) {

					/* Ensure it's not exlcuded. */
					if(!in_array($xml_file, $this->excluded_files)) {
						
						/* Get the full path */
						$xml_full_path = $xml_file_dir  . "/" . $xml_file;

						/* retrieve the properties from this file. */
						$prop = $this->parse_file($xml_full_path, $xml_file, $processed_dir, $failed_dir);

						if(is_array($prop) && count($prop) > 0) {

							/* We have to get the array key which is the property
							 * type so we can do a merge with $property[$property_type]
							 * otherwise our properties get overwritten when we try to merge
							 * properties of the same type which already exist.
							 */
							$array_key = array_keys($prop);
							$property_type = $array_key[0];

							if(!isset($properties[$property_type])) {
								//initialise
								$properties[$property_type] = array();
							}

							/* We need the array prop because it includes the property type */
							$properties[$property_type] = array_merge($prop[$property_type], $properties[$property_type]);

							//file loaded
							$file_loaded = true;
						}
						else {
							feedback("no properties returned from file");
						}						
					}
				}
				closedir($handle);
			}
			else {
				feedback("Could not open directory");
			}	
		}
		else {
			throw new Exception("Directory could not be found");
		}

		return $properties;
	}

	/* Parse a REA XML File. */
	function parse_file($xml_full_path, $xml_file, $processed_dir=false, $failed_dir=false) {
		
		$properties = array();
		if(file_exists($xml_full_path)) {

			feedback("parsing XML file $xml_file");

			/* Parse the XML file */
			$properties = $this->parse_xml(file_get_contents($xml_full_path));

			if(is_array($properties) && count($properties > 0)) {
				/* If a processed/removed directory was supplied then we move
				* the xml files accordingly after they've been processed
				*/
				if($processed_dir !== false) {
					if(file_exists($processed_dir)) {
						$this->xml_processed($xml_file, $xml_full_path, $processed_dir);		
					}
					else {
						feedback("Processed dir: $processed_dir does not exist");
					}
					
				}		
			}
			else {
				if($failed_dir !== false) {
					if(file_exists($failed_dir)) {
						$this->xml_load_failed($xml_file, $xml_full_path, $failed_dir);	
					}
					else {
						feedback("Failed dir: $failed_dir does not exist");
					}
					
				}					
			}
		}
		else {
			throw new Exception("File could not be found");
		}

		return $properties;
	}

	/* Called if the xml file was processed */
	function xml_processed($xml_file, $xml_full_path, $processed_dir) {
		//do anything specific to xml_processed

		//move file
		$this->move_file($xml_file, $xml_full_path, $processed_dir);
	}

	/* Called if the xml file was not correctly processed */
	private function xml_load_failed($xml_file, $xml_full_path, $failed_dir) {
		//do anything specific to xml_failed

		//move file
		$this->move_file($xml_file, $xml_full_path, $failed_dir);
	}

	/* Moves a file to a new location */
	private function move_file($file, $file_full_path, $new_dir) {
		if(copy($file_full_path, $new_dir . "/$file")) {
			unlink($file_full_path);
		}
	}

	/* Reset excluded files */
	public function reset_excluded_files() {
		$this->excluded_files = $this->default_excluded_files;
	}

	/* Display Feedback if in debug mode */
	private function feedback($string) {
		if($this->debug) {
			print $string . "<br/>";
		}
	}
	
}

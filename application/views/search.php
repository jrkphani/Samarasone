<style type="text/css">
div{
	padding: 10px;
}
</style>
<h2>Search</h2>
<form name="form1" method="post" action="<?php echo base_url('search/result'); ?>">
<div>
	To Buy<input type="radio" value="buy" name="sale_type" <?php if($sale_type=='buy') echo 'checked="checked"'; ?> checked="checked" disabled="true" />&nbsp;&nbsp;
	To Rent<input type="radio" value="rent" name="sale_type" <?php if($sale_type=='rent') echo 'checked="checked"'; ?> disabled="true" />&nbsp;&nbsp;
</div>
<div>
	Select Property Suburb(s):<br />
	<select multiple name="suburb[]" size="8">
		<option value="" <?php if($suburb[0]==NULL) echo 'selected="selected"'; ?>>Any Suburb</option>
		<?php foreach ($result as $row)
		{//echo '<option value="'.$row->suburb.'">'.$row->suburb.'</option>';?>
			<option value="<?php echo $row->suburb; ?>" <?php if(is_array($suburb) && in_array($row->suburb,$suburb)) echo 'selected="selected"'; ?>><?php echo $row->suburb; ?></option>
		<?php }
		?>
	</select>
</div>
<div>
	Select Property Type(s):<br />
	<select multiple name="type[]" size="10">
		<option value="" <?php if($type[0]==NULL) echo 'selected="selected"'; ?>>Any Property Type</option>
		<option value="House" <?php if(is_array($type) && in_array('House',$type)) echo 'selected="selected"'; ?>>House</option>
		<option value="Unit" <?php if(is_array($type) && in_array('Unit',$type)) echo 'selected="selected"'; ?>>Unit</option>
		<option value="Townhouse" <?php if(is_array($type) && in_array('Townhouse',$type)) echo 'selected="selected"'; ?>>Townhouse</option>
		<option value="Villa" <?php if(is_array($type) && in_array('Villa',$type)) echo 'selected="selected"'; ?>>Villa</option>
		<option value="Apartment" <?php if(is_array($type) && in_array('Apartment',$type)) echo 'selected="selected"'; ?>>Apartment</option>
		<option value="Flat" <?php if(is_array($type) && in_array('Flat',$type)) echo 'selected="selected"'; ?>>Flat</option>
		<option value="Studio" <?php if(is_array($type) && in_array('Studio',$type)) echo 'selected="selected"'; ?>>Studio</option>
		<option value="Warehouse" <?php if(is_array($type) && in_array('Warehouse',$type)) echo 'selected="selected"'; ?>>Warehouse</option>
		<option value="DuplexSemi" <?php if(is_array($type) && in_array('DuplexSemi',$type)) echo 'selected="selected"'; ?>>DuplexSemi-detached</option>
		<option value="Alpine" <?php if(is_array($type) && in_array('Alpine',$type)) echo 'selected="selected"'; ?>>Alpine</option>
		<option value="AcreageSemi-rural" <?php if(is_array($type) && in_array('AcreageSemi-rural',$type)) echo 'selected="selected"'; ?>>AcreageSemi-rural</option>
		<option value="BlockOfUnits" <?php if(is_array($type) && in_array('BlockOfUnits',$type)) echo 'selected="selected"'; ?>>BlockOfUnits</option>
		<option value="Terrace" <?php if(is_array($type) && in_array('Terrace',$type)) echo 'selected="selected"'; ?>>Terrace</option>
		<option value="Retirement" <?php if(is_array($type) && in_array('Retirement',$type)) echo 'selected="selected"'; ?>>Retirement</option>
		<option value="ServicedApartment" <?php if(is_array($type) && in_array('ServicedApartment',$type)) echo 'selected="selected"'; ?>>ServicedApartment</option>
		<option value="Other" <?php if(is_array($type) && in_array('Other',$type)) echo 'selected="selected"'; ?>>Other</option>
		
		<?php /* ?><option value="business" <?php if(is_array($type) && in_array('business',$type)) echo 'selected="selected"'; ?>>Business</option>
		<option value="commercial" <?php if(is_array($type) && in_array('commercial',$type)) echo 'selected="selected"'; ?>>Commercial</option>
		<option value="house" <?php if(is_array($type) && in_array('house',$type)) echo 'selected="selected"'; ?>>House</option><?php */ ?>
	</select>
</div>
<div>
	<select name="price_from">
		<option value="" <?php if($price_from==NULL) echo 'selected="selected"'; ?>>Price from</option>
		<option value="100000" <?php if($price_from=='100000') echo 'selected="selected"'; ?>>100000</option>
		<option value="250000" <?php if($price_from=='250000') echo 'selected="selected"'; ?>>250000</option>
		<option value="1500000" <?php if($price_from=='1500000') echo 'selected="selected"'; ?>>1500000</option>
	</select>&nbsp;&nbsp;
	<select name="price_to">
		<option value="" <?php if($price_to==NULL) echo 'selected="selected"'; ?>>Price to</option>
		<option value="250000" <?php if($price_to=='250000') echo 'selected="selected"'; ?>>250000</option>
		<option value="1500000" <?php if($price_to=='1500000') echo 'selected="selected"'; ?>>1500000</option>
		<option value="3000000" <?php if($price_to=='3000000') echo 'selected="selected"'; ?>>3000000</option>
	</select>
</div>
<div>
	<select name="bedroom">
		<option value="" <?php if($bedroom==NULL) echo 'selected="selected"'; ?>>Bedroom</option>
		<?php for($i=0;$i<=5;$i++) { ?>
		<option value="<?php echo $i; ?>" <?php if($bedroom!=NULL && $bedroom==$i) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
		<?php } ?>
	</select>&nbsp;&nbsp;
	<select name="garage">
		<option value="" <?php echo $garage; if($garage==NULL) echo 'selected="selected"'; ?>>Garages</option>
		<?php for($i=0;$i<=25;$i++) { ?>
		<option value="<?php echo $i; ?>" <?php if($garage!=NULL && $garage==$i) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
		<?php } ?>
	</select>
</div>
<div>
	<input type="submit" name="search" value="Search" />
</div>
</form>
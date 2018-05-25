<div class="control-group <?php echo !empty($propertyValidator->getStreetError()) ? 'error' : ''; ?>">
    <label class="control-label">Strasse*</label>
    <div class="controls">
        <input name="street" type="text" id="fP_strasse" placeholder="Strasse" 
               value="<?php echo !empty($property->getStreet()) ? $property->getStreet() : ''; ?>">
               <?php if (!empty($propertyValidator->getStreetError())): ?>
               <span class="help-inline"><?php echo $propertyValidator->getStreetError(); ?></span>
               <?php endif; ?>
        <span id="isNotTextMessageStreet"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($propertyValidator->getStreetNumberError()) ? 'error' : ''; ?>">
    <label class="control-label">Hausnummer*</label>
    <div class="controls">
        <input name="streetnumber" type="text" id="fP_strassennummer" placeholder="Hausnr." 
               value="<?php echo !empty($property->getStreetnumber()) ? $property->getStreetnumber() : ''; ?>">
               <?php if (!empty($propertyValidator->getStreetnumberError())): ?>
               <span class="help-inline"><?php echo $propertyValidator->getStreetnumberError(); ?></span>
               <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($propertyValidator->getPostcodeError()) ? 'error' : ''; ?>">
    <label class="control-label">PLZ*</label>
    <div class="controls">
        <input name="postcode" type="text" id="fP_plz" placeholder="PLZ" 
               value="<?php echo !empty($property->getPostcode()) ? $property->getPostcode() : ''; ?>">
               <?php if (!empty($propertyValidator->getPostcodeError())): ?>
               <span class="help-inline"><?php echo $propertyValidator->getPostcodeError(); ?></span>
               <?php endif; ?>
               <span id="plzMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($propertyValidator->getCityError()) ? 'error' : ''; ?>">
    <label class="control-label">Ort*</label>
    <div class="controls">
        <input name="city" type="text" id="fP_ort" placeholder="Wohnort"
               value="<?php echo !empty($property->getCity()) ? $property->getCity() : ''; ?>">
               <?php if (!empty($propertyValidator->getCityError())): ?>
               <span class="help-inline"><?php echo $propertyValidator->getCityError(); ?></span>
               <?php endif; ?>
         <span id="isNotTextMessageOrt"></span>
         <p id="requiredMessage"></p>
    </div>
    
</div>
 


<?PHP


?>
<div class="control-group <?php echo !empty($apartmentValidator->getApartment_typeError()) ? 'error' : ''; ?>">
    <label class="control-label">Apartment Typ*</label>
    <div class="controls">
        <input name="apartment_type" type="text" id="fA_apartment_type" placeholder="Art der Wohnung" 
               value="<?php echo !empty($apartment->getApartment_type()) ? $apartment->getApartment_type() : ''; ?>">
               <?php if (!empty($apartmentValidator->getApartment_typeError())): ?>
               <span class="help-inline"><?php echo $apartmentValidator->getApartment_typeError(); ?></span>
               <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($apartmentValidator->getRoomsError()) ? 'error' : ''; ?>">
    <label class="control-label">Anzahl Räume*</label>
    <div class="controls">
        <input name="rooms" type="text" id="fA_rooms" placeholder="Räume" 
            value="<?php echo !empty($apartment->getRooms()) ? $apartment->getRooms() : ''; ?>">
            <?php if (!empty($apartmentValidator->getRoomsError())): ?>
            <span class="help-inline"><?php echo $apartmentValidator->getRoomsError(); ?></span>
            <?php endif; ?>
            <span id="roomsMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($apartmentValidator->getSquaremeterError()) ? 'error' : ''; ?>">
    <label class="control-label">Quadratmeter*</label>
    <div class="controls">
        <input name="squaremeter" type="text" id="fA_squaremeter" placeholder="m^2" 
            value="<?php echo !empty($apartment->getSquaremeter()) ? $apartment->getSquaremeter() : ''; ?>">
            <?php if (!empty($apartmentValidator->getSquaremeterError())): ?>
            <span class="help-inline"><?php echo $apartmentValidator->getSquaremeterError(); ?></span>
            <?php endif; ?>
            <span id="squarmeterMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($apartmentValidator->getId_PropertyError()) ? 'error' : ''; ?>">
    <label class="control-label">Liegenschaft</label>
    <div class="controls">
        <select name="id_property" type="text" id="fA_id_property" placeholder="Liegenschaft">
            <?php 
            foreach ($propertys as $property) {
                if ($property->getId_property()==$apartment->getId_property()) {
                    echo '<option selected="' . $property->getId_property() . '</option>';
                }
                echo '<option value="' . $property->getId_property() . '">' . $property->getId_property() . ' , ' . $property->getStreet() . ' ' . $property->getStreetnumber() . ', ' . $property->getCity() . '</option>';               
            }
            ?>
               <?php if (!empty($apartmentValidator->getId_PropertyError())): ?>
               <span class="help-inline"><?php echo $apartmentValidator->getId_PropertyError(); ?></span>
               <?php endif; ?>
               <span id="id_propertyMessage"></span>
        </select>
        <p id="requiredMessage"></p>
    </div>    
</div>
 


<div class="control-group">
  <label class="control-label" for="sel1">Anrede</label>
  <div class="controls">
    <select name="title" 
            value="<?php echo !empty($tenant->getTitle()) ? $tenant->getTitle() : ''; ?>">
      <option value="Herr" <?php if ($tenant->getTitle() == 'Herr') echo ' selected="selected"'; ?>>Herr</option>
      <option value="Frau" <?php if ($tenant->getTitle() == 'Frau') echo ' selected="selected"'; ?>>Frau</option>
      <option value="Fam." <?php if ($tenant->getTitle() == 'Fam.') echo ' selected="selected"'; ?>>Fam.</option>
      <option value="Dr." <?php if ($tenant->getTitle() == 'Dr.') echo ' selected="selected"'; ?>>Dr.</option>
      <option value="Prof." <?php if ($tenant->getTitle() == 'Prof.') echo ' selected="selected"'; ?>>Prof.</option>
    </select>
  </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getFirstnameError()) ? 'error' : ''; ?>">
    <label class="control-label">Vorname*</label>
    <div class="controls">
        <input name="firstname" type="text" id="fM_vorname" placeholder="Vorname" 
               value="<?php echo !empty($tenant->getFirstname()) ? $tenant->getFirstname() : ''; ?>">
        <?php if (!empty($tenantValidator->getFirstnameError())): ?>
            <span class="help-inline"><?php echo $tenantValidator->getFirstnameError(); ?></span>
        <?php endif; ?>
            <span id="isNotTextMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getLastnameError()) ? 'error' : ''; ?>">
    <label class="control-label">Nachname*</label>
    <div class="controls">
        <input name="lastname" type="text" id="fM_nachname" placeholder="Nachname" 
               value="<?php echo !empty($tenant->getLastname()) ? $tenant->getLastname() : ''; ?>">
        <?php if (!empty($tenantValidator->getLastnameError())): ?>
            <span class="help-inline"><?php echo $tenantValidator->getLastnameError(); ?></span>
        <?php endif; ?>
            <span id="isNotTextMessageToo"></span>   
    </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getBirthdayError()) ? 'error' : ''; ?>">
    <label class="control-label">Geburtsdatum</label>
    <div class="controls">
        <input name="birthday" type="text" id="datepicker" placeholder="DD/MM/YYYY" 
               value="<?php echo !empty($tenant->getBirthday()) ? $tenant->getBirthday() : ''; ?>">
               <?php if (!empty($tenantValidator->getBirthdayError())): ?>
               <span class="help-inline"><?php echo $tenantValidator->getBirthdayError(); ?></span>
               <?php endif;?>
        <span id="isNotaValidDate"></span>  
    </div>
</div>
<div class="control-group">
  <label class="control-label" for="sel1">Zivilstand</label>
  <div class="controls">
    <select name="marital_status">
      <option value="ledig" <?php if ($tenant->getMarital_status() == 'ledig') echo ' selected="selected"'; ?>>ledig</option>
      <option value="verheiratet" <?php if ($tenant->getMarital_status() == 'verheiratet') echo ' selected="selected"'; ?>>verheiratet</option>
      <option value="Konkubinat" <?php if ($tenant->getMarital_status() == 'Konkubinat') echo ' selected="selected"'; ?>>Konkubinat</option>
    </select>
  </div>
</div>
    <div class="control-group <?php echo !empty($tenantValidator->getPhoneError()) ? 'error' : ''; ?>" >
    <label class="control-label">Telefon</label>
    <div class="controls">
        <input name="phone" type="text" id="fM_telefon" placeholder="+41 12 345 67 89" id="fM_telefon"
               value="<?php echo !empty($tenant->getPhone()) ? $tenant->getPhone() : ''; ?>">
               <?php if (!empty($tenantValidator->getPhoneError())): ?>
               <span class="help-inline"><?php echo $tenantValidator->getPhoneError(); ?></span>
               <?php endif;?>
        <span id="telMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getMobileError()) ? 'error' : ''; ?>">
    <label class="control-label">Mobil</label>
    <div class="controls">
        <input name="mobile" type="text" id="fM_mobile" placeholder="+41 12 345 67 89" 
               value="<?php echo !empty($tenant->getMobile()) ? $tenant->getMobile() : ''; ?>">
               <?php if (!empty($tenantValidator->getMobileError())): ?>
               <span class="help-inline"><?php echo $tenantValidator->getMobileError(); ?></span>
               <?php endif;?>
        <span id="mobileMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getEmailError()) ? 'error' : ''; ?>">
    <label class="control-label">Email Addresse*</label>
    <div class="controls">
        <input name="email" id="fM_email" type="text" placeholder="Email Addresse"
               value="<?php echo !empty($tenant->getEmail()) ? $tenant->getEmail() : ''; ?>">
        <?php if (!empty($tenantValidator->getEmailError())): ?>
            <span class="help-inline"><?php echo $tenantValidator->getEmailError(); ?></span>
        <?php endif; ?>
        <span id="emailValidationMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getStreetError()) ? 'error' : ''; ?>">
    <label class="control-label">Strasse</label>
    <div class="controls">
        <input name="street" type="text" id="fM_strasse" placeholder="Strasse" 
               value="<?php echo !empty($tenant->getStreet()) ? $tenant->getStreet() : ''; ?>">
               <?php if (!empty($tenantValidator->getStreetError())): ?>
               <span class="help-inline"><?php echo $tenantValidator->getStreetError(); ?></span>
               <?php endif; ?>
        <span id="isNotTextMessageStreet"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Hausnummer</label>
    <div class="controls">
        <input name="streetnumber" type="text" placeholder="Hausnr." 
               value="<?php echo !empty($tenant->getStreetnumber()) ? $tenant->getStreetnumber() : ''; ?>">
    </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getPostcodeError()) ? 'error' : ''; ?>">
    <label class="control-label">PLZ</label>
    <div class="controls">
        <input name="postcode" type="text" id="fM_plz" placeholder="PLZ" 
               value="<?php echo !empty($tenant->getPostcode()) ? $tenant->getPostcode() : ''; ?>">
               <?php if (!empty($tenantValidator->getPostcodeError())): ?>
               <span class="help-inline"><?php echo $tenantValidator->getPostcodeError(); ?></span>
               <?php endif; ?>
        <span id="plzMessage"></span>
    </div>
</div>
 <div class="control-group <?php echo !empty($tenantValidator->getCityError()) ? 'error' : ''; ?>">
    <label class="control-label">Ort</label>
    <div class="controls">
        <input name="city" type="text" id="fM_ort" placeholder="Wohnort"
               value="<?php echo !empty($tenant->getCity()) ? $tenant->getCity() : ''; ?>">
               <?php if (!empty($tenantValidator->getCityError())): ?>
               <span class="help-inline"><?php echo $tenantValidator->getCityError(); ?></span>
               <?php endif; ?>
         <span id="isNotTextMessageOrt"></span>
    </div>   
</div>
<div class="control-group">
    <label class="control-label">Inaktiv</label>
    <div class="controls">
        <div class="form-check">
          <label class="form-check-label">
            <input type="hidden" name="inactive" value="0"<?php echo ($tenant->getInactive()==0 ? 'unchecked' : '');?>>
            <input type="checkbox" class="form-check-input" name="inactive" value="1"<?php echo ($tenant->getInactive()==1 ? 'checked' : '');?>>
          </label>
        </div>
    </div>
    <p id="requiredMessage"</p> 
</div>
 


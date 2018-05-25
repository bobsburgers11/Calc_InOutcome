
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getStart_of_tenancyError()) ? 'error' : ''; ?>">
    <label class="control-label">Beginn*</label>
    <div class="controls">
        <input name="start_of_tenancy" type="text" id="datepicker" placeholder="yy-mm-dd" 
               value="<?php echo !empty($tenancy_agreement->getStart_of_tenancy()) ? $tenancy_agreement->getStart_of_tenancy() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getStart_of_tenancyError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getStart_of_tenancyError(); ?></span>
               <?php endif;?>
        <span id="startDateMessage"></span>  
    </div>
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getEnd_of_tenancyError()) ? 'error' : ''; ?>">
    <label class="control-label">Ende*</label>
    <div class="controls">
        <input name="end_of_tenancy" type="text" id="datepicker2" placeholder="yy-mm-dd" 
               value="<?php echo !empty($tenancy_agreement->getEnd_of_tenancy()) ? $tenancy_agreement->getEnd_of_tenancy() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getEnd_of_tenancyError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getEnd_of_tenancyError(); ?></span>
               <?php endif;?>
        <span id="endDateMessage"></span>  
    </div>
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getNetrentError()) ? 'error' : ''; ?>">
    <label class="control-label">Nettomiete*</label>
    <div class="controls">
        <input name="netrent" type="number" id="fTA_netrent" placeholder="CHF" 
               value="<?php echo !empty($tenancy_agreement->getNetrent()) ? $tenancy_agreement->getNetrent() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getNetrentError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getNetrentError(); ?></span>
               <?php endif; ?>
        <span id="netrentMessage"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Kündigungsbestimmungen</label>
    <div class="controls">
        <textarea rows ="5" name="cancellationterms" type="text" id="fTA_cancellationterms" placeholder="Fliesstext"><?php echo !empty($tenancy_agreement->getCancellationterms()) ? $tenancy_agreement->getCancellationterms() : ''; ?></textarea>
    </div>
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getId_ApartmentError()) ? 'error' : ''; ?>">
    <label class="control-label">Apartment</label>
    <div class="controls">
        <select name="id_apartment" type="text" id="fTA_apartment" placeholder="Miete/Reparatur/Nebenkosten"
                value="<?php echo !empty($tenancy_agreement->getId_apartment()) ? $tenancy_agreement->getId_apartment() : ''; ?>">
            <?php 
            foreach ($apartments as $apartment) {
                if ($apartment->getId_apartment()==$tenancy_agreement->getId_apartment()) {
                    echo '<option selected="' . $apartment->getId_apartment() . '</option>';
                }
                echo '<option value="' . $apartment->getId_apartment() . '">' . $apartment->getId_apartment() . ' - ' . $apartment->getApartment_type() . ', ' . $apartment->getStreet() . ' ' . $apartment->getStreetnumber() . ', ' . $apartment->getCity() . '</option>';               
            }
            ?>
               <?php if (!empty($tenancy_agreementValidator->getId_ApartmentError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getId_ApartmentError(); ?></span>
               <?php endif; ?>
        </select>
    </div>    
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getId_tenantError()) ? 'error' : ''; ?>">
    <label class="control-label">Mieter</label>
    <div class="controls">
        <select name="id_tenant" type="text" id="fTA_tenant" placeholder="Mieter"
                value="<?php echo !empty($tenancy_agreement->getId_tenant()) ? $tenancy_agreement->getId_tenant() : ''; ?>">
            <?php 
            foreach ($tenants as $tenant) {
                if ($tenant->getId_tenant()==$tenancy_agreement->getId_tenant()) {
                    echo '<option selected="' . $tenant->getId_tenant() . '</option>';
                }
                echo '<option name= "id_tenant" value="' . $tenant->getId_tenant() . '">' . $tenant->getId_tenant() . ', ' . $tenant->getFirstname() . ' ' .$tenant->getLastname() . '</option>';
            }
            ?>
               <?php if (!empty($tenancy_agreementValidator->getId_tenantError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getId_tenantError(); ?></span>
               <?php endif; ?>
        </select>
        <p id="requiredMessage"></p>
    </div>    
</div>

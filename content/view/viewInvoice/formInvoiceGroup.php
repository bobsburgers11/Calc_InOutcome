<div class="control-group ">
    <label class="control-label">Betrag*</label>
    <div class="controls">
        <input name="total_amount" type="text" id="fI_amount" placeholder="CHF" 
               value="">
               <span class="help-inline"></span>
        <span id="amountMessage"></span>
    </div>
</div>
<div class="control-group ">
    <label class="control-label">Rechnungsdatum*</label>
    <div class="controls">
        <input name="invoice_date" type="text" id="datepicker" placeholder="DD/MM/YYYY" 
               value="">
               <span class="help-inline"></span>
        <span id="isNotaValidDate"></span>  
    </div>
</div>
<div class="control-group">
    <label class="control-label">Mieter</label>
    <div class="controls">
        <select name="id_property" type="text" id="fIG_id_property" placeholder="Liegenschafts ID">
            <?php 
            foreach ($propertys as $property) {
                echo '<option value="' . $property->getId_property() . '">' . $property->getId_property() . ', ' . $property->getStreet() . ' ' . $property->getStreetnumber() . ', ' . $property->getCity() . '</option>';
            }
            ?>
        </select>
    </div>    
</div>
<div class="control-group ">
    <label class="control-label">Rechnungstyp</label>
    <div class="controls">
        <select name="invoice_type" type="text" id="fI_invoice_type" placeholder="Miete/Reparatur/Nebenkosten"
               value="">
            <option>Miete</option>
            <option>Reparatur</option>
            <option>Oel</option>
            <option>Wasser</option>
            <option>Strom</option>
            <option>Hauswart</option>
            <option>Diverses</option>
        </select>
    </div>    
</div>
<div class="control-group ">
    <label class="control-label">Rechnungsnr*</label>
    <div class="controls">
        <input name="invoicenr" type="text" id="fI_Invoicenr" placeholder="Nr." 
               value="">
               <span class="help-inline"></span>
               <span id="invoicenrMessage"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Kommentar</label>
    <div class="controls"><textarea rows = "5" name="comment" type="text" value="" placeholder=""></textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Bezahlt</label>
    <div class="controls">
        <div class="form-check">
          <label class="form-check-label">
            <input type="hidden" name="payed" value="0">
            <input type="checkbox" class="form-check-input" name="payed" value="1">
          </label>
        </div>
    </div>
     <p id="requiredMessage"</p> 
</div>
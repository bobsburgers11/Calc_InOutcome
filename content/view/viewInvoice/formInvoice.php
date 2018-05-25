<div class="control-group <?php echo !empty($invoiceValidator->getAmountError()) ? 'error' : ''; ?>">
    <label class="control-label">Betrag*</label>
    <div class="controls">
        <input name="amount" type="text" id="fI_amount" placeholder="0.00" 
               value="<?php echo !empty($invoice->getAmount()) ? $invoice->getAmount() : ''; ?>">
               <?php if (!empty($invoiceValidator->getAmountError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getAmountError(); ?></span>
               <?php endif; ?>
        <span id="amountMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($invoiceValidator->getInvoice_dateError()) ? 'error' : ''; ?>">
    <label class="control-label">Rechnungsdatum*</label>
    <div class="controls">
        <input name="invoice_date" type="text" id="datepicker" placeholder="yy-mm-dd" 
               value="<?php echo !empty($invoice->getInvoice_date()) ? $invoice->getInvoice_date() : ''; ?>">
               <?php if (!empty($invoiceValidator->getInvoice_dateError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getInvoice_dateError(); ?></span>
               <?php endif;?>
        <span id="isNotaValidDate"></span>  
    </div>
</div>
<div class="control-group <?php echo !empty($invoiceValidator->getId_tenancy_agreementError()) ? 'error' : ''; ?>">
    <label class="control-label">Mieter</label>
    <div class="controls">
        <select name="id_tenancy_agreement" type="text" id="fI_invoice_type" placeholder="Miete/Reparatur/Nebenkosten"
                value="<?php echo !empty($invoice->getId_tenancy_agreement()) ? $invoice->getId_tenancy_agreement() : ''; ?>">
            <?php 
            foreach ($tenancy_agreements as $tenancy_agreement) {
                if ($tenancy_agreement->getId_tenancy_agreement()==$invoice->getId_tenancy_agreement()) {
                    echo '<option selected="' . $tenancy_agreement->getId_tenancy_agreement() . ', ' . $tenancy_agreement->getFirstname() . ' ' .$tenancy_agreement->getLastname() . '</option>';
                }
                echo '<option value="' . $tenancy_agreement->getId_tenancy_agreement() . '">' . $tenancy_agreement->getId_tenancy_agreement() . ', ' . $tenancy_agreement->getFirstname() . ' ' .$tenancy_agreement->getLastname() . '</option>';  
            }
            ?>
               <?php if (!empty($invoiceValidator->getId_tenancy_agreementError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getId_tenancy_agreementError(); ?></span>
               <?php endif; ?>
        </select>
    </div>    
</div>
<div class="control-group <?php echo !empty($invoiceValidator->getInvoice_typeError()) ? 'error' : ''; ?>">
    <label class="control-label">Rechnungstyp</label>
    <div class="controls">
        <select name="invoice_type" type="text" id="fI_invoice_type" placeholder="Miete/Reparatur/Nebenkosten">
            <option value="Miete" <?php if ($invoice->getInvoice_type() == 'Miete') echo ' selected="selected"'; ?>>Miete</option>
            <option value="Reparatur" <?php if ($invoice->getInvoice_type() == 'Reparatur') echo ' selected="selected"'; ?>>Reparatur</option>
            <option value="Oel" <?php if ($invoice->getInvoice_type() == 'Oel') echo ' selected="selected"'; ?>>Oel</option>
            <option value="Wasser" <?php if ($invoice->getInvoice_type() == 'Wasser') echo ' selected="selected"'; ?>>Wasser</option>
            <option value="Strom" <?php if ($invoice->getInvoice_type() == 'Strom') echo ' selected="selected"'; ?>>Strom</option>
            <option value="Hauswart" <?php if ($invoice->getInvoice_type() == 'Hauswart') echo ' selected="selected"'; ?>>Hauswart</option>
            <option value="Diverses" <?php if ($invoice->getInvoice_type() == 'Diverses') echo ' selected="selected"'; ?>>Diverses</option>
               <?php if (!empty($invoiceValidator->getInvoice_typeError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getInvoice_typeError(); ?></span>
               <?php endif; ?>
        </select>
    </div>    
</div>
<div class="control-group <?php echo !empty($invoiceValidator->getInvoicenrError()) ? 'error' : ''; ?>">
    <label class="control-label">Rechnungsnr*</label>
    <div class="controls">
        <input name="invoicenr" type="text" id="fI_Invoicenr" placeholder="Nr." 
               value="<?php echo !empty($invoice->getInvoicenr()) ? $invoice->getInvoicenr() : ''; ?>">
               <?php if (!empty($invoiceValidator->getInvoicenrError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getInvoicenrError(); ?></span>
               <?php endif; ?>
               <span id="invoicenrMessage"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Kommentar</label>
    <div class="controls">
        <textarea rows ="5" name="comment" type="text" id="fI_comment" placeholder="Fliesstext"><?php echo !empty($invoice->getComment()) ? $invoice->getComment() : ''; ?></textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Bezahlt</label>
    <div class="controls">
        <div class="form-check">
          <label class="form-check-label">
            <input type="hidden" name="payed" value="0"<?php echo ($invoice->getPayed()==0 ? 'unchecked' : '');?>>
            <input type="checkbox" class="form-check-input" name="payed" value="1"<?php echo ($invoice->getPayed()==1 ? 'checked' : '');?>>
          </label>
        </div>
    </div>
     <p id="requiredMessage"</p> 
</div>
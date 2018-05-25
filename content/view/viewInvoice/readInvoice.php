<?PHP


?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Rechnung anzeigen</h3>
        </div>

        <div class="form-horizontal">
            <div class="control-group row">
                <label class="control-label">ID</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getId_invoice(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Betrag</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getAmount(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Rechnungsdatum</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getInvoice_date(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Rechnungstyp</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getInvoice_type(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Rechnungsnummer</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getInvoicenr(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Kommentar</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getComment(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">bezahlt?</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getPayed(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Liegenschaft</strong></label>
            </div>
            <div class="control-group">
                <label class="control-label">Strasse</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getStreet(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Hausnummer</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getStreetnumber(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">PLZ</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getPostcode(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Stadt</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getCity(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Mieter</strong></label>
            </div>
            <div class="control-group">
                <label class="control-label">Vorname</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getFirstname(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nachname</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $invoice->getLastname(); ?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <a class="btn" href="?controller=Invoice&action=show">Zurück</a>
            </div>
        </div>
    </div>

</div>

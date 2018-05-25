<?PHP


?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Mietvertrag anzeigen</h3>
        </div>

        <div class="form-horizontal">
            <div class="control-group row">
                <label class="control-label">ID</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenancy_agreement->getId_tenancy_agreement(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Start</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenancy_agreement->getStart_of_tenancy(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Ende</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenancy_agreement->getEnd_of_tenancy(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nettomiete</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenancy_agreement->getNetrent(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Kündigungsbestimmungen</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenancy_agreement->getCancellationterms(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Appartmentnr.</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenancy_agreement->getId_apartment(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mieternr.</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenancy_agreement->getId_tenant(); ?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <a class="btn" href="?controller=Tenancy_agreement&action=show">Zurück</a>
            </div>


        </div>
    </div>

</div>

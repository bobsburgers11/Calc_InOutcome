<?PHP


?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Mieter anzeigen</h3>
        </div>

        <div class="form-horizontal">
            <div class="control-group row">
                <label class="control-label">ID</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getId_tenant(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Vorname</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getFirstname(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nachname</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getLastname(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Strasse</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getStreet(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nr.</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getStreetnumber(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">PLZ</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getPostcode(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Stadt</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getCity(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email Addresse</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getEmail(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Tel.</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getPhone(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mob.</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getMobile(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Geburtsdatum</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getBirthday(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Zivilstand</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $tenant->getMarital_status(); ?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <a class="btn" href="?controller=Tenant&action=show">Zurück</a>
            </div>


        </div>
    </div>

</div>

<?PHP


?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Wohnung anzeigen</h3>
        </div>

        <div class="form-horizontal">
            <div class="control-group row">
                <label class="control-label">ID</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $apartment->getId_apartment(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Typ</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $apartment->getApartment_type(); ?>
                    </label>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Zimmer</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $apartment->getRooms(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">M^2</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $apartment->getSquaremeter(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Liegenschaft</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $apartment->getId_property(); ?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <a class="btn" href="?controller=Apartment&action=show">Zurück</a>
            </div>


        </div>
    </div>

</div>

<?PHP


?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Mietvertrag löschen</h3>
        </div>

        <form class="form-horizontal" action="?controller=Tenancy_agreement&action=delete" method="post">
            <input type="hidden" name="id_tenancy_agreement" value="<?php echo $tenancy_agreement->getId_tenancy_agreement(); ?>"/>
            <p class="alert alert-error">Wollen Sie den Eintrag löschen ? Die damit verbundenen Rechnungen werden ebenfalls gelöscht.</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Ja</button>
                <a class="btn" href="?controller=Tenancy_agreement&action=show">Nein</a>
            </div>
        </form>
    </div>

</div>

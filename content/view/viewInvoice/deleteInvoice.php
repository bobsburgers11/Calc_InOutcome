<?PHP


?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Rechnung löschen</h3>
        </div>

        <form class="form-horizontal" action="?controller=Invoice&action=delete" method="post">
            <input type="hidden" name="id_invoice" value="<?php echo $invoice->getId_invoice(); ?>"/>
            <p class="alert alert-error">Wollen Sie den Eintrag löschen ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Ja</button>
                <a class="btn" href="?controller=Invoice&action=show">Nein</a>
            </div>
        </form>
    </div>

</div>

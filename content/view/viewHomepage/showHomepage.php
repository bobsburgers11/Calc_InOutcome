<?PHP


?>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable({
            order: [[2, 'desc']],
                "columnDefs": [ 
                    { "targets": 9, "orderable": false },
                    { "targets": 1 , render: $.fn.dataTable.render.number( "'", '.', 2, 'CHF ' ) },
                    { "targets": 1, "width": "15%" },
                    { "targets": 2, render: $.fn.dataTable.render.moment( 'DD.MM.YY' ) },
                    { "targets": 2, "width": "5%" }
                ],
                language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/German.json"
                }
        });
        $("[data-toggle=tooltip]").tooltip();
    }
        );
</script>

<header></header>
<style>
header {
  background-image:url(../../img/street-1431207_1280.jpg);
  background-repeat:no-repeat;
  background-size:contain;
  background-position:center;
  height: 400px;
}

</style>

<div class="container">
    <div class="row">
        <h3>Home</h3>
    </div>
    <div class="row">
        
        <h4>Rechnungen welche länger als 30 Tage unbezahlt sind</h4> 
    </div>
    <div class="row">
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Betrag</th>
                <th>Datum</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Ort</th>
                <th>Rechungsart</th>
                <th>Rechnungsnr.</th>
                <th>Bezahlt</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($invoices as $invoice) {
                echo '<tr>';
                echo '<td>' . $invoice->getId_invoice() . '</td>';
                echo '<td>' . $invoice->getAmount() . '</td>';
                echo '<td>' . $invoice->getInvoice_date() . '</td>';
                echo '<td>' . $invoice->getFirstname() . '</td>';
                echo '<td>' . $invoice->getLastname() . '</td>';
                echo '<td>' . $invoice->getCity() . '</td>';
                echo '<td>' . $invoice->getInvoice_type() . '</td>';
                echo '<td>' . $invoice->getInvoicenr() . '</td>';
                echo '<td>' . $invoice->getPayedPic() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=Invoice&action=read&id_invoice=' . $invoice->getId_invoice() . '"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=Invoice&action=update&id_invoice=' . $invoice->getId_invoice() . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=Invoice&action=deleteAsk&id_invoice=' . $invoice->getId_invoice() . '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
            <div class="form-actions" >
                <h4>© 2016 Alexander Noever, Heiko Meyer und Simon Zahnd Fachhochschule Nordwestschweiz Studiengang für Wirtschaftsinformatiker</h4>
            </div>
    </div>
</div>


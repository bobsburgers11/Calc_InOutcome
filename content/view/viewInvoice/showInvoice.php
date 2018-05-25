<?PHP


?>
<script type="text/javascript" src="jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable({
            order: [[2, 'desc']],
                "columnDefs": [ 
                    { "targets": 9, "orderable": false },
                    { "targets": 1, "width": "15%" },
                    { "targets": 1 , render: $.fn.dataTable.render.number( "'", '.', 2, 'CHF ' ) },
                    { "targets": 2, render: $.fn.dataTable.render.moment( 'DD.MM.YY' ) },
                    { "targets": 2, "width": "5%" },
                    { "targets": "payed", "orderable": true }
                ],
        
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/German.json"
            }
        });
        $("[data-toggle=tooltip]").tooltip();
    }
        );
</script>

<div class="container">
    <div class="row">
        <h3>Rechnungsübersicht</h3>
    </div>
    <div class="row">
        <p>
            <a href="?controller=Invoice&action=create" class="btn btn-success">Erstellen</a>
        </p>
        <p>
            <a href="?controller=Invoice&action=createInvoiceGroup" class="btn btn-success">Gruppenrechnung erstellen</a>
        </p>
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
                echo '<td><label style="opacity:0.0">' . $invoice->getPayed() . '</label>' . $invoice->getPayedPic() . '</td>';
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
    </div>
</div>

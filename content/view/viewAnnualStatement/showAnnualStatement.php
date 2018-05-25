<?PHP


?>
<div class="container">
    <div class="row">
        <h3>Periodenabrechnung</h3>
    </div>
    <div>
        <?php echo '<h4>Von: ' . $date_begin_fm->format('d.m.Y') . ' Bis: ' . $date_end_fm->format('d.m.Y') . '</h4>'?>
    </div>
    <div class="row">
        <p>
            <a class="btn btn-success" href="../view/createAnnualStatementPDF.php" class="btn btn-success">PDF erstellen</a>
            <a class="btn btn" href="?controller=AnnualStatement&action=home" class="btn btn">Zurück</a>
        </p>
        <div class="row">
        <h4>Bezahlte Rechnungen</h4>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr class="active">
                <th>Bereich</th>
                <th>Strasse</th>
                <th>Nr.</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>Betrag</th>
                <th>Summe</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($invoiceTypes as $invoiceType) {
                echo '<tr class="info">';
                echo '<td><strong>' . $invoiceType->getInvoice_type() . '</strong></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '</tr>';
                foreach ($invoiceType->getReportPropertys() as $reportProperty) {
                    echo '<tr>';
                    echo '<td></td>';
                    echo '<td>' . $reportProperty->getStreet() . '</td>';
                    echo '<td>' . $reportProperty->getStreetnumber() . '</td>';
                    echo '<td>' . $reportProperty->getPostcode() . '</td>';
                    echo '<td>' . $reportProperty->getCity() . '</td>';
                    echo '<td>' . $reportProperty->getTotal() . '</td>';
                    echo '<td></td>';
                    echo '</tr>';
                }
                echo '<tr>';
                echo '<td>Total</td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td><strong>' . $invoiceType->getTotal() . '</strong></td>';
                echo '</tr>';
                
            }
            ?>
            </tbody>
            <tfoot>
                <?php
                echo '<tr>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td><strong>Total</strong></td>';
                echo '<td><strong>' . $totalAmountPayed->getTotalAmount() . '</strong></td>';
                echo '</tr>';
                ?>
            </tfoot>
        </table>
        <div class="row">
        <h4>offene Rechnungen</h4>
        </div>
                <table class="table table-bordered">
            <thead>
            <tr class="active">
                <th>Bereich</th>
                <th>Strasse</th>
                <th>Nr.</th>
                <th>PLZ</th>
                <th>Ort</th>    
                <th>Betrag</th>
                <th>Summe</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($invoiceNegTypes as $invoiceNegType) {
                echo '<tr class="info">';
                echo '<td><strong>' . $invoiceNegType->getInvoice_type() . '</strong></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '</tr>';
                foreach ($invoiceNegType->getReportPropertys() as $reportNegProperty) {
                    echo '<tr>';
                    echo '<td></td>';
                    echo '<td>' . $reportNegProperty->getStreet() . '</td>';
                    echo '<td>' . $reportNegProperty->getStreetnumber() . '</td>';
                    echo '<td>' . $reportNegProperty->getPostcode() . '</td>';
                    echo '<td>' . $reportNegProperty->getCity() . '</td>';
                    echo '<td>' . $reportNegProperty->getTotal() . '</td>';
                    echo '<td></td>';
                    echo '</tr>';
                }
                echo '<tr>';
                echo '<td>Total</td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td><strong>' . $invoiceNegType->getTotal() . '</strong></td>';
                echo '</tr>';
                
            }
            ?>
            </tbody>
            <tfoot>
                <?php
                echo '<tr>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td><strong>Total</strong></td>';
                echo '<td><strong>' . $totalAmountPayedNeg->getTotalAmount() . '</strong></td>';
                echo '</tr>';
                ?>
            </tfoot>
        </table>
    </div>
</div>
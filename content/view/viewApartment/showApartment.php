<?PHP


?>

<script>
    $(document).ready(function() {
        $('#apartment').dataTable({
            order: [[1, 'asc']],
                "columnDefs": [ { "targets": 5, "orderable": false },
                    { "targets": [ 0, 2, 4 ], "width": "5%" },
                    { "targets": 3, "width": "10%" },
                    { "targets": 3 , render: $.fn.dataTable.render.number( "'", '.', 0, 'm² ' ) }
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
        <h3>Wohungsübersicht</h3>
    </div>
    <div class="row">
        <p>
            <a class="btn btn-success" href="?controller=Apartment&action=create&id_property=' <?php  echo $_GET['id_property'] ?> '" class="btn btn-success">Erstellen</a>
            <a class="btn btn" href="?controller=Property&action=show" class="btn btn">Zurück</a>
        </p>

            <table id="apartment" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th name="id_apartment">ID</th>
                <th name="apartment_type">Typ</th>
                <th name="rooms">Zimmer</th>
                <th name="squaremeter">m²</th>
                <th name="street">Strasse</th>
                <th name="streetnumber">Nr.</th>
                <th name="postcode">PLZ</th>
                <th name="city">Ort</th>
                <th name="city">Vermietet</th>
                <th name="action">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($apartments as $apartment) {
                echo '<tr>';
                echo '<td>' . $apartment->getId_apartment() . '</td>';
                echo '<td>' . $apartment->getApartment_type() . '</td>';
                echo '<td>' . $apartment->getRooms() . '</td>';
                echo '<td>' . $apartment->getSquaremeter() . '</td>';
                echo '<td>' . $apartment->getStreet() . '</td>';
                echo '<td>' . $apartment->getStreetnumber() . '</td>';
                echo '<td>' . $apartment->getPostcode() . '</td>';
                echo '<td>' . $apartment->getCity() . '</td>';
                echo '<td><label style="opacity:0.0">' . $apartment->getTenancy_status() . '</label>' . $apartment->getStatusPic() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=Apartment&action=read&id_apartment=' . $apartment->getId_apartment() . '"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=Apartment&action=update&id_apartment=' . $apartment->getId_apartment() . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=Apartment&action=deleteAsk&id_apartment=' . $apartment->getId_apartment() . '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

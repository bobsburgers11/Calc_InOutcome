<?PHP


?>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable({
            order: [[0, 'asc']],
                "columnDefs": [ 
                    { "targets": 6, "orderable": false } 
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
        <h3>Liegenschaftsübersicht</h3>
    </div>
    <div class="row">
        <p>
            <a href="?controller=Property&action=create" class="btn btn-success">Erstellen</a>
        </p>

        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>anlegen</th>
                <th>Strasse</th>
                <th>Nr.</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($propertys as $property) {
                echo '<tr>';
                echo '<td>' . $property->getId_property() . '</td>';
                echo '<td width=50>';
                echo '<a class="btn" href="?controller=Apartment&action=showForProperty&id_property=' . $property->getId_property() . '">Wohnungen</a>';
                echo '</td>';
                echo '<td>' . $property->getStreet() . '</td>';
                echo '<td>' . $property->getStreetnumber() . '</td>';
                echo '<td>' . $property->getPostcode() . '</td>';
                echo '<td>' . $property->getCity() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=Property&action=read&id_property=' . $property->getId_property() . '"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=Property&action=update&id_property=' . $property->getId_property() . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=Property&action=deleteAsk&id_property=' . $property->getId_property() . '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

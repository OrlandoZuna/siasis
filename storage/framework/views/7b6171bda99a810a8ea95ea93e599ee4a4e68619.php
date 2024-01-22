
<!DOCTYPE html>
<html lang="en">
    <head>

        <?php echo Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js'); ?>

        <?php echo Html::script('assets/js/bootstrap/dist/css/bootstrap.min.css'); ?>

        <!-- <?php echo Html::style('assets/plugins/datatables/dataTables.bootstrap.css'); ?>

        <?php echo Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>

        <?php echo Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css'); ?> -->
        <style type="text/css">
            .myscroll {
                border: solid white 1px;
                overflow: scroll;
                height: 470px;
            }
            .table__kiri {
                width: 100%;
                height: auto;
                position: relative;
                border: 1px solid #000;
            }
            .table__kiri thead {
            background: #113F63;
            color: #fff;
            }
            .table__kiri thead tr {
            height: 28px;
            }
            .table__kiri thead tr td {
            text-align: center;
            /* width: 12%; */
            border: 1px solid #fff;
            text-transform: uppercase;
            }
            .table__kiri tbody tr {
            height: 28px;
            }
            .table__kiri tbody tr td {
            padding-left: 10px;
            /* width: 12%; */
            border: 1px solid #fff;
            text-transform: uppercase;
            }
            .table__kiri tbody tr:nth-child(even) {
            background: #deeaf4;
            }
        </style>

    </head>
    <body style="overflow: auto; border:1px solid blue;">
        <div >
        <table class="table table__kiri table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                </tr>
            </tbody>
        </table>
        </div>

    </body>
</html><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/eventos/eventoAsistencia/pdfevento.blade.php ENDPATH**/ ?>
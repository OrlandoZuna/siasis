<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade generalBiometricos" id="biometri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2" style="text-align: center;"><b>Biometricos</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
            <table class="table__kirito table-bordered"  id="table" name="table">
                    <thead>
                    <tr>
                    <th>Nombre</th>
                    <th>Ip</th>
                    <th>Puerto</th>
                    <th>Version</th>
                    <th>Modelo</th>
                    <th>Lugar</th>
                    <!-- <th>F_creacion</th> -->
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    @foreach($biometricos as $biometrico)
                        <tr>
                        <td> {{ $biometrico->nombre }}</td>
                        <td> {{ $biometrico->ip }}</td>
                        <td> {{ $biometrico->puerto }}</td>
                        <td> {{ $biometrico->version }}</td>
                        <td> {{ $biometrico->modelo }}</td>
                        <td> {{ $biometrico->lugar }}</td>
                        <!-- <td> {{ $biometrico->fecha_creacion }}</td> -->
        
                        </tr>
                    @endforeach

                    </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

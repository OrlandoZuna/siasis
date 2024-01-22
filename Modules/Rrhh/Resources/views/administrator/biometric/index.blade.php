@extends('rrhh::layouts.master')
@section('menu')
    @include('rrhh::complement.menu')
@endsection

@section('bar_top')
    @include('rrhh::complement.navs')
@endsection


@section('after-style')

    {!! Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css') !!}
    {!! Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css') !!}
    <style type="text/css">
        .myscroll {
            border: solid white 1px;
            overflow: scroll;
            height: 470px;
        }
    </style>
@endsection

@section('title', $title)

@section('before-style')

@section('content')
<div class="container">
<?php
	// $zk = new ZKTeco('192.168.100.94', 4370);

	$ret = $zk->connect();
	if ( $ret ):
		$zk->disableDevice();

	/*
	$zk->testVoice();
	$zk->setUser(new User(
		99,
		User::PRIVILEGE_COMMON_USER,
		'1234',
		'User99',
		'Card99',
		'1',
		-3,
		99
	));
	*/
	?>
		<div class="row">
			<div class="col-md-12">
				<table class="table__kirito table-bordered">
					<tr class="mytr">
						<td><b>Status</b></td>
						<td>Connected</td>
						<td><b>Version</b></td>
						<td><?php echo $zk->version() ?></td>
						<td><b>OS Version</b></td>
						<td><?php echo $zk->osVersion() ?></td>
						<td><b>Platform</b></td>
						<td><?php echo $zk->platform() ?></td>
					</tr>
					<tr>
						<td><b>Firmware Version</b></td>
						<td><?php echo $zk->fmVersion() ?></td>
						<td><b>WorkCode</b></td>
						<td><?php echo $zk->workCode() ?></td>
						<td><b>SSR</b></td>
						<td><?php echo $zk->ssr() ?></td>
						<td><b>Pin Width</b></td>
						<td><?php echo $zk->pinWidth() ?></td>
					</tr>
					<tr>
						<td><b>Face Function On</b></td>
						<td><?php echo $zk->faceFunctionOn() ?></td>
						<td><b>Serial Number</b></td>
						<td><?php echo $zk->serialNumber() ?></td>
						<td><b>Device Name</b></td>
						<td><?php echo $zk->deviceName() ?></td>
						<td><b>Get Time</b></td>
						<td><?php echo $zk->getTime() ?></td>
					</tr>
				</table>
				
			</div>

		</div>
		
		<div class="row">
			<div class="col-md-12">
				<table class="table table-dark table-bordered">

					<thead class="table-dark">
						<tr>
							<th colspan="6">User</th>
						</tr>
						<tr>
							<th>UID</th>
							<th>UserId</th>
							<th>Name</th>
							<th>Role</th>
							<th>Password</th>
							<th>Card number</th>
						</tr>
					</thead>
					<tbody>
						
					<?php
					try {
				// $zk->clearUsers();
				// $zk->setUser(new User(1, User::PRIVILEGE_SUPERADMIN, '1', 'Admin', '', '', -3, 1));
				
					foreach($zk->getUser() as $user):
						?>
						<tr class="">
							<td width="3%" style="text-align: center;"><?php echo $user['uid']; ?></td>
							<td width="8%" style="text-align: center;"><?php echo $user['userid']; ?></td>
							<td style="text-align: center;"><?php echo $user['role']; ?></td>
							<td style="text-align: center;"><?php echo $user['name']; ?></td>
							<td style="text-align: center;"><?php echo $user['password']; ?></td>
							<td style="text-align: center; width: 20%;"><?php echo $user['cardno']; ?></td>
						</tr>

						<?php
						endforeach;
					} catch (Exception $e) {
						header("HTTP/1.0 404 Not Found");
						header('HTTP', true, 500); // 500 internal server error
					}
					// $zk->clearAdmins();
					?>
						
					</tbody>

				</table>
			</div>
		</div>

		<div class>
			<div class="d-grid gap-2 d-md-flex justify-content-md-flex">
				<button type="button" id="addAsistencia" class="btn btn-primary ">Importar</button>
			</div>
			<table class="table table-dark">
				<tr>
					<th colspan="6">Data Attendance</th>
				</tr>
				<tr>
					<th>UID</th>
					<th>Id</th>
					<th>State</th>
					<th>timestamp</th>
					<th>type</th>
				</tr>
				<?php
			foreach($zk->getAttendance() as $attendance):

			?>
				<tr>
					<td><?php echo $attendance['uid']; ?></td>
					<td><?php echo $attendance['id']; ?></td>
					<td><?php echo $attendance['state']; ?></td>
					<td><?php echo $attendance['timestamp']; ?></td>
					<td><?php echo $attendance['type']; ?></td>

				</tr>
				<?php
					endforeach;
				?>
			</table>
		</div>

	<?php
		$zk->enableDevice();
		$zk->disconnect();
	endif
?>
	</div>
@endsection

@section('after-script')

@parent
    {!! Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
    {!! Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js') !!}
	<script>
    $(document).on('click','#addAsistencia',function(e){
        //e.preventDefault();
        console.log('importara asistencias del biometrico');
            var bool=confirm("esta seguro de importar las asistencias del biometrico? ");
            if(bool){
                $.ajax({
                    url:"{{url("rrhh/bioconectImport")}}",
                    type:"get",
                    //data:{"id":id},
                    success:function(datos){
                        if(datos.resp==200){
                            toastr.success("importacion de asitencias correcta del biometrico");
                        }
                    }
                });
            }
    });           
</script>
@endsection




<style type="text/css">
	.eliminarUser{
      background:linear-gradient(10deg, #e73f0b, #a11f0c) !important;
    }
    .eliminarUser:hover{
      background:linear-gradient(10deg, #283655, #4d648d) !important;
    }
</style>
<table class="table__kirito table-bordered" style="width:99%">
        <thead>
        <tr >
          <th>UID</th>
          <th>UserId</th>
          <th>Name</th>
          <th>Role</th>
          <th>Password</th>
          <th>Card number</th>
          <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
				
					@foreach($users as $user)

						<tr class="">
							<td width="3%" style="text-align: center;">{{ $user['uid'] }}</td>
							<td width="8%" style="text-align: center;">{{ $user['userid'] }}</td>
							<td style="text-align: center;">{{ $user['name'] }}</td>
							<td style="text-align: center;">{{ $user['role'] }}</td>
							<td style="text-align: center;">{{ $user['password'] }}</td>
							<td style="text-align: center; width: 20%;">{{ $user['cardno'] }}</td>
              				<td> <button type="button" onclick ="eliminar ({{ $user['uid'] }}, '{{ $ip }}', '{{ $puerto }}',)" class="btn btn-primary eliminarUse"><i class="fa fa-trash"></i></button></td>
						</tr>

						@endforeach
	
        </tbody>
      </table>
      <div class="row">  
      <div class="col-lg-12 text-center">
          {{ $users->links() }}
      </div>
      </div>
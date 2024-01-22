<table class="table__kirito table-bordered" style="width:99%" id="table" name="table">
      <thead>
      <tr>
        <th>UID</th>
        <th>Id</th>
        <th>State</th>
        <th>timestamp</th>
        <th>type</th>
      </tr>
      </thead>
      <tbody>
        @foreach($attendances as $attendance)
          <tr>
            <td><?php echo $attendance['uid']; ?></td>
            <td><?php echo $attendance['id']; ?></td>
            <td><?php echo $attendance['state']; ?></td>
            <td><?php echo $attendance['timestamp']; ?></td>
            <td><?php echo $attendance['type']; ?></td>
          </tr>
        @endforeach
      </tbody>
</table>
<div class="row">  
<div class="col-lg-12 text-center">
    {{ $attendances->links() }}
</div>
</div>
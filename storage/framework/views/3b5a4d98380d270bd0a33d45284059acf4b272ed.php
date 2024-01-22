<?php
//require __DIR__ . '/vendor/autoload.php';

use \ZKLib\ZKLib;
use \ZKLib\User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZK Test</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">
<?php
	$zk = new ZKLib('10.10.165.88', 4370);

	$ret = $zk->connect();
	if ( $ret ):
		$zk->disable();

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
		<h1>PHP ZK Library</h1>
		<div class="row">
		<table class="table table-bordered table-hover">
			<tr>
				<td><b>Status</b></td>
				<td>Connected</td>
				<td><b>Version</b></td>
				<td><?php echo $zk->getVersion() ?></td>
				<td><b>OS Version</b></td>
				<td><?php echo $zk->getOs() ?></td>
				<td><b>Platform</b></td>
				<td><?php echo $zk->getPlatform() ?></td>
			</tr>
			<tr>
				<td><b>Firmware Version</b></td>
				<td><?php echo $zk->getPlatformVersion() ?></td>
				<td><b>WorkCode</b></td>
				<td><?php echo $zk->getWorkCode() ?></td>
				<td><b>SSR</b></td>
				<td><?php echo $zk->getSsr() ?></td>
				<td><b>Pin Width</b></td>
				<td><?php echo $zk->getPinWidth() ?></td>
			</tr>
			<tr>
				<td><b>Face Function On</b></td>
				<td><?php echo $zk->getFaceOn() ?></td>
				<td><b>Serial Number</b></td>
				<td><?php echo $zk->getSerialNumber() ?></td>
				<td><b>Device Name</b></td>
				<td><?php echo $zk->getDeviceName(); ?></td>
				<td><b>Get Time</b></td>
				<td><?php echo $zk->getTime()->format('r') ?></td>
			</tr>
		</table>
		</div>
		<div class="row">
		<div class="col col-md-6">
		<table class="table table-bordered table-hover">
			<tr>
				<th colspan="5">Data User</th>
			</tr>
			<tr>
				<th>UID</th>
				<th>ID</th>
				<th>Name</th>
				<th>Role</th>
				<th>Password</th>
				<th>Group</th>
				<th>TimeZone</th>
				<th>Card number</th>
			</tr>
			<?php
			try {
		// $zk->clearUsers();
		// $zk->setUser(new User(1, User::PRIVILEGE_SUPERADMIN, '1', 'Admin', '', '', -3, 1));
		foreach($zk->getUser() as $user):
			$role = 'Unknown';
			switch ($user->getRole()){
			case User::PRIVILEGE_COMMON_USER : $role = 'USER'; break;
			case User::PRIVILEGE_ENROLLER    : $role = 'ENROLLER'; break;
			case User::PRIVILEGE_MANAGER     : $role = 'MANAGER'; break;
			case User::PRIVILEGE_SUPERADMIN  : $role = 'ADMIN'; break;
			}
				?>
				<tr>
					<td><?php echo $user->getRecordId(); ?></td>
					<td><?php echo $user->getUserId(); ?></td>
					<td><?php echo $user->getName(); ?></td>
					<td><?php echo $role; ?></td>
					<td><?php echo $user->getPassword(); ?></td>
					<td><?php echo $user->getGroupId(); ?></td>
					<td><?php echo $user->getTimeZone(); ?></td>
					<td><?php echo $user->getCardNo(); ?></td>
				</tr>
				<?php
				endforeach;
			} catch (Exception $e) {
				header("HTTP/1.0 404 Not Found");
				header('HTTP', true, 500); // 500 internal server error
			}
			// $zk->clearAdmins();
			?>
		</table>
		</div>

		<div class="col col-md-6">
		<table class="table table-bordered table-hover">
			<tr>
				<th colspan="6">Data Attendance</th>
			</tr>
			<tr>
				<th>UID</th>
				<th>In / Out</th>
				<th>Validated By</th>
				<th>Status</th>
				<th>DateTime</th>
			</tr>
			<?php
		
			?>
		</table>
		</div>

	<?php
		$zk->enable();
		$zk->disconnect();
	endif
?>
	</div>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/indexi.blade.php ENDPATH**/ ?>
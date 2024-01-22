<?php

return [

  /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

  'default' => env('FILESYSTEM_DRIVER', 'local'),

  /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

  'cloud' => env('FILESYSTEM_CLOUD', 's3'),

  /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

  'disks' => [

    'local' => [
      'driver' => 'local',
      //'root' => storage_path('app'),
      'root' => public_path() . '/archivos',
    ],
    'local1' => [
      'driver' => 'local',
      //'root' => storage_path('app'),
      'root' => public_path() . '/pedidodocumento',
    ],
    'local2' => [
      'driver' => 'local',
      //'root' => storage_path('app'),
      'root' => public_path() . '/cotizaciones',
    ],
    'local3' => [
      'driver' => 'local',
      'root' => public_path() . '/cotpedido',
    ],
    'local4' => [
      'driver' => 'local',
      'root' => public_path() . '/facpedido',
    ],
    'local5' => [
      'driver' => 'local',
      'root' => public_path() . '/back_reports',
    ],
    'local6' => [
      'driver' => 'local',
      'root' => public_path() . '/back_reports/rrhh_planillabecas/excel',
    ],
    'public' => [
      'driver' => 'local',
      'root' => storage_path('app/public'),
      'url' => env('APP_URL') . '/storage',
      'visibility' => 'public',
    ],
    'valhalla' => [
      'driver' => 'local',
      //'root' => storage_path('app'),
      'root' => public_path() . '/valhallas',
    ],
    'heimdall' => [
      'driver' => 'local',
      //'root' => storage_path('app'),
      'root' => public_path() . '/assets/heimdall',
    ],
    'convocaarchivos' => [
      'driver' => 'local',
      //'root' => storage_path('app'),
      'root' => public_path() . '/convocatoriarch',
    ],
    'gesambs' => [
      'driver' => 'local',
      //'root' => storage_path('app'),
      'root' => public_path() . '/convocaarchivos',
    ],
    'archiperiodico'=>[
      'driver' => 'local',
      //'root' => storage_path('app'),
      'root' => public_path() . '/archiperiodico',
    ],
    'stormbreakers_files'=>[
      'driver' => 'local',
      //'root' => storage_path('app'),
      'root' => public_path() . '/stormbreakers_files',
    ],
    's3' => [
      'driver' => 's3',
      'key' => env('AWS_ACCESS_KEY_ID'),
      'secret' => env('AWS_SECRET_ACCESS_KEY'),
      'region' => env('AWS_DEFAULT_REGION'),
      'bucket' => env('AWS_BUCKET'),
      'url' => env('AWS_URL'),
    ],

    'ftp' => [
      'driver' => 'ftp',
      'host' => env('FTP_HOST'),
      'username' => env('FTP_USERNAME'),
      'password' => env('FTP_PASSWORD'),
      'passive'  => true,
      'port' => 20,
      'root' => '/gesamb'
    ],

    'kardex' => [
      'driver' => 'ftp',
      'host' => env('FTP_HOST'),
      'username' => env('FTP_USERNAME'),
      'password' => env('FTP_PASSWORD'),
      'passive'  => true,
      'port' => 20,
      'root' => '/kardex'
    ],
    'convocatoriasftp' => [
      'driver' => 'ftp',
      'host' => env('FTP_HOST'),
      'username' => env('FTP_USERNAME'),
      'password' => env('FTP_PASSWORD'),
      'passive'  => true,
      'port' => 20,
      'root' => '/convocatorias'
    ],
    'presentacionesftp' => [
      'driver' => 'ftp',
      'host' => env('FTP_HOST'),
      'username' => env('FTP_USERNAME'),
      'password' => env('FTP_PASSWORD'),
      'passive'  => true,
      'port' => 20,
      'root' => '/presentaciones'
    ],
    'reportesftp' => [
      'driver' => 'ftp',
      'host' => env('FTP_HOST'),
      'username' => env('FTP_USERNAME'),
      'password' => env('FTP_PASSWORD'),
      'passive'  => true,
      'port' => 20,
      'root' => '/reportes'
    ],
    'archivoperiodicoftp' => [
      'driver' => 'ftp',
      'host' => env('FTP_HOST'),
      'username' => env('FTP_USERNAME'),
      'password' => env('FTP_PASSWORD'),
      'passive'  => true,
      'port' => 20,
      'root' => '/archiperiodico'
    ],
  ],
  /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

  'links' => [
    public_path('storage') => storage_path('app/public'),
  ],

];

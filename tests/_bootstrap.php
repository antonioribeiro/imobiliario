<?php

$unitTesting = true;
$testEnvironment = 'testing';

include __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/start.php';
$app->boot();

\Codeception\Util\Autoload::registerSuffix('Page', __DIR__.DIRECTORY_SEPARATOR.'_pages');
\Codeception\Util\Autoload::registerSuffix('Steps', __DIR__.DIRECTORY_SEPARATOR.'_steps');

$protectedTables = ['activations',
                    'firewall',
                    'groups',
                    'groups_users',
                    'migrations',
                    'reminders',
                    'throttle',
                    'tracker_agents',
                    'tracker_connections',
                    'tracker_cookies',
                    'tracker_devices',
                    'tracker_domains',
                    'tracker_errors',
                    'tracker_events',
                    'tracker_events_log',
                    'tracker_geoip',
                    'tracker_log',
                    'tracker_paths',
                    'tracker_queries',
                    'tracker_query_arguments',
                    'tracker_referers',
                    'tracker_route_path_parameters',
                    'tracker_route_paths',
                    'tracker_routes',
                    'tracker_sessions',
                    'tracker_sql_queries',
                    'tracker_sql_queries_log',
                    'tracker_sql_query_bindings',
                    'tracker_sql_query_bindings_parameters',
                    'tracker_system_classes',
                    'users'];

$protectedTables = ['migrations'];

// Confirm that we are running the tests against a testing database
$database = Config::get('database.connections.main.database');

//if ( ! ends_with($database, '_testing')) {
//	throw new Exception('The database you are trying to run test against is not a testing database.');
//}

//// Delete all the tables from our testing database
//$tables = DB::table('information_schema.tables')->where('table_schema', $database)->get();
//
//foreach ($tables as $table)
//{
//	if ( ! in_array($table, $protectedTables))
//	{
//			//		Schema::drop($table->TABLE_NAME);
//		DB::table($table)->truncate();
//	}
//}
//
//// Run our migrations and seed our fresh tables
////Artisan::call('migrate');
//Artisan::call('db:seed');

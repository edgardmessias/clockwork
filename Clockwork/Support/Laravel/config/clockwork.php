<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Enable Clockwork
	|--------------------------------------------------------------------------
	|
	| You can explicitly enable or disable Clockwork here. When enabled, special
	| headers for communication with the Clockwork Chrome extension will be
	| included in your application responses and requests data will be available
	| at /__clockwork url.
	| When set to null, Clockwork behavior is controlled by app.debug setting.
	| Default: null
	|
	*/

	'enable' => env('CLOCKWORK_ENABLE', null),

	/*
	|--------------------------------------------------------------------------
	| Features
	|--------------------------------------------------------------------------
	|
	| You can enable or disable various Clockwork features here. Some features
	| accept additional configuration (eg. slow query threshold for database).
	|
	*/

	'features' => [

		// Cache usage stats and cache queries including results
		'cache' => [
			'enabled' => env('CLOCKWORK_CACHE_ENABLED', true),

			// Collect cache queries including results (high performance impact with a high number of queries)
			'collect_queries' => env('CLOCKWORK_CACHE_QUERIES', false)
		],

		// Database usage stats and queries
		'database' => [
			'enabled' => env('CLOCKWORK_DATABASE_ENABLED', true),

			// Collect database queries (high performance impact with a very high number of queries)
			'collect_queries' => env('CLOCKWORK_DATABASE_COLLECT_QUERIES', true),

			// Collect details of models updates (high performance impact with a lot of model updates)
			'collect_models_actions' => env('CLOCKWORK_DATABASE_COLLECT_MODELS_ACTIONS', true),

			// Collect details of retrieved models (very high performance impact with a lot of models retrieved)
			'collect_models_retrieved' => env('CLOCKWORK_DATABASE_COLLECT_MODELS_RETRIEVED', false),

			// Query execution time threshold in miliseconds after which the query will be marked as slow
			'slow_threshold' => env('CLOCKWORK_DATABASE_SLOW_THRESHOLD'),

			// Collect only slow database queries
			'slow_only' => env('CLOCKWORK_DATABASE_SLOW_ONLY', false),

			// Detect and report duplicate (N+1) queries
			'detect_duplicate_queries' => env('CLOCKWORK_DATABASE_DETECT_DUPLICATE_QUERIES', false)
		],

		// Dispatched events
		'events' => [
			'enabled' => env('CLOCKWORK_EVENTS_ENABLED', true),

			// Ignored events (framework events are ignored by default)
			'ignored_events' => [
				// App\Events\UserRegistered::class,
				// 'user.registered'
			],
		],

		// Laravel log (you can still log directly to Clockwork with laravel log disabled)
		'log' => [
			'enabled' => env('CLOCKWORK_LOG_ENABLED', true)
		],

		// Sent notifications
		'notifications' => [
			'enabled' => env('CLOCKWORK_NOTIFICATIONS_ENABLED', true),
		],

		// Performance metrics
		'performance' => [
			// Allow collecting of client metrics. Requires separate clockwork-browser npm package.
			'client_metrics' => env('CLOCKWORK_PERFORMANCE_CLIENT_METRICS', true)
		],

		// Dispatched queue jobs
		'queue' => [
			'enabled' => env('CLOCKWORK_QUEUE_ENABLED', true)
		],

		// Redis commands
		'redis' => [
			'enabled' => env('CLOCKWORK_REDIS_ENABLED', true)
		],

		// Routes list
		'routes' => [
			'enabled' => env('CLOCKWORK_ROUTES_ENABLED', false)
		],

		// Rendered views
		'views' => [
			'enabled' => env('CLOCKWORK_VIEWS_ENABLED', true),

			// Collect views including view data (high performance impact with a high number of views)
			'collect_data' => env('CLOCKWORK_VIEWS_COLLECT_DATA', false),

			// Use Twig profiler instead of Laravel events for apps using laravel-twigbridge (more precise, but does
			// not support collecting view data)
			'use_twig_profiler' => env('CLOCKWORK_VIEWS_USE_TWIG_PROFILER', false)
		]

	],

	/*
	|--------------------------------------------------------------------------
	| Enable web UI
	|--------------------------------------------------------------------------
	|
	| Enable or disable the Clockwork web UI available at  http://your.app/__clockwork.
	| Default: true
	|
	*/

	'web' => env('CLOCKWORK_WEB', true),

	/*
	|--------------------------------------------------------------------------
	| Enable toolbar
	|--------------------------------------------------------------------------
	|
	| Enable or disable the Clockwork toolbar. Requires a separate clockwork-browser npm package.
	| Default: false
	|
	*/

	'toolbar' => env('CLOCKWORK_TOOLBAR', false),

	/*
	|--------------------------------------------------------------------------
	| HTTP requests collection
	|--------------------------------------------------------------------------
	|
	| You can enable or disable and configure collection of received HTTP
	| requests here.
	|
	*/

	'requests' => [
		// With on-demand mode enabled, Clockwork will only profile requests when the browser extension is open or you
		// manually pass a "clockwork-profile" cookie or get/post data key.
		// Optionally you can specify a "secret" that has to be passed as the value to enable profiling.
		'on_demand' => env('CLOCKWORK_REQUESTS_ON_DEMAND', false),

		// Collect only errors (requests with HTTP 4xx and 5xx responses)
		'errors_only' => env('CLOCKWORK_REQUESTS_ERRORS_ONLY', false),

		// Response time threshold in miliseconds after which the request will be marked as slow
		'slow_threshold' => env('CLOCKWORK_REQUESTS_SLOW_THRESHOLD'),

		// Collect only slow requests
		'slow_only' => env('CLOCKWORK_REQUESTS_SLOW_ONLY', false),

		// Sample the collected requests (eg. set to 100 to collect only 1 in 100 requests)
		'sample' => env('CLOCKWORK_REQUESTS_SAMPLE', false),

		// List of URIs that should not be collected
		'except' => [
			'/horizon/.*', // Laravel Horizon requests
			'/telescope/.*', // Laravel Telescope requests
		],

		// List of URIs that should be collected, any other URI will not be collected if not empty
		'only' => [
			// '/api/.*'
		],

		// Don't collect OPTIONS requests, mostly used in the CSRF pre-flight requests and are rarely of interest
		'except_preflight' => env('CLOCKWORK_REQUESTS_EXCEPT_PREFLIGHT', true)
	],

	/*
	|--------------------------------------------------------------------------
	| Artisan commands collection
	|--------------------------------------------------------------------------
	|
	| You can enable or disable and configure collection of executed Artisan
	| commands here.
	|
	*/

	'artisan' => [
		// Enable or disable collection of executed Artisan commands
		'collect' => env('CLOCKWORK_ARTISAN_COLLECT', false),

		// List of commands that should not be collected (built-in commands are not collected by default)
		'except' => [
			// 'inspire'
		],

		// List of commands that should be collected, any other command will not be collected if not empty
		'only' => [
			// 'inspire'
		],

		// Enable or disable collection of command output
		'collect_output' => env('CLOCKWORK_ARTISAN_COLLECT_OUTPUT', false),

		// Enable or disable collection of built-in Laravel commands
		'except_laravel_commands' => env('CLOCKWORK_ARTISAN_EXCEPT_LARAVEL_COMMANDS', true)
	],

	/*
	|--------------------------------------------------------------------------
	| Queue jobs collection
	|--------------------------------------------------------------------------
	|
	| You can enable or disable and configure collection of executed queue jobs
	| here.
	|
	*/

	'queue' => [
		// Enable or disable collection of executed queue jobs
		'collect' => env('CLOCKWORK_QUEUE_COLLECT', false),

		// List of queue jobs that should not be collected
		'except' => [
			// App\Jobs\ExpensiveJob::class
		],

		// List of queue jobs that should be collected, any other queue job will not be collected if not empty
		'only' => [
			// App\Jobs\BuggyJob::class
		]
	],

	/*
	|--------------------------------------------------------------------------
	| Tests collection
	|--------------------------------------------------------------------------
	|
	| You can enable or disable and configure collection of ran tests here.
	|
	*/

	'tests' => [
		// Enable or disable collection of ran tests
		'collect' => env('CLOCKWORK_TESTS_COLLECT', false),

		// List of tests that should not be collected
		'except' => [
			// Tests\Unit\ExampleTest::class
		]
	],

	/*
	|--------------------------------------------------------------------------
	| Enable data collection, when Clockwork is disabled
	|--------------------------------------------------------------------------
	|
	| This setting controls, whether data about application requests will be
	| recorded even when Clockwork is disabled (useful for later analysis).
	| Default: false
	|
	*/

	'collect_data_always' => env('CLOCKWORK_COLLECT_DATA_ALWAYS', false),

	/*
	|--------------------------------------------------------------------------
	| Metadata storage
	|--------------------------------------------------------------------------
	|
	| You can configure how are the metadata collected by Clockwork stored.
	| Valid options are: files or sql.
	| Files storage stores the metadata in one-per-request files in a specified
	| directory.
	| Sql storage stores the metadata as rows in a sql database. You can specify
	| the database by name if defined in database.php or by path to Sqlite
	| database. Database table will be automatically created.
	| Sql storage requires PDO.
	|
	*/

	'storage' => env('CLOCKWORK_STORAGE', 'files'),

	'storage_files_path' => env('CLOCKWORK_STORAGE_FILES_PATH', storage_path('clockwork')),

	// Compress the metadata files using gzip, trading a little bit of performance for lower disk usage
	'storage_files_compress' => env('CLOCKWORK_STORAGE_FILES_COMPRESS', false),

	'storage_sql_database' => env('CLOCKWORK_STORAGE_SQL_DATABASE', storage_path('clockwork.sqlite')),
	'storage_sql_table'    => env('CLOCKWORK_STORAGE_SQL_TABLE', 'clockwork'),

	/*
	|--------------------------------------------------------------------------
	| Metadata expiration
	|--------------------------------------------------------------------------
	|
	| Maximum lifetime of the metadata in minutes, metadata for older requests
	| will automatically be deleted when storing new requests.
	| When set to false, metadata will never be deleted.
	| Default: 1 week
	|
	*/

	'storage_expiration' => env('CLOCKWORK_STORAGE_EXPIRATION', 60 * 24 * 7),

	/*
	|--------------------------------------------------------------------------
	| Authentication
	|--------------------------------------------------------------------------
	|
	| Clockwork can be configured to require authentication before allowing
	/ access to the collected data. This is recommended when the application
	/ is publicly accessible, as the metadata might contain sensitive information.
	/ Setting to "true" enables authentication with a single password set below,
	/ "false" disables authentication.
	/ You can also pass a class name of a custom authentication implementation.
	/ Default: false
	|
	*/

	'authentication' => env('CLOCKWORK_AUTHENTICATION', false),

	'authentication_password' => env('CLOCKWORK_AUTHENTICATION_PASSWORD', 'VerySecretPassword'),

	/*
	|--------------------------------------------------------------------------
	| Enable collecting of stack traces
	|--------------------------------------------------------------------------
	|
	| This setting controls, whether log messages and certain data sources, like
	| the database or cache data sources, should collect stack traces.
	| You might want to disable this if you are collecting 100s of queries or
	| log messages, as the stack traces can considerably increase the metadata size.
	| You can force collecting of stack trace for a single log call by passing
	| [ 'trace' => true ] as $context.
	| Default: true
	|
	*/

	'stack_traces' => [
		// Enable or disable collecting of stack traces
		'enabled' => env('CLOCKWORK_STACK_TRACES_ENABLED', true),

		// List of vendor names to skip when determining caller, common vendor are automatically added
		'skip_vendors' => [
			// 'phpunit'
		],

		// List of namespaces to skip when determining caller
		'skip_namespaces' => [
			// 'Laravel'
		],

		// List of class names to skip when determining caller
		'skip_classes' => [
			// App\CustomLog::class
		],

		// Limit of frames to be collected
		'limit' => env('CLOCKWORK_STACK_TRACES_LIMIT', 10)
	],

	/*
	|--------------------------------------------------------------------------
	| Serialization
	|--------------------------------------------------------------------------
	|
	| Configure how Clockwork serializes the collected data.
	| Depth limits how many levels of multi-level arrays and objects have
	| extended serialization (rest uses simple serialization).
	| Blackbox allows you to specify classes which contents should be never
	| serialized (eg. a service container class).
	| Lowering depth limit and adding classes to blackbox lowers the memory
	| usage and processing time.
	|
	*/

	'serialization_depth' => env('CLOCKWORK_SERIALIZATION_DEPTH', 10),

	'serialization_blackbox' => [
		\Illuminate\Container\Container::class,
		\Illuminate\Foundation\Application::class,
		\Laravel\Lumen\Application::class
	],

	/*
	|--------------------------------------------------------------------------
	| Register helpers
	|--------------------------------------------------------------------------
	|
	| This setting controls whether the "clock" helper function will be registered. You can use the "clock" function to
	| quickly log something to Clockwork or access the Clockwork instance.
	|
	*/

	'register_helpers' => env('CLOCKWORK_REGISTER_HELPERS', true),

	/*
	|--------------------------------------------------------------------------
	| Send Headers for AJAX request
	|--------------------------------------------------------------------------
	|
	| When trying to collect data the AJAX method can sometimes fail if it is
	| missing required headers. For example, an API might require a version
	| number using Accept headers to route the HTTP request to the correct
	| codebase.
	|
	*/

	'headers' => [
		// 'Accept' => 'application/vnd.com.whatever.v1+json',
	],

	/*
	|--------------------------------------------------------------------------
	| Server-Timing
	|--------------------------------------------------------------------------
	|
	| Clockwork supports the W3C Server Timing specification, which allows for
	/ collecting a simple performance metrics in a cross-browser way. Eg. in
	/ Chrome, your app, database and timeline event timings will be shown
	/ in the Dev Tools network tab.
	/ This setting specifies the max number of timeline events that will be sent.
	| When set to false, Server-Timing headers will not be set.
	| Default: 10
	|
	*/

	'server_timing' => env('CLOCKWORK_SERVER_TIMING', 10)

];

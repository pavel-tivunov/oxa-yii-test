<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return CMap::mergeArray(
        array(
            'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
            'name'=>'My Console Application',

            // preloading 'log' component
            'preload'=>array('log'),

            // application components
            'components'=>array(
//                'db'=>array(
//                    'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//                ),
                // uncomment the following to use a MySQL database
                'db'=>array(
                    'connectionString' => 'mysql:host=localhost;dbname=testdrive',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => '',
                    'charset' => 'utf8',
                ),
                'log'=>array(
                    'class'=>'CLogRouter',
                    'routes'=>array(
                        array(
                            'class'=>'CFileLogRoute',
                            'levels'=>'error, warning',
                        ),
                    ),
                ),
            ),
            'commandMap' => array(
                'migrate' => array(
                    'class'=>'system.cli.commands.MigrateCommand',
                    'migrationPath' => 'application.migrations',
                    'migrationTable' => 'migration',
                    'connectionID'=>'db',
                ),
            ),
        ),
        include(dirname(__FILE__).'/local_config.php')
);
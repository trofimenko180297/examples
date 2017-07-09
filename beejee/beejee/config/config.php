<?php

Config::set('site_name', 'Task-application');
Config::set('languages', array('en', 'ru', 'ua'));

Config::set('routes', array(
    'default' => '',
    'admin' => 'admin_',
));

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'tasks');
Config::set('default_action', 'page');
Config::set('pagination_number', 3);

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'beejee');

?>
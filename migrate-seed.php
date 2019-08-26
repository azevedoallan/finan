<?php


exec(__DIR__ . '/vendor/bin/phinx rollback');
exec(__DIR__ . '/vendor/bin/phinx migrate');
//exec(__DIR__ . '/vendor/bin/phinx seed:run');
exec(__DIR__ . '/vendor/bin/phinx seed:run -s UsersSeeder');
exec(__DIR__ . '/vendor/bin/phinx seed:run -s CategoryCostsSeeder');
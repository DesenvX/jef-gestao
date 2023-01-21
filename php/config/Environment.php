<?php

$parsed = parse_ini_file('../../evironment.ini', true);

$_ENV['ENVIRONMENT'] = $parsed['ENVIRONMENT'];

foreach ($parsed[$parsed['ENVIRONMENT']] as $key => $value) {
    $_ENV[$key] = $value;
}

echo $_ENV['PASSWORD'];
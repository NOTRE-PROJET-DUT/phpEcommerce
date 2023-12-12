<?php

// Change directory to user views and start PHP server on localhost:8000 in the background
$userCommand = 'cd src/Views/user; php -S localhost:8000 > index.log 2>&1 &';
shell_exec($userCommand);

// Change directory to admin views and start PHP server on localhost:8001 in the background
$adminCommand = 'cd src/Views/admin; php -S localhost:8001 > index.log 2>&1 &';
shell_exec($adminCommand);

// Change directory to admin views and start PHP server on localhost:8001 in the background
$adminCommand = 'cd storage/; php -S localhost:8005 > index.log 2>&1 &';
shell_exec($adminCommand);

?>


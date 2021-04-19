<?php 
session_start();

require 'vendor/autoload.php';
require 'src/function.php';

\Application\Application::process();
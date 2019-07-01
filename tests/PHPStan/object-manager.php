<?php

require \dirname(__DIR__) . '/../vendor/autoload.php';
$kernel = new AppKernel('dev', true);
$kernel->boot();

return $kernel->getContainer()->get('doctrine')->getManager();

<?php
require __DIR__ . '/../../vendor/autoload.php';
try {
 
    $repository = Dotenv\Repository\RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(Dotenv\Repository\Adapter\EnvConstAdapter::class)
    ->addWriter(Dotenv\Repository\Adapter\PutenvAdapter::class)
    ->immutable()
    ->make();
    
    $dotenv = Dotenv\Dotenv::create($repository, __DIR__ . '/../../');
    $dotenv->load();
} catch (Exception $e) {
	echo "cannot load env file";
}
?>
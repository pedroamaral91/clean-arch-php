<?php

use Clean\Api\Infra\Db\Repositories\CustomerRepository;
use Clean\Api\main\Container\DependencyProvider;
use Psr\Container\ContainerInterface;

$container = DependencyProvider::getInstance();

$container->set('EntityManager', function() {
    return \Clean\Api\Infra\Db\Doctrine\GlobalConnection::getEntityManager();
});

$container->set('CustomerRepository', function(ContainerInterface $ci) {
    $entityManager = $ci->get('EntityManager');
    return new CustomerRepository($entityManager);
});

$container->set('DbLogin', function (ContainerInterface $ci) {
    $customerRepository = $ci->get('CustomerRepository');
    $hashComparer = new \Clean\Api\Infra\Encrypt\Hash();
    return new \Clean\Api\App\Usecases\DbLogin($customerRepository, $hashComparer);
});

$container->set('AuthController', function (ContainerInterface $container) {
    $emailValidator = new \Clean\Api\Presentation\Validation\Validators\RequiredField('email');
    $passwordValidator = new \Clean\Api\Presentation\Validation\Validators\RequiredField('password');
    $validator = new \Clean\Api\Presentation\Validation\Validators\ValidatorComposite([$emailValidator, $passwordValidator]);
    $dbLogin = $container->get('DbLogin');
    return new \Clean\Api\Presentation\Controllers\AuthController($dbLogin, $validator);
});

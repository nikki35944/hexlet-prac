<?php

// Подключение автозагрузки через composer
require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use DI\Container;
use Illuminate\Support\Collection;

$faker = \Faker\Factory::create();
$faker->seed(1234);

$domains = [];
for ($i = 0; $i < 10; $i++) {
    $domains[] = $faker->domainName;
}
$phones = [];
for ($i = 0; $i < 10; $i++) {
    $phones[] = $faker->phoneNumber;
}

$container = new Container();
$container->set('renderer', function () {
    // Параметром передается базовая директория, в которой будут храниться шаблоны
    return new \Slim\Views\PhpRenderer(__DIR__ . '/templates');
});
$app = AppFactory::createFromContainer($container);
$app->addErrorMiddleware(true, true, true);


$app->get('/', function ($request, $response) {
    $response->getBody()->write('Welcome to Slim!');
    return $response;
    // Благодаря пакету slim/http этот же код можно записать короче
    // return $response->write('Welcome to Slim!');
});

$app->get('/phones', function ($request, $response) use ($phones) {
    return $response->write(json_encode($phones));
});
$app->get('/domains', function ($request, $response) use ($domains) {
    return $response->write(json_encode($domains));
});


$companies = \App\Generator::generate(100);

$app->get('/companies', function ($request, $response) use ($companies) {
    $page = $request->getQueryParam('page', 1);
    $per = $request->getQueryParam('per', 5);

    $offset = $per * ($page - 1);
    $result = array_slice($companies, $offset, $per);

    return $response->write(json_encode($result));
});




$app->get('/companies/{id}', function ($request, $response, $args) use ($companies) {
    $collection = collect($companies);
    $result = $collection->firstWhere('id', '=', $args['id']);
    if ( $result === null ){
        return $response->withStatus(404)->write('Page not found');
    }
    return $response->write(json_encode($result));
});


// Список пользователей
// Каждый пользователь – ассоциативный массив
// следующей структуры: id, firstName, lastName, email
$users = \App\UsersGenerator::generate(100);

$app->get('/users', function ($request, $response) use ($users) {
    $params = [
        'users' => $users,
    ];

    return $this->get('renderer')->render($response, 'users/index.phtml', $params);
});

$app->get('/users/{id}', function ($request, $response, $args) use ($users) {
    $id = (int) $args['id'];
    $user = collect($users)->firstWhere('id', $id);
    $params = [
        'user' => $user
    ];

    return $this->get('renderer')->render($response, 'users/show.phtml', $params);
});


$app->run();
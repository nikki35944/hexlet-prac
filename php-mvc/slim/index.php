<?php

// Подключение автозагрузки через composer
require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;

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

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function ($request, $response) {
    $response->getBody()->write('Welcome to Slim!');
    return $response;
    // Благодаря пакету slim/http этот же код можно записать короче
    // return $response->write('Welcome to Slim!');
});

$app->get('/users', function ($request, $response) {
    return $response->write('GET /users');
});

$app->get('/phones', function ($request, $response) use ($phones) {
    return $response->write(json_encode($phones));
});
$app->get('/domains', function ($request, $response) use ($domains) {
    return $response->write(json_encode($domains));
});

$app->post('/users', function ($request, $response) {
    return $response->withStatus(302);
});


$companies = \App\Generator::generate(100);


$app->get('/companies', function ($request, $response) use ($companies) {
    $page = $request->getQueryParam('page', 1);
    $per = $request->getQueryParam('per', 5);

    $offset = $per * ($page - 1);
    $result = array_slice($companies, $offset, $per);

    return $response->write(json_encode($result));
});

use Illuminate\Support\Collection;

$app->get('/companies/{id}', function ($request, $response, $args) use ($companies) {
    $collection = collect($companies);
    $result = $collection->firstWhere('id', '=', $args['id']);
    if ( $result === null ){
        return $response->withStatus(404)->write('Page not found');
    }
    return $response->write(json_encode($result));
});

$app->run();
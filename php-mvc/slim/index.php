<?php

// Подключение автозагрузки через composer
require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use DI\Container;
use Illuminate\Support\Collection;

use function Symfony\Component\String\s;

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
$container->set('flash', function () {
    return new \Slim\Flash\Messages();
});
AppFactory::setContainer($container);
$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);


$app->get('/', function ($request, $response) {
    /*$this->get('flash')->addMessage('success', 'This is a message');

    return $this->get('renderer')->render($response, '/index.phtml');*/

    $messages = $this->get('flash')->getMessages();

    $params = ['flash' => $messages];
    return $this->get('renderer')->render($response, 'index.phtml', $params);
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

/*
 * templates
$app->get('/users', function ($request, $response) use ($users) {
    $params = [
        'users' => $users,
    ];

    return $this->get('renderer')->render($response, 'users/index.phtml', $params);
});*/

$app->get('/users/{id}', function ($request, $response, $args) use ($users) {
    $id = (int) $args['id'];
    $user = collect($users)->firstWhere('id', $id);
    $params = [
        'user' => $user
    ];

    return $this->get('renderer')->render($response, 'users/show.phtml', $params);
});

$app->get('/users', function ($request, $response) use ($users) {

    $term = $request->getQueryParam('term');
    $filteredUsers = collect($users)->filter(
        fn($user) => empty($term) ? true : s($user['firstName'])->ignoreCase()->startsWith($term)
    );

    $params = [
        'users' => $filteredUsers,
        'term' => $term
    ];

    return $this->get('renderer')->render($response, 'users/index.phtml', $params);
});


$repo = new App\CourseRepository();

$app->post('/courses', function ($request, $response) use ($repo) {
    /*post-form
     * $course = $request->getParsedBodyParam('course');

    $validator = new \App\Validator();
    $errors = $validator->validate($course);

    if (count($errors) === 0) {
        $repo->save($course);
        return $response->withRedirect('/courses');
    }

    $params = [
        'course' => $course,
        'errors' => $errors
    ];

    return $this->get('renderer')
        ->render($response->withStatus(422), 'courses/new.phtml', $params);*/
    $this->get('flash')->addMessage('success', 'Course Added');

    return $response->withRedirect('/');
});


$app->get('/courses/new', function ($request, $response) use ($repo) {
    $params = [
        'course' => ['paid' => '', 'title' => ''],
        'errors' => []
    ];
    return $this->get('renderer')->render($response, "courses/new.phtml", $params);
});


$repo = new \App\PostRepository();
$router = $app->getRouteCollector()->getRouteParser();


$app->get('/posts', function ($request, $response) use ($repo) {
    $flash = $this->get('flash')->getMessages();

    $params = [
        'flash' => $flash,
        'posts' => $repo->all()
    ];
    return $this->get('renderer')->render($response, 'posts/index.phtml', $params);
})->setName('posts');

$app->post('/posts', function ($request, $response) use ($repo, $router) {
    $postData = $request->getParsedBodyParam('post');

    $validator = new \App\PostValidator();
    $errors = $validator->validate($postData);

    if (count($errors) === 0) {
        $repo->save($postData);
        $this->get('flash')->addMessage('success', 'Post has been created');
        return $response->withRedirect($router->urlFor('posts'));
    }

    $params = [
        'postData' => $postData,
        'errors' => $errors
    ];
    $response = $response->withStatus(422);
    return $this->get('renderer')->render($response, 'posts/new.phtml', $params);
});

$app->get('/posts/new', function ($request, $response) use ($repo) {

    $params = [
        'post' => [],
        'errors' => []
    ];
    return $this->get('renderer')->render($response, 'posts/new.phtml', $params);
});

$app->run();
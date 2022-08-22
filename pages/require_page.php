<?

$url = '/' . $_GET["path"];

$explode = explode('/', $url);

$id = (int) $_GET['id'];

$pages = [
    [
        "url" => "/",
        "path" => "index.php"
    ],
    [
        "url" => "/login",
        "path" => "authorization/login.php"
    ],
    [
        "url" => "/registration",
        "path" => "authorization/registration.php"
    ],
    [
        "url" => "/support",
        "path" => "support.php"
    ],
    [
        "url" => "/cargo",
        "path" => "cargo/cargo.php"
    ],
    [
        "url" => "/cargo_create",
        "path" => "cargo/cargo_create.php"
    ],
    [
        "url" => "/transport",
        "path" => "transport/transport.php"
    ],
    [
        "url" => "/transport_create",
        "path" => "transport/transport_create.php"
    ],
    [
        "url" => "/users",
        "path" => "users.php"
    ],
    [
        "url" => "/profile",
        "path" => "account/profile.php"
    ],
    [
        "url" => "/my_application",
        "path" => "account/my_application.php"
    ],
    [
        "url" => "/application_edit",
        "path" => "account/application_edit.php"
    ],
    [
        "url" => "/php",
        "path" => "php.php"
    ]
];

$router = new Router();

foreach ($pages as $page) {
    $router->add($page["url"], $page["path"]);
}

$router->get($url);

?>
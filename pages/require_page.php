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
        "url" => "/logout",
        "path" => "authorization/logout.php"
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
        "url" => "/add-cargo",
        "path" => "cargo/add-cargo.php"
    ],
    [
        "url" => "/transport",
        "path" => "transport/transport.php"
    ],
    [
        "url" => "/add-transport",
        "path" => "transport/add-transport.php"
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
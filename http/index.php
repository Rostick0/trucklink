<?

header("Content-type: application/json; charset=utf-8");

$url = '/' . $_GET["http"];

$explode = explode('/', $url);

$url = '/' . $explode[1];
$id = $explode[2];

$pages = [
    [
        "url" => "/city",
        "path" => "city.php"  
    ],
    [
        "url" => "/cargo",
        "path" => "cargo.php"
    ],
    [
        "url" => "/cargo_full",
        "path" => "cargo_full.php"
    ],
    [
        "url" => "/transport",
        "path" => "transport.php"
    ],
    [
        "url" => "/count",
        "path" => "count.php"
    ]
];

$router = new Router();

foreach ($pages as $page) {
    $router->add($page["url"], $page["path"]);
}

$router->get($url, 'http');

?>
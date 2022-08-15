<?

class Router
{
    private $pages = [];

    function add($url, $path) {
        return $this->pages[$url] = $path;
    }

    function get($url, $type = 'pages') {
        $path = $this->pages[$url];
        $file_dir = "./$type/" . $path;

        if (file_exists($file_dir) && $path != "") {
            return require_once $file_dir;
        }

        require_once "./$type/index.php";
    }

    function location($url) {
        return header("Location: ./$url");
    }
}

?>
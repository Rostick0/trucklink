<?

class ImageController {
    public static function uploadImage($image) {
        global $PATH_UPLOAD;

        $name = ImageController::setName($image['type']);
        $path = $PATH_UPLOAD . $name;

        $upload = move_uploaded_file($image['tmp_name'], $path);
        
        if (!$upload) return NULL;

        return $name;
    }

    public static function setName($type) {
        return time() . random_int(1000, 9999) . "." . ImageController::getTypeImg($type);
    }
    
    public static function getTypeImg($type) {
        return array_pop(explode('/', $type));
    }
}

?>
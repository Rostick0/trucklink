<?

function protectionData($string) {
    $string = trim($string);
    $string = htmlspecialchars($string);
    $string = addslashes($string);
    
    return $string;
}

?>
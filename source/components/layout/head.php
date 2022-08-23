<?

function rendeHead($title) {
    return '
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="./source/static/img/favicon.svg" type="image/x-icon">
            <link rel="stylesheet" href="./source/static/css/style.css">
            <title>' . $title . '</title>
        </head>
    ';
}

?>
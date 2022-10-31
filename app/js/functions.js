const params = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
});

function stringMaxAndPoint(string, len = 10) {
    if (string.length < len) return string;
    
    return string.substr(0, len) + '...';
}

function normalizeDateSql(date) {
    let result = date.split(' ');
    result = `${result[2]}-${monthShort.indexOf(result[1]) + 1}-${result[0]}`;

    return result;
}

function throttle(func, ms) {
    let locked = false;

    return function () {
        if (locked) return

        const context = this;
        const args = arguments;

        locked = true;

        setTimeout(() => {
            func.apply(context, args);
            locked = false;
        }, ms)
    }
}

function removeClass(elem, classHtml) {
    if (!elem.classList.contains(classHtml)) return;

    elem.classList.remove(classHtml)
}

function wordLast(string) {
    string = string.split(',');
    string = string[string.length - 1];
    string = string.trim();
    return string;
}

// function wordLast($string) {
//     $string = substr($string, strrpos($string,','), strlen($string));
//     $string = str_replace(',', '', $string);
//     return trim($string);
// }
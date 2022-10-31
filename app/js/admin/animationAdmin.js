function onEntry(entry) {
    entry.forEach(change => {
        if (change.isIntersecting) {
            change.target.classList.add('_showAnimation');
        } else {
            change.target.classList.remove('_showAnimation');
        }
    });
}
let options = { threshold: [0.6] };
let observer = new IntersectionObserver(onEntry, options);
let elements = document.querySelectorAll('.aniEl');
for (let elm of elements) {
    observer.observe(elm);
}
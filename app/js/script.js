function googleSearch(input, inputChecked) {
    const autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        const place = autocomplete.getPlace();
        inputChecked.value = place.name;
    });
}

const addresSearchFromText = document.querySelector('.addres-search._from_text');
const addresSearchFrom = document.querySelector('.addres-search._from');

if (addresSearchFromText && addresSearchFrom) {
    google.maps.event.addDomListener(window, 'load', googleSearch(addresSearchFromText, addresSearchFrom));   
}

const addresSearchToText = document.querySelector('.addres-search._to_text');
const addresSearchTo = document.querySelector('.addres-search._to');

if (addresSearchToText && addresSearchTo) {
    google.maps.event.addDomListener(window, 'load', googleSearch(addresSearchToText, addresSearchTo));   
}

const userAvatar = document.querySelector('#user_avatar');

if (userAvatar) {
    const userInfoImage = document.querySelector('.user-info__image img')

    userAvatar.onchange = e => {
        const formData = new FormData();

        formData.append('avatar', e.target.files[0]);
        fetch(`${BACKEND_URL_API}/user_avatar`, {
            method: 'POST',
            body: formData
        })
        .then(res => {
            if (res.status >= 200 && res.status < 300) {
                return res.json();
            } 
            
            throw res;
        })
        .then(res => {
            userInfoImage.src = res.avatar
        })
        .catch(data => data.json())
    }
}
if($('#lottie-animation').length > 0){
    lottie.loadAnimation({
        container: document.getElementById('lottie-animation'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/storage/photos/love-animation.json'
    });
}
if($('#lottie-animation-birthday').length > 0){
    lottie.loadAnimation({
        container: document.getElementById('lottie-animation-birthday'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/storage/photos/birthday.json'
    });
}
if($('#lottie-animation').length > 0){
    lottie.loadAnimation({
        container: document.getElementById('lottie-animation'), // Div where animation will render
        renderer: 'svg', // Use 'svg', 'canvas', or 'html'
        loop: true, // Animates in a loop
        autoplay: true, // Starts playing automatically
        path: '/storage/photos/love-animation.json' // Path to your animation JSON file
    });
}
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides((slideIndex += n));
}

function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName('mySlides');
    let dots = document.getElementsByClassName('demo');
    let captionText = document.getElementById('caption');
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(' active', '');
    }
    if (slides && slides.length > 0) {
        slides[slideIndex - 1].style.display = 'block';
        dots[slideIndex - 1].className += ' active';
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
}

function checkPassword() {
    var input = document.getElementById('password-two');
    if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('La contraseña debe coincidir');
    } else {
        input.setCustomValidity('');
    }
}

function viewPassword() {
    let password = document.getElementById("password");
    let passwordTwo = document.getElementById("password-two");
    if (password.type === "password") {
        password.type = "text";
        passwordTwo ? passwordTwo.type = "text" : null;
    } else {
        password.type = "password";
        passwordTwo ? passwordTwo.type = "password" : null;
    }
}

function ocultarMostrar(elements, style) {
    elements = elements.length ? elements : [elements];
    for (var index = 0; index < elements.length; index++) {
        elements[index].style.display = style;
    }
}

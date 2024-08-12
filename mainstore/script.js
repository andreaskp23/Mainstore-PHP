let text = document.getElementById('text');
let awan1 = document.getElementById('awan1');
let awan2 = document.getElementById('awan2');
let latar = document.getElementById('latar');

window.addEventListener('scroll', () => {
    let value = window.scrollY;

    text.style.marginTop = value * 1 + 'px';
    awan1.style.left = value * 1 + 'px';
    awan1.style.top = value * 0.5 + 'px';
    awan2.style.left = value * -1 + 'px';
    awan2.style.top = value * -0.5 + 'px';
});

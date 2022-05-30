document.addEventListener('DOMContentLoaded', function () {
    var modeSwitch = document.querySelector('.mode-switch');

    modeSwitch.addEventListener('click', function () {
        document.documentElement.classList.toggle('dark');
        var bg = document.querySelector('.bg');
        bg.classList.toggle("bgdark");
        modeSwitch.classList.toggle('active');
    });
});
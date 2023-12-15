const dark_mode = document.querySelectorAll('.darkButton');
dark_mode.forEach(element => {
    element.addEventListener('click', () => {
        if (document.body.classList.contains('body-darkMode'))
            map.setStyle('mapbox://styles/mapbox/streets-v11');
        else
            map.setStyle('mapbox://styles/mapbox/dark-v11');

        document.body.classList.toggle('body-darkMode');
        blackMode = !blackMode;
    });
});

if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.body.classList.add('body-darkMode');
}


const nav_toggleButton = document.querySelector('.nav_toggleButton');
const sideBar = document.querySelector('.sideBar');
const main = document.querySelector('.main');
nav_toggleButton.addEventListener('click', () => {
    sideBar.classList.toggle('sideBar-visible');
    main.classList.toggle('main-hidden');
});

if (window.location.pathname === "/flota/location.php") {
    document.getElementById('sideBar_btnLocalizacion').classList.toggle('sideBar_item-selectedFirst');
}
else if (window.location.pathname === "/flota/fleet.php") {
    document.getElementById('sideBar_btnFlota').classList.add('sideBar_item-selected');
}
else if (window.location.pathname === "/flota/mainpage.php") {
    document.getElementById('sideBar_btnEstadisticas').classList.toggle('sideBar_item-selected');
}
else if (window.location.pathname === "/flota/driver.php") {
    document.getElementById('sideBar_btnDriver').classList.toggle('sideBar_item-selected');
}
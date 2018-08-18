/*
window.Turbolinks = require('turbolinks');
Turbolinks.start();
*/
try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}
require('bootstrap-tour/build/js/bootstrap-tour-standalone.js');

$(function() {
// Instance the tour

    //require('bootstrap-tour');
    //require('bootstrap-tour');

    //var pathuser = new RegExp('\\d+','ig');

    var tour = new Tour({
        debug: true,
        steps: [
            {
                path: "/dashboard",
                element: ".nav-footer-fix > li:first-of-type",
                title: "Шаг1_1. Настройки",
                content: "Выбирите настройки",
                reflex:true
            },
            {
                path: "/dashboard/systems",
                title: "Шаг1_2. Пользователи",
                content: "Перейдем в список пользователей",
                orphan:true,
            },
            {
                path: "/dashboard/systems/users",
                title: "Шаг1_3. Список пользователей",
                content: "Выберем нашего пользователя",
                orphan:true,
                redirect: false,
            },
            {
                path: RegExp("/\/dashboard\/systems\/users\/\d+\/edit/i"),
                element: "[for='field--systems']",
                title: "Шаг1_4. Доступы",
                content: "Дадим доступ нашему пользователю к DemoKit",
                redirect: false,
            }
        ]});

    //backdrop:true
    //op

    // Initialize the tour
    tour.init();

    // Start the tour
    tour.start();

    if (tour.ended()) {
        // decide what to do
        tour.restart();
    }

});

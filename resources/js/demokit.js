import RelationMany from "./controllers/fields/relation_controller";

//We can work with this only when we already have an application
if (typeof window.application !== 'undefined') {
    window.application.register('demokit--relation', RelationMany);
}


/*
try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}
require('bootstrap-tour/build/js/bootstrap-tour-standalone.js');

$(function() {
// Instance the tour  http://bootstraptour.com

    var tour = new Tour({
        basePath:"/dashboard",
        steps: [
            {
                path: "",
                element: ".demokit-menu",
                title: "Шаг 1. Меню",
                content: "Помощник по освоению Orchid",
                reflex:true
            },
            {
                path: "",
                element: ".demokit-step1",
                title: "Шаг 2. Основы",
                content: "Выберите 1 шаг",
                orphan: true,
                reflex:true
            },
            {
                path: "/screens/screen2",
                element: ".app-header > div:last-of-type > ul > li",
                placement: "left",
                title: "Шаг 3. Уроки",
                content: "Откройте урок",
                reflex:true
            }
        ]});

    //backdrop:true
    //op

    // Initialize the tour
    tour.init();

    // Start the tour
    tour.start();
});

*/

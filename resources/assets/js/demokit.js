window.Turbolinks = require('turbolinks');
Turbolinks.start();

require('bootstrap-tour');


// Instance the tour
var tour = new Tour({
    steps: [
        {
            element: ".nav-item",
            title: "Логотип",
            content: "Это логотип"
        },
        {
            element: "#app-content-body",
            title: "Content",
            content: "Content of my step"
        }
    ]});

// Initialize the tour
tour.init();

// Start the tour
tour.start();

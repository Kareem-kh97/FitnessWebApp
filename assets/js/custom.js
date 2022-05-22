$(document).ready(function() {

  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({pageNotFound : 'error_404'}); // initialize


  app.route({
    view: 'highcharts',
    load: 'highcharts.html'
  });

  app.route({
    view: 'select2',
    load: 'select2.html'
  });

  app.route({
    view: 'exercises',
    load: 'exercises.html'
  });

  app.route({
    view: 'ex1',
    load: 'ex1.html'
  });

  app.route({
    view: 'ex2',
    load: 'ex2.html'
  });

  app.route({
    view: 'form',
    load: 'form.html'
  });


  // run app
  app.run();

});

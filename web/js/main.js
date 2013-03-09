require.config({
  urlArgs: 'bust=' +  (new Date()).getTime()
 ,paths: {
    underscore: 'lib/underscore-min'
   ,backbone: 'lib/backbone-min'
   ,jquery: 'lib/jquery-1.9.1.min'
   ,jqueryMobile: 'lib/jquery.mobile-1.3.0.min'
  },
  shim: {
    'jqueryMobile': {
      deps: ['jquery']
    }
   ,'backbone': {
      deps: ['underscore', 'jquery']
    }
   ,'app': {
      deps: ['backbone', 'jqueryMobile']
    }
  }
})

require(['app'], function(App){
  'use strict'

  var app = new App()
  
  $(function() {
    app.start()
  })
})
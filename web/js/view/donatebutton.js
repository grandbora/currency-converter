define(function(){
  DonateButtonView = Backbone.View.extend({

    attributes:{
    }

   ,update: function(currency, rate) {
      console.log(this.options.originalValue, 'update')

      console.log(arguments)
      debugger
    }

   ,render: function() {
      console.log(this.options.originalValue)
      return this
    }
  })

  return DonateButtonView
})

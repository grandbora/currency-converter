define(['model/currencylist', 'view/currencylist'], function(CurrencyList, CurrencyListView){
  App = function(){}

  App.prototype.start = function(){

    var currencyList = new CurrencyList()

    var currencyListView = new CurrencyListView()
    
    var currencyListEl = currencyListView.render().$el

    $('body').append(
      currencyListEl
    )
  }

  return App
})
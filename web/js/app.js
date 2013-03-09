define(['view/currencylist'], function(CurrencyListView){
  App = function(){}

  App.prototype.start = function(){

    var currencyListView = new CurrencyListView({
      data:currencyListData
    })
    
    var currencyListEl = currencyListView.render().$el

    $('body').append(
      currencyListEl
    )
  }

  return App
})
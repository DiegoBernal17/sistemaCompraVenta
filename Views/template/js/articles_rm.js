var select = document.getElementById('myItems');
var select2 = document.getElementById('myItemsPrice');
select.addEventListener('click',
  function(){
    var size = parseInt($("#myItems").attr("size"));
    if(size > 1) {
      var selectedOption = this.options[select.selectedIndex];
      select.remove(selectedOption);
      if(select2 != null)
      select2.remove(selectedOption);
      $("#myItems").attr("size", size-1);
      $("#myItemsPrice").attr("size", size-1);
    }
  });

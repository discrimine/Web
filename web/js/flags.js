 $(".checkClass").change(function(){
  var id=$(this).attr("id");
    if(this.checked){
      console.log(this.checked);
      $.ajax
            ({
            type: 'POST',
            url: "funcCheckTrue.php",
            data: {action: id},
                success: function(data) {
                  console.log('Дело сделано');
                },
                error: function(data) {
                  alert(data);
                }
            });
    }else{
      $.ajax
            ({
            type: 'POST',
            url: "funcCheckFalse.php",
            data: {action: id},
                success: function(data) {
                  console.log('Дело не сделано');
                },
                error: function(data) {
                  alert(data);
                }
            });
       console.log($(this).attr("id"));
    }
});
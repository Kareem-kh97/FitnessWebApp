var Exercise = {
  get_exercises: function(){
      RestClient.get('exercises', function(data){
        Utils.datatable('all_exercises', [
          {'data':'id','title': '#ID'},
          {'data': 'name', 'title': 'Name'},
          {'data': 'type', 'title': 'Type'}
        ], data);
      }, function(data){
        toastr.error(data.responseText);
      });
    }
}

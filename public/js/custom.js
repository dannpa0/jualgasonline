
$(document).ready(function(){
    // $('#daterangereport').datepicker();
    console.log($('#daterangereport'));
    // console.log('asdlfkjasdlkfj')
    // $("#example1").datepicker();
});

$(function() {
    var url = null;
    $('#daterangereport').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {
        // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        var url = "/manajemen/report/pesanan?startDate="+start.format('YYYY-MM-DD')+"&endDate="+end.format('YYYY-MM-DD')
        $('#report input[name="startDate"]').val(start.format('YYYY-MM-DD'));
        $('#report input[name="endDate"]').val(end.format('YYYY-MM-DD'));
        $('#downloadSubmit').removeAttr('disabled');
        // $('#report').attr('action', url)
    });

    
    // $('#daterangereport').on('apply.daterangepicker', function(ev, picker){
    //     $('#report').attr('action', '/manajemen/pesanan/?asldkjlf=asdlfkj')
    //     // var url = "/manajemen/report/pesanan?startDate="+picker.startDate._i.toString().replace('/',"")+"&endDate="+picker.endDate._i.toString().replace('/',"")
    //     console.log(picker.startDate);
    // })

    
});
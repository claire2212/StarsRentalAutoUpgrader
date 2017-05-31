$(document).ready(function(){
    var form =$('#newBooking')
    
    form.change(function(){
        
        var client = $('#appbundle_booking_client')
        var dataClient = client.val()

        var startDate = $('#appbundle_booking_startDate')
        var dataStartDate = startDate.val()

        var car = $('#appbundle_booking_car')
        var dataCar = car.val()

    
        //var upgrade =$('#appbundle_booking_upgrade')  
        client.change(function(){
            dataClient = client.val()
        });

        car.change(function(){
            dataCar = car.val()
        });

        startDate.change(function(){
            dataStartDate = startDate.val()
        })
        //console.log(startDate)
        
        
    var jqXHR =  $.ajax({
            method: "POST",
            url: "upgrade/" + dataClient,
            data: 
                {
                $dataClient :dataClient,
                $dataStartDate :dataStartDate,
                $dataCar : dataCar
            },
            //contentType: application/json,
            dataType: "json",
            success: function(dataReturn) {
                 if(jqXHR.readyState == 4 && jqXHR.status == 200 && dataReturn.response == '1' ){
                    //console.log(dataReturn.response)
                    $('#upgrade').show()
                 }
                 else if(jqXHR.readyState == 4 && jqXHR.status == 200 && dataReturn.response == '' ){
                     $('#upgrade').hide()
                 }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR,errorThrown)
                
            }
        });

   })


})
$(document).ready(function(){
    var form =$('#newBooking')
    
    form.change(function(){
        
        var client = $('#appbundle_booking_client')
        var dataClient = client.val()

        var startDate = $('#appbundle_booking_startDate')
        var dataStartDate = startDate.val()

        var car = $('#appbundle_booking_car')
        var dataCar = car.val()

        client.change(function(){
            dataClient = client.val()
        });

        car.change(function(){
            dataCar = car.val()
        });

        startDate.change(function(){
            dataStartDate = startDate.val()
        })
        
        
        
    var jqXHR =  $.ajax({
            method: "POST",
            url: "upgrade/" + dataClient,
            data: 
                {
                $dataClient :dataClient,
                $dataStartDate :dataStartDate,
                $dataCar : dataCar
            },
            statusCode: {
                404: function() {
                    $('.errors').html("Veuillez remplir tous les champs" );
                },
                500: function() {
                    $('.errors').html("Veuillez remplir tous les champs" );
                }
            },
            dataType: "json",
            success: function(dataReturn) {
                 if(jqXHR.readyState == 4 && jqXHR.status == 200 && dataReturn.upgrade == '1' ){
                    //console.log(dataReturn.response)
                    $('#upgrade').show()
                    $('.msg').html(dataReturn.firstName +' ' + dataReturn.lastName +' a le droit d’être surclassé sur les TieFighters')
                    $('.errors').hide()
                 }
                 else if(jqXHR.readyState == 4 && jqXHR.status == 200 && dataReturn.response == '' ){
                    $('#upgrade').hide()
                    $('.msg').html(dataReturn.firstName +' ' + dataReturn.lastName + ' ne peut être surclassé sur les TieFighters et doit donc rester sur les XWing')
                    $('.errors').hide()
                 }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR,errorThrown)
                
            }
        });

   })


})
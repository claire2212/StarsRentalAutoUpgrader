$(document).ready(function(){
    var carRange = $('#appbundle_car_carRange')
    var carAvailable = $('#appbundle_car_available')
    

    
    carRange. click(function(e){
        e.preventDefault();
        //si la gamme est X-Wing on masque le sélecteur de couleur
        if(carRange.val()== '1'){
            $('#colorCar').hide()
        }
        //si la gamme est TieFighter on a accès aux couleurs
        else if(carRange.val()== '2'){
            $('#colorCar').show()
        }
    })

})
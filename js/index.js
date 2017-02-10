$( document ).ready(function() {

    //Obtener informacion de babytuto
    $('#iniciar').click(function() {
        $.get('http://www.babytuto.com/applications/get_test_cases', function(data){
            getData($.parseJSON(data));
        }).fail(function() {
            alert('woops');
        });
    });

    //Envio de post a service.php
    var send_post = function(array_temp){
        $.post("class/service.php", {array : array_temp}, function (data) {
            send_post_service($.parseJSON(data));
        });
    }

    //Envio de post a servicio de babytuto
    var send_post_service = function(data){
        $.post('http://www.babytuto.com/applications/check', {data : data }, function (response) {
            if(response.success){alert("OK")}else{alert("ERROR")}
        });
    }


    var getData = function(data){
        if(data.t <= 0){
            alert("Cantidad de veces es 0");
            return false;
        }
        loop(data.t);
    };

    function loop(value) {
        var time = value;
        var ArrayTemp = [];
        var i = 1;

        var recursive = function(){
            $.get('http://www.babytuto.com/applications/get_input_data/'+i, function(data){
                ArrayTemp.push($.parseJSON(data).split(' '));
                i++;
                if(i > time){
                    send_post(ArrayTemp);
                }else{
                    recursive();
                }
            }).fail(function() {
                alert('woops');
            });
        }
        recursive();
    }
});


$(function () {

    //Ce code crée un écouteur d'événements sur le clic du bouton avec l'ID "envoyer". Lorsque le bouton est cliqué, il vérifie si l'attribut name est égal à "ok" et ...

    document.getElementById('envoyer').addEventListener('click', function() {
        var button = document.getElementById('envoyer');
        var nameAttribute = button.getAttribute('name');
        if (nameAttribute === 'ok') {
      

            $("#envoyer").click(function (){
                valid = true;
                
            
                if($("#email").val()== ""){
                    $("#email").css("border-color","#FF0000");
                    valid = false;  
                }
                if($("#passw").val()== ""){
                    $("#passw").css("border-color","#FF0000");
                    valid = false;  
                }
                if($("#pass").val()== ""){
                    $("#pass").css("border-color","#FF0000");
                    valid = false;  
                }
                
                if( $("#email").val()== "" || $("#passw").val()== "" || $("#pass").val()== ""  ){ 
                    $(".error").show();
                    valid = false; 
                    
                }
                if($("#email").val()== $("#email").val().match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)    && $("#passw").val()== $("#passw").val().match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,14}$/) && $("#pass").val()==$("#pass").val()){ 
                    $(".error").hide();
                    $(".eror").show();
                    valid = false; 
                }
                else{
                    $(".eror").hide();
                    $(".error").show();
                    valid = false; 
                }


                
                return valid;









                });

                 
        }
    });



});

$(function verifieChampsValide(){


    $("#email").keyup(function(){
        if ($("#email").val().match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){
            $("#email").css("border-color","#00FF00");
            $(".error2").hide();
        }else{
            $("#email").css("border-color","#FF0000");
            $(".error2").show();
        }
    });

    $("#passw").keyup(function(){
        if ($("#passw").val().match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,14}$/)){
            $("#passw").css("border-color","#00FF00");
            $(".error4").hide();
        }else{
            $("#passw").css("border-color","#FF0000");
            $(".error4").show();
        }
      
    });

    $("#pass").keyup(function(){
        if($("#pass").val()==$("#passw").val()){
   
           $("#pass").css("border-color","#00FF00");
           $(".error5").hide();
       }else{
           $("#pass").css("border-color","#FF0000");
           $(".error5").show();
       }

    });
    
    

});
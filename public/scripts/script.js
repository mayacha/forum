
   // connexion AJAX
    function connexionAJAX(){
        $.post('login',
        { email: $("#email").val(), password: $("#password").val()},
        function(data){
            if(data == "reload"){
                window.location.reload();
            }else{
                $('.dropdown-module').html(data);
                addEventConnexionAJAX();
            }
        });
    };
    function addEventConnexionAJAX(){
        $(".btn-form-login").on('click', function(event){
            event.preventDefault();
            connexionAJAX();
        });
        $(".js-loginform").on('submit', function(event){
            event.preventDefault();
            connexionAJAX();
        });
    };
    addEventConnexionAJAX();

//formulaires profil
$('#changelog').click(function(e){
        e.preventDefault();
        $('#login').slideToggle(200);
    });
    $('#changemail').click(function(e){
        e.preventDefault();
        $('#email').slideToggle(200);
    });
    $('#changemdp').click(function(e){
        e.preventDefault();
        $('#mdp').slideToggle(200);
    });
    $('#changedate').click(function(e){
        e.preventDefault();
        $('#birth').slideToggle(200);
    });
 $('#changedescription').click(function(e){
        e.preventDefault();
        $('#description').slideToggle(200);
    });
  $('#changeavatar').click(function(e){
        e.preventDefault();
        $('#avatar').slideToggle(200);
    });




});



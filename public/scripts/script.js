$('document').ready(function(){
       // connexion AJAX
        function connexionAJAX(){
            $.post('login',
            { login: $("#login").val(), password: $("#password").val()},
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

    // RECHERCHE
    $('.search').find('input').keyup(function()
    {
        var url = window.location.pathname;
        var search = url+"?search="+$(this).val();
        history.pushState({}, "Recherche", search);
        $.get(search, function(data)
        {
            var content = $('.searchResult', '<div>'+data+'</div>');
            $('.searchResult').html(content);
            var pagination = $('.pages', '<div>'+data+'</div>');
            $('.pages').html(pagination);
        });
    });
    $('.search').find('input').val($('.search').find('input').val());
});  

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


    // function getfile(){
    //     $('#hiddenfile').click(function(e){
    //                 e.preventDefault();
                    
    //     $('#selectedfile').value=$('#hiddenfile').value;
    //     });
    // };
});
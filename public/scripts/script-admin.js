/*** NAV ADMIN ***/
$(".nav-admin .list-group-item").on("click", function(event){
    event.preventDefault();
    if(!$(this).hasClass("active)")){
    	// masque la sectio naffichée
    	var displayed = $(".nav-admin .active").data("target");
    	var hash = "#"+displayed;
    	$(hash).fadeToggle("slow");
    	$(".nav-admin .active").toggleClass("active");
    	// affche la section cible
	    $(this).toggleClass("active");
    	setTimeout(function(){
	    	var displayed = $(".nav-admin .active").data("target");
	    	var hash = "#"+displayed;
	    	$(hash).fadeToggle("slow");
    	}, 500);
    }

});


/*** GESTION UTILISATEURS ***/ 
function addEventsUser(){
	// bouton modifier utilisateur
	$('.btn-modif-user').on("click", function(){
		$(this).parent().parent().find('+ .row .displayed').toggle("slow");
		$(this).parent().parent().find('+ .row .displayed').toggleClass("displayed");
		$(this).parent().parent().find('+ .row .js-user-form-modif').toggle("slow");
		$(this).parent().parent().find('+ .row .js-user-form-modif').toggleClass("displayed");
	});
	// bouton bannir utilisateur
	$('.btn-ban-user').on("click", function(){
		$(this).parent().parent().find('+ .row .displayed').toggle("slow");
		$(this).parent().parent().find('+ .row .displayed').toggleClass("displayed");
		$(this).parent().parent().find('+ .row .js-user-form-ban').toggle("slow");
		$(this).parent().parent().find('+ .row .js-user-form-ban').toggleClass("displayed");
	});
	// bouton annuler modification utilisateur
	$('.btn-cancel-modif-user').on("click", function(event){
	    event.preventDefault();
		$(this).parent().parent().toggleClass("displayed");
		$(this).parent().parent().toggle("slow");
	});
	// bouton annuler ban utilisateur
	$('.btn-cancel-ban-user').on("click", function(event){
	    event.preventDefault();
		$(this).parent().parent().toggleClass("displayed");
		$(this).parent().parent().toggle("slow");
	});
	// bouton valide modification utilisateur
    $(".btn-valid-modif-user").off().on('click', function(event){
        event.preventDefault();
        var id = $(this).parent().parent().find("input[name=id]").val();
        modifUserAJAX(id);
    });
	// submit valide modification utilisateur
    $(".js-user-form-modif").off().on('submit', function(event){
        event.preventDefault();
        var id = $(this).parent().parent().find("input[name=id]").val();
        modifUserAJAX(id);
    });
	// bouton valide ban utilisateur
    $(".btn-valid-ban-user").off().on('click', function(event){
        event.preventDefault();
        var id = $(this).parent().parent().find("input[name=id]").val();
        banUserAJAX(id);
    });
	// submit valide ban utilisateur
    $(".js-user-form-ban").off().on('submit', function(event){
        event.preventDefault();
        var id = $(this).parent().parent().find("input[name=id]").val();
        banUserAJAX(id);
    });
};
//bouton valide modification utilisateur
function modifUserAJAX(id){
	var idId = "#user-modif-id-"+id;
	var idPermission = "#user-modif-permission-"+id;
    $.post($(".js-user-form-modif").attr("action"),
    { modif: "", id: $(idId).val(), permission: $(idPermission).val()},
    function(data){
        if(data == "error"){
        	console.log("error");
        }else{
        	var idDivUser = "#user-"+id;
            $(idDivUser).parent().html(data);
            addEventsUser();
        }
    });
};
//bouton valide modification utilisateur
function banUserAJAX(id){
	var idId = "#user-ban-id-"+id;
	var idTime = "#user-ban-time-"+id;
    $.post($(".js-user-form-ban").attr("action"),
    { ban: "", id: $(idId).val(), time: $(idTime).val()},
    function(data){
        if(data == "error"){
        	console.log("error");
        }else{
        	var idDivUser = "#user-"+id;
            $(idDivUser).parent().html(data);
            addEventsUser();
        }
    });
};
addEventsUser();


/*** GESTION CATEGORIES ***/
// bouton modifier
$('.btn-modif-category').on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-category-form-modif').toggle("slow");
	$(this).parent().parent().find('.js-category-form-modif').toggleClass("displayed");
});
// bouton supprimer
$('.btn-delete-category').on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-category-form-delete').toggle("slow");
	$(this).parent().parent().find('.js-category-form-delete').toggleClass("displayed");
});
// bouton annuler modification
$('.btn-cancel-modif-category').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});
// bouton annuler suppression
$('.btn-cancel-delete-category').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});


/*** GESTION MESSAGES SIGNALES ***/
// bouton valider message
$('.btn-valid-post').on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-post-form-valid').toggle("slow");
	$(this).parent().parent().find('.js-post-form-valid').toggleClass("displayed");
});
// bouton modifier message
$('.btn-modif-post').on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-post-form-modif').toggle("slow");
	$(this).parent().parent().find('.js-post-form-modif').toggleClass("displayed");
});
// bouton supprimer message
$('.btn-delete-post').on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-post-form-delete').toggle("slow");
	$(this).parent().parent().find('.js-post-form-delete').toggleClass("displayed");
});
// bouton annuler validation message
$('.btn-cancel-valid-post').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});
// bouton annuler modification message
$('.btn-cancel-modif-post').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});
// bouton annuler suppression message
$('.btn-cancel-delete-post').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});


/**************
**** AJAX *****
**************/


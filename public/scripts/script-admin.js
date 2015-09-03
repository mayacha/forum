/*** NAV ADMIN ***/
var menuCanChange = true;
$(".nav-admin .list-group-item").on("click", function(event){
    event.preventDefault();
    if(menuCanChange){
    	menuCanChange = false;
	    if(!$(this).hasClass("active)")){
	    	// masque la section affichée
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
    			menuCanChange = true;
	    	}, 500);
	    }
	}
});


/*** GESTION UTILISATEURS ***/ 
function addEventsUser(){
	// bouton modifier utilisateur
	$('.btn-modif-user').off().on("click", function(){
		$(this).parent().parent().find('+ .row .displayed').toggle("slow");
		$(this).parent().parent().find('+ .row .displayed').toggleClass("displayed");
		$(this).parent().parent().find('+ .row .js-user-form-modif').toggle("slow");
		$(this).parent().parent().find('+ .row .js-user-form-modif').toggleClass("displayed");
	});
	// bouton bannir utilisateur
	$('.btn-ban-user').off().on("click", function(){
		$(this).parent().parent().find('+ .row .displayed').toggle("slow");
		$(this).parent().parent().find('+ .row .displayed').toggleClass("displayed");
		$(this).parent().parent().find('+ .row .js-user-form-ban').toggle("slow");
		$(this).parent().parent().find('+ .row .js-user-form-ban').toggleClass("displayed");
	});
	// bouton annuler modification utilisateur
	$('.btn-cancel-modif-user').off().on("click", function(event){
	    event.preventDefault();
		$(this).parent().parent().toggleClass("displayed");
		$(this).parent().parent().toggle("slow");
	});
	// bouton annuler ban utilisateur
	$('.btn-cancel-ban-user').off().on("click", function(event){
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
function addEventsCategory(){
	// bouton modifier categorie
	$('.btn-modif-category').off().on("click", function(){
		$(this).parent().parent().find('+ .row .displayed').toggle("slow");
		$(this).parent().parent().find('+ .row .displayed').toggleClass("displayed");
		$(this).parent().parent().find('+ .row .js-category-form-modif').toggle("slow");
		$(this).parent().parent().find('+ .row .js-category-form-modif').toggleClass("displayed");
	});
	// bouton supprimer categorie
	$('.btn-delete-category').off().on("click", function(){
		$(this).parent().parent().find('+ .row .displayed').toggle("slow");
		$(this).parent().parent().find('+ .row .displayed').toggleClass("displayed");
		$(this).parent().parent().find('+ .row .js-category-form-delete').toggle("slow");
		$(this).parent().parent().find('+ .row .js-category-form-delete').toggleClass("displayed");
	});
	// bouton annuler modification categorie
	$('.btn-cancel-modif-category').off().on("click", function(event){
	    event.preventDefault();
		$(this).parent().parent().toggleClass("displayed");
		$(this).parent().parent().toggle("slow");
	});
	// bouton annuler suppression categorie
	$('.btn-cancel-delete-category').off().on("click", function(event){
	    event.preventDefault();
		$(this).parent().parent().toggleClass("displayed");
		$(this).parent().parent().toggle("slow");
	});
	// bouton valide ajout categorie
    $(".btn-add-category").off().on('click', function(event){
        event.preventDefault();
        addCategoryAJAX();
    });
	// submit valide ajout categorie
    $(".js-category-form-add").off().on('submit', function(event){
        event.preventDefault();
        addCategoryAJAX();
    });
	// bouton valide modif category
    $(".btn-valid-modif-category").off().on('click', function(event){
        event.preventDefault();
        var id = $(this).parent().parent().find("input[name=id]").val();
        modifCategoryAJAX(id);
    });
	// submit valide modif category
    $(".js-category-form-modif").off().on('submit', function(event){
        event.preventDefault();
        var id = $(this).parent().parent().find("input[name=id]").val();
        modifCategoryAJAX(id);
    });
	// bouton valide supprime category
    $(".btn-valid-delete-category").off().on('click', function(event){
        event.preventDefault();
        var id = $(this).parent().parent().find("input[name=id]").val();
        deleteCategoryAJAX(id);
    });
	// submit valide supprime category
    $(".js-category-form-delete").off().on('submit', function(event){
        event.preventDefault();
        var id = $(this).parent().parent().find("input[name=id]").val();
        deleteCategoryAJAX(id);
    });
};
//bouton ajouter categorie
function addCategoryAJAX(){
    $.post($(".js-category-form-add").attr("action"),
    { create: "", name: $("#category-add-name").val(), description: $("#category-add-description").val()},
    function(data){
        if(data == "error"){
        	console.log("Internal server error");
        }else{
        	$(".js-category-form-add #category-add-name").val("");
        	$(".js-category-form-add #category-add-description").val("");
            $(".wrapper-categories").html(data);
            addEventsCategory();
        }
    });
};
//bouton valide modification utilisateur
function modifCategoryAJAX(id){
	var idId = "#category-modif-id-"+id;
	var idName = "#category-modif-name-"+id;
	var idDescription = "#category-modif-description-"+id;
    $.post($(".js-category-form-modif").attr("action"),
    { modif: "", id: $(idId).val(), name: $(idName).val(), description: $(idDescription).val()},
    function(data){
        if(data == "error"){
        	console.log("error");
        }else{
        	var idDivCategory = "#category-"+id;
            $(idDivCategory).parent().html(data);
            addEventsCategory();
        }
    });
};
//bouton valide supprime utilisateur
function deleteCategoryAJAX(id){
	var idId = "#category-modif-id-"+id;
    $.post($(".js-category-form-modif").attr("action"),
    { delete: "", id: $(idId).val()},
    function(data){
        if(data == "error"){
        	console.log("error");
        }else{
        	var idDivCategory = "#category-"+id;
            $(idDivCategory).parent().detach();
        }
    });
};
addEventsCategory();
//Internal server error


/*** GESTION MESSAGES SIGNALES ***/
// bouton valider message
$('.btn-valid-post').off().on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-post-form-valid').toggle("slow");
	$(this).parent().parent().find('.js-post-form-valid').toggleClass("displayed");
});
// bouton modifier message
$('.btn-modif-post').off().on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-post-form-modif').toggle("slow");
	$(this).parent().parent().find('.js-post-form-modif').toggleClass("displayed");
});
// bouton supprimer message
$('.btn-delete-post').off().on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-post-form-delete').toggle("slow");
	$(this).parent().parent().find('.js-post-form-delete').toggleClass("displayed");
});
// bouton annuler validation message
$('.btn-cancel-valid-post').off().on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});
// bouton annuler modification message
$('.btn-cancel-modif-post').off().on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});
// bouton annuler suppression message
$('.btn-cancel-delete-post').off().on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});




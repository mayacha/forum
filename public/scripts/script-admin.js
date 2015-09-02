/*** Nav admin ***/
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

/*** gestion catégories ***/
// bouton modifier
$('.btn-update-category').on("click", function(){
	if($(this).parent().parent().find('.js-category-form-delete').hasClass("displayed")){
		$(this).parent().parent().find('.js-category-form-delete').toggle("slow");
		$(this).parent().parent().find('.js-category-form-delete').toggleClass("displayed");
	}
	$(this).parent().parent().find('.js-category-form-modif').toggle("slow");
	$(this).parent().parent().find('.js-category-form-modif').toggleClass("displayed");
});
// bouton supprimer
$('.btn-delete-category').on("click", function(){
	if($(this).parent().parent().find('.js-category-form-modif').hasClass("displayed")){
		$(this).parent().parent().find('.js-category-form-modif').toggle("slow");
		$(this).parent().parent().find('.js-category-form-modif').toggleClass("displayed");
	}
	$(this).parent().parent().find('.js-category-form-delete').toggle("slow");
	$(this).parent().parent().find('.js-category-form-delete').toggleClass("displayed");
});
// bouton annuler suppression
$('.btn-cancel-delete-category').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggle("slow");
});


/*** gestion utilisateurs ***/ 
// bouton modifier
$('.btn-update-user').on("click", function(){
	$(this).parent().parent().find('+ .js-user-form-modif').toggle("slow");
	$(this).parent().parent().find('+ .js-user-form-modif').toggleClass("displayed");
});


/*** gestion messages signalés ***/
// bouton modifier
$('.btn-valid-post').on("click", function(){
	if($(this).parent().parent().find('.js-post-form-delete').hasClass("displayed")){
		$(this).parent().parent().find('.js-post-form-delete').toggle("slow");
		$(this).parent().parent().find('.js-post-form-delete').toggleClass("displayed");
	}
	$(this).parent().parent().find('.js-post-form-valid').toggle("slow");
	$(this).parent().parent().find('.js-post-form-valid').toggleClass("displayed");
});
// bouton supprimer
$('.btn-delete-post').on("click", function(){
	if($(this).parent().parent().find('.js-post-form-valid').hasClass("displayed")){
		$(this).parent().parent().find('.js-post-form-valid').toggle("slow");
		$(this).parent().parent().find('.js-post-form-valid').toggleClass("displayed");
	}
	$(this).parent().parent().find('.js-post-form-delete').toggle("slow");
	$(this).parent().parent().find('.js-post-form-delete').toggleClass("displayed");
});
// bouton annuler suppression
$('.btn-cancel-delete-post').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggle("slow");
});
// bouton annuler validation
$('.btn-cancel-valid-post').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggle("slow");
});
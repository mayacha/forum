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
// bouton modifier
$('.btn-modif-user').on("click", function(){
	$(this).parent().parent().find('+ .row .displayed').toggle("slow");
	$(this).parent().parent().find('+ .row .displayed').toggleClass("displayed");
	$(this).parent().parent().find('+ .row .js-user-form-modif').toggle("slow");
	$(this).parent().parent().find('+ .row .js-user-form-modif').toggleClass("displayed");
});
// bouton bannir
$('.btn-ban-user').on("click", function(){
	$(this).parent().parent().find('+ .row .displayed').toggle("slow");
	$(this).parent().parent().find('+ .row .displayed').toggleClass("displayed");
	$(this).parent().parent().find('+ .row .js-user-form-ban').toggle("slow");
	$(this).parent().parent().find('+ .row .js-user-form-ban').toggleClass("displayed");
});
// bouton annuler modification
$('.btn-cancel-modif-user').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});
// bouton annuler ban
$('.btn-cancel-ban-user').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});


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


/*** GESTION MESAGES SIGNALES ***/
// bouton valider
$('.btn-valid-post').on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-post-form-valid').toggle("slow");
	$(this).parent().parent().find('.js-post-form-valid').toggleClass("displayed");
});
// bouton modifier
$('.btn-modif-post').on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-post-form-modif').toggle("slow");
	$(this).parent().parent().find('.js-post-form-modif').toggleClass("displayed");
});
// bouton supprimer
$('.btn-delete-post').on("click", function(){
	$(this).parent().parent().find('.displayed').toggle("slow");
	$(this).parent().parent().find('.displayed').toggleClass("displayed");
	$(this).parent().parent().find('.js-post-form-delete').toggle("slow");
	$(this).parent().parent().find('.js-post-form-delete').toggleClass("displayed");
});
// bouton annuler validation
$('.btn-cancel-valid-post').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});
// bouton annuler modification
$('.btn-cancel-modif-post').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});
// bouton annuler suppression
$('.btn-cancel-delete-post').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggleClass("displayed");
	$(this).parent().parent().toggle("slow");
});
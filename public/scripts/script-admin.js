/*** gestion catégories ***/
// bouton modifier
$('.btn-update-category').on("click", function(){
	$(this).parent().parent().find('.js-category-form-modif').toggle("slow");
});
// bouton supprimer
$('.btn-delete-category').on("click", function(){
	$(this).parent().parent().find('.js-category-form-delete').toggle("slow");
});
// bouton annuler suppression
$('.btn-cancel-delete-category').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggle("slow");
});

/*** gestion utilisateurs ***/ 
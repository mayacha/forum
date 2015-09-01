$('.btn-update-category').on("click", function(){
	$(this).parent().parent().find('.js-category-form-modif').toggle("slow");
});

$('.btn-delete-category').on("click", function(){
	$(this).parent().parent().find('.js-category-form-delete').toggle("slow");
});

$('.btn-cancel-delete-category').on("click", function(event){
    event.preventDefault();
	$(this).parent().parent().toggle("slow");
});
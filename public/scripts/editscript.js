var Content=$('#postContent').val();

var button=$('.js-button').on('click', function (event)
{
	event.preventDefault();
	var modif=$(this).find('+ div').toggle();

	
	
});

var buttontopic=$('.js-button-topic').on('click', function (event)
{
	event.preventDefault();
	var change=$(this).find('+ div').toggle();
});

var buttonpost=$('.js-button-create').on('click', function (event)
{
	event.preventDefault();
	var change=$(this).find('+ div').toggle();
});
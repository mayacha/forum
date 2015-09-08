function init(){
	$(".message").focus();
	afficheNouveauxMessages();
	window.setInterval(function(){
		afficheNouveauxMessages();
		afficheUtilisateursOnline();
	}, 1000);
}
//affiche les messages non affichés
function afficheNouveauxMessages(){
    $.post("message",
    { 'refresh-messages': ""},
    function(data){
		$(".tchat-histo").html(data);
		$(".tchat-histo").scrollTop($(".tchat-histo").prop("scrollHeight"));
    });
}
function afficheUtilisateursOnline(){
    $.post("message",
    { 'refresh-users': ""},
    function(data){
		$(".tchat-users ul").html(data);
    });
}
// envoi le message entré par l'utilisateur
function envoiMessage(message){
	$.post("message",
	{'create': "", 'message': message}, 
	function(data){
		$(".message").val("");
		afficheNouveauxMessages();
	});
}

init();
//input avec le message
$(".message").keyup(function(info){
	if(info.keyCode === 13 && $(this).val() !== ""){
		envoiMessage($(this).val());	
		$(".message").focus();
	}
});
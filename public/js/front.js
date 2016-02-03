/**
 * Created by HP on 10/01/2016.
 */

var timeout;
var restant;

function nextPage(numPage) {
    var questionId=$('.questions:eq('+numPage+')').attr('id');
    $.ajax({
        type: "GET",
        url : "/questionquizz",
        data : 'numQuest='+numPage+'&questionId='+questionId ,
        success : function(data){
            $('.questions').hide();
            $('.questions:eq('+numPage+')').html(data);
            $('.questions:eq('+numPage+')').show();
        }
    },"json");

}

function process(question, numPage, temps) {
    var res=$('.questions:eq('+numPage+') input:checked').attr('id');

    $.ajax({
        type: "GET",
        url : "/process",
        data : 'question='+question+'&res='+res+'&temps='+temps ,
        success : function(data){

        }
    },"json");
}

function result() {
    window.location.replace("/result");
}

function rebour(tps,currentPage, numPages)
{
        var heure = Math.floor(tps/3600);
        if(heure >= 24)
        {
            var jour = Math.floor(heure/24);
            var moins = 86400*jour;
            var heure = heure-(24*jour);
        }
        else
        {
            var jour = 0;
            var moins = 0;
        }
        moins = moins+3600*heure;
        var minutes = Math.floor((tps-moins)/60);
        moins = moins + 60*minutes;
        var secondes = tps-moins;
        minutes = ((minutes < 10) ? "0" : "") + minutes;
        secondes = ((secondes < 10) ? "0" : "") + secondes;
        document.getElementById("compteRebour").innerHTML = secondes;
        if(secondes=="00") {
            if(currentPage==numPages){
                $('#subForm').click();
            } else {
                $("#butNext").click();
            }
            return;
        }
        restant = tps-1;
        timeout = setTimeout("rebour("+restant+","+currentPage+","+numPages+")", 1000);
}
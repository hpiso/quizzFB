/**
 * Created by HP on 10/01/2016.
 */

var timeout;
var Imtech = {};
Imtech.Pager = function() {
    this.paragraphsPerPage = 3;
    this.currentPage = 1;
    this.pagingControlsContainer = '#pagingControls';
    this.pagingContainerPath = '#content_pager';

    this.numPages = function() {
        var numPages = 0;
        if (this.paragraphs != null && this.paragraphsPerPage != null) {
            numPages = Math.ceil(this.paragraphs.length / this.paragraphsPerPage);
        }

        return numPages;
    };

    this.showPage = function(page, numPages) {
        clearTimeout(timeout);
        this.currentPage = page;
        var html = '';

        this.paragraphs.slice((page-1) * this.paragraphsPerPage,
            ((page-1)*this.paragraphsPerPage) + this.paragraphsPerPage).each(function() {
            html += '<div>' + $(this).html() + '</div>';
        });

        $(this.pagingContainerPath).html(html);

        renderControls(this.pagingControlsContainer, this.currentPage, this.numPages());

        rebour(7, page, this.numPages());
    }

    var renderControls = function(container, currentPage, numPages) {
        var pagingControls = null;
        var nextPage = currentPage+1;
        if (numPages != currentPage) {
            pagingControls = '<a href="#" id="butNext" class="btn-floating btn-large waves-effect waves-light blue" onclick="pager.showPage(' + nextPage + ',' + numPages + '); return false;"> >> </a>';
        } else {
            $('#subForm').css("display", "inline-block");
        }

        $(container).html(pagingControls);
    }
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
        var restant = tps-1;
        timeout = setTimeout("rebour("+restant+","+currentPage+","+numPages+")", 1000);
}
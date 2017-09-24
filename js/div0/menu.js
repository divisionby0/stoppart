$(document).ready(function(){
    var scrollMax = 160;
    var currentState;
    var NORMAL = "NORMAL";
    var EXTENDED = "EXTENDED";

    var menuInitPositionY = $("#menuContainer").css("top");

    var currentScrollPosition;

    onScroll();

    function onStateChanged(){
        switch(currentState){
            case NORMAL:
                $("#menuContainer").removeClass("absolutePositionMenu");
                $("#menuContainer").addClass("relativePositionMenu");
                break;
            case EXTENDED:
                $("#menuContainer").removeClass("relativePositionMenu");
                $("#menuContainer").addClass("absolutePositionMenu");
                break;
        }
    }

    function updateMenuPosition(positionY){
        if(currentState == EXTENDED){
            $("#menuContainer").css("top",positionY);
        }
        else{
            $("#menuContainer").css("top",menuInitPositionY);
        }
    }


    function onScroll(){
        currentScrollPosition = window.pageYOffset;
        updateMenuPosition(currentScrollPosition);

        if(currentScrollPosition > scrollMax){
            if(currentState!=EXTENDED){
                currentState = EXTENDED;
                onStateChanged();
            }
        }
        else{
            if(currentState!=NORMAL){
                currentState = NORMAL;
                onStateChanged();
            }
        }
    }


    $(window).scroll(function(){
        onScroll();
    });
});

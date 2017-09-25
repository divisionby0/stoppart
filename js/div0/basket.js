$(document).ready(function(){
    var dragAnimationDuration = 600;
    var destroyAnimationDuration = 100;

    $("[id*=ishop]").click(function(){

        var basketElement = $("#basketcontain");
        var idPostfix = $(this).attr("id").split("ishop")[1];

        if(idPostfix){
            var imageElement = $("#img"+idPostfix);

            var basketTop = basketElement.offset().top;
            var basketLeft = $(document).width() - 80;


            var imgclone = imageElement.clone()
                .offset({
                    top: imageElement.offset().top,
                    left: imageElement.offset().left
                })
                .css({
                    'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '210px',
                    'z-index': '100'
                })
                .appendTo($('body'))
                .animate({
                    'top': basketTop + 10,
                    'left': basketLeft + 10,
                    'width': 21,
                    'height': 15
                }, dragAnimationDuration);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, destroyAnimationDuration, function () {
                $(this).detach();
            });
        }
        else{
            console.error("Undefined item id");
        }
    });
});





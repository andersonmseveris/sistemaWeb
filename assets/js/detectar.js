$(function() {
    $('#detectar').click(function() {
        var $this = $(this);
 
        var coords = $('img').faceDetection({
            complete:function() {
                $this.text('Face encontrada!');
            },
            error:function(img, code, message) {
                $this.text('error!');
                alert('Erro: '+message);
            }
        });
        for (var i = 0; i < coords.length; i++) {
            $('<div>', {
                'class':'face',
                'css': {
                    'position': 'absolute',
                    'left':     coords[i].positionX +'px',
                    'top':      coords[i].positionY +'px',
                    'width':    coords[i].width     +'px',
                    'height':   coords[i].height    +'px'
                }
            })
            .appendTo('#content');
        }
    });
    return false;
});
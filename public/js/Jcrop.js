//var JCropper;
jQuery.noConflict();
var JcropAPI = null;
var _IMG_SELECTORN_NAME = '#jcrop_target';
var _IMG_PHOTO = new Image();
var _IMG_PHOTO_NEW = new Image();
        
jQuery(window).load(function(){
    //画像ファイルを変更
    jQuery(document).on("change", '.fileData', function (data){
        document.body.style.cursor = 'wait';
        var reader = new FileReader();
        reader.onload = function(e) {
            _IMG_PHOTO = new Image(); //イメージオブジェクト生成
            //jQuery(_IMG_SELECTORN_NAME).attr("src",reader.result);

            _IMG_PHOTO.src = reader.result;
            _IMG_PHOTO.onload = function() {
                //JcropAPIのクリア
                if(JcropAPI!=null){
                    JcropAPI.destroy();
                    JcropAPI=null;
                }
                //座標のクリア
                clearCoords();
                var orientation = getOrientation(_IMG_PHOTO.src);
                _TW = _IMG_PHOTO.naturalWidth;
                _TH = _IMG_PHOTO.naturalHeight;
                var imgNew = rotate(_IMG_PHOTO,_TW,_TH,orientation);
                jQuery(_IMG_SELECTORN_NAME).attr("src",imgNew);
            	_IMG_PHOTO_NEW = new Image(); //イメージオブジェクト生成
            	_IMG_PHOTO_NEW.src = imgNew;
	        _IMG_PHOTO_NEW.onload = function() {
        	        //イメージをトリミング
                editTrimmingImage(_TW, _TH);
                document.body.style.cursor = 'auto';
                location.href="#open01";
            	};
            };
        }
        reader.readAsDataURL(jQuery(this).context.files[0]);
        if(jQuery(this).context.hasOwnProperty("files")){
                jQuery(this).context.files = [];
        }
        jQuery('#' + jQuery(this).context.id).val('');
    });
    //クリッピングボタンクリック
    jQuery('#btnCrop').click(function() {
        if(jQuery("#w").val()==""){
            alert("切り取り範囲を選択してください。");
            return false;
        }
        var img = getDataURL();
        jQuery("#image_thum").attr("src",img);
        jQuery("#image_src").val(img);
        location.href="#";
    });
} );

var boundx, boundy;
function editTrimmingImage(tw, th) {
    var s = fixImageSize(tw, th);
    jQuery(_IMG_SELECTORN_NAME).width(s.maxWidth);
    jQuery(_IMG_SELECTORN_NAME).height(s.maxHeight);
    jQuery("#jcrop_target").Jcrop({
        onChange: updatePreview,
        onSelect:   showCoords,
        onRelease:  clearCoords,
        trueSize: [tw,th],
        boxWidth: s.maxWidth,
        boxHeight: s.maxHeight,
        aspectRatio: 1
    },function(){
	//JCropper = this;
	JcropAPI = jQuery(_IMG_SELECTORN_NAME).data('Jcrop');
        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
    });
}

function checkCoords() {
    if(parseInt(jQuery("#w").val())) return true;
    return false;
}

function showCoords(c)
{
    jQuery('#x1').val(c.x);
    jQuery('#y1').val(c.y);
    jQuery('#x2').val(c.x2);
    jQuery('#y2').val(c.y2);
    jQuery('#w').val(c.w);
    jQuery('#h').val(c.h);
    
    updatePreview(c);
};

  function clearCoords()
  {
    jQuery('#x1').val("");
    jQuery('#y1').val("");
    jQuery('#x2').val("");
    jQuery('#y2').val("");
    jQuery('#w').val("");
    jQuery('#h').val("");
  };


function updatePreview(c) {
    if (parseInt(c.w) > 0)
    {
        var cW = jQuery("photo_viewer").width();
        var vH = jQuery("photo_viewer").height();
 
        
        var rx = cW / c.w;
        var ry = vH / c.h;

        jQuery("#preview").css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
        });
    }
}


function getDataURL(){
	    //var s = fixImageSize(tw, th);

            var width = _IMG_BOX_WIDTH;
            var height = _IMG_BOX_WIDTH;
            var canvas = document.createElement("canvas");
               // canvas.clearRect(width, height);
            var w = parseInt(jQuery('#w').val());
            var h = parseInt(jQuery('#h').val());
            var x1 = parseInt(jQuery('#x1').val());
            var y1 = parseInt(jQuery('#y1').val());
            var dx = 0 - parseInt(w)/2 + width/2;
            var dy = 0 - parseInt(h)/2 + height/2;
            var dw = width;
            var dh = height;
            var sh = w;
            var sw = h;
            var sx = x1;
            var sy = y1;
            canvas.width = width;
            canvas.height = height;
            var context = canvas.getContext("2d");

            context.drawImage(_IMG_PHOTO_NEW, sx, sy, sw, sh, 0, 0, dw, dh);
            var img_png_src = canvas.toDataURL();
            jQuery("#thumb").attr("src",img_png_src);
            return img_png_src;
}

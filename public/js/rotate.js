var _TW = 0; //実画像幅
var _TH = 0; //実画像高さ
//縦横幅300
var _IMG_BOX_WIDTH = 300;
        
//添付ファイル容量チェック
function tempfilesizecheck(limit) {
    check = true;
    allSize = 0;
    $("input:file").each(function() {
        id = $(this).attr('id');
        var value = document.getElementById(id).files;
        //console.log(value);
        
        for(var i=0; i<value.length; i++) {
            filesize = value[i].size;
            allSize = allSize + filesize;
            if(limit < parseInt(filesize)) {
                check = false;
            }
        }
    });
    if(limit < allSize) {
        check = false;
    }
    return check;
}

function fixImageSize(w,h){
    var maxW = _IMG_BOX_WIDTH;
    // 比率を維持したまま、幅をmaxWへ変更
    var maxHeight = h;
    var maxWidth = w;

    var zoomScale = Math.round(maxW*10000/w)/10000;
    maxHeight = parseInt(h*zoomScale);
    maxWidth = maxW;

    var obj = new Object();
    obj.maxWidth = maxWidth;
    obj.maxHeight = maxHeight;
    obj.zoomScale = zoomScale;
    return obj;
}


function getOrientation(imgDataURL){
    var byteString = atob(imgDataURL.split(',')[1]);
    var orientaion = byteStringToOrientation(byteString);
    return orientaion;

    function byteStringToOrientation(img){
        var head = 0;
        var orientation;
        while (1){
            if (img.charCodeAt(head) == 255 & img.charCodeAt(head + 1) == 218) {break;}
            if (img.charCodeAt(head) == 255 & img.charCodeAt(head + 1) == 216) {
                head += 2;
            }
            else {
                var length = img.charCodeAt(head + 2) * 256 + img.charCodeAt(head + 3);
                var endPoint = head + length + 2;
                if (img.charCodeAt(head) == 255 & img.charCodeAt(head + 1) == 225) {
                    var segment = img.slice(head, endPoint);
                    var bigEndian = segment.charCodeAt(10) == 77;
                    var count;
                    if (bigEndian) {
                        count = segment.charCodeAt(18) * 256 + segment.charCodeAt(19);
                    } else {
                        count = segment.charCodeAt(18) + segment.charCodeAt(19) * 256;
                    }
                    for (i=0; i < count; i++){
                        var field = segment.slice(20 + 12 * i, 32 + 12 * i);
                        if ((bigEndian && field.charCodeAt(1) == 18) || (!bigEndian && field.charCodeAt(0) == 18)) {
                            orientation = bigEndian ? field.charCodeAt(9) : field.charCodeAt(8);
                        }
                    }
                    break;
                }
                head = endPoint;
            }
            if (head > img.length){break;}
        }
        return orientation;
    }
}

    function rotate(img,w,h,orientation) {
	return rotate_base(img,w,h,orientation,"png");
    }

    function rotate_base(img,w,h,orientation,ext) {
	var canvasW = w;
	var canvasH = h;

	if(orientation == 5 || orientation == 6 || orientation == 7 || orientation == 8){
		 canvasW=h;
		 canvasH=w;
		_TH = canvasH;
		_TW = canvasW;
	}
	var canvas = document.createElement("canvas");
            canvas.width = canvasW;
            canvas.height = canvasH;
            var context = canvas.getContext("2d");

	var draw_width = canvasW;
	var draw_height = canvasH;
        //context.clearRect(0, 0, canvas.width, canvas.height);
        //context.translate(canvas.width / 2, canvas.height / 2);
        //context.rotate(90 * Math.PI / 180);
        //context.translate(- img.width / 2, -img.height / 2);
//alert(orientation);
        switch(orientation){
                            case 2:
                                context.transform(-1, 0, 0, 1, canvasW, 0);
                            break;
 
                            case 3:
                                context.transform(-1, 0, 0, -1, canvasW, canvasH);
                            break;
 
                            case 4:
                                context.transform(1, 0, 0, -1, 0, canvasH);
                            break;
 
                            case 5:
                                context.transform(-1, 0, 0, 1, 0, 0);
                                context.rotate((90 * Math.PI) / 180);
				draw_width = canvasH;
				draw_height = canvasW;

                            break;
 
                            case 6:
                                context.transform(1, 0, 0, 1, canvasW, 0);
                                context.rotate((90 * Math.PI) / 180);
				draw_width = canvasH;
				draw_height = canvasW;
                            break;
 
                            case 7:
                                context.transform(-1, 0, 0, 1, canvasW, canvasH);
                                context.rotate((-90 * Math.PI) / 180);
				draw_width = canvasH;
				draw_height = canvasW;
                            break;
 
                            case 8:
                                context.transform(1, 0, 0, 1, 0, canvasH);
                                context.rotate((-90 * Math.PI) / 180);
				draw_width = canvasH;
				draw_height = canvasW;
                            break;
 
                            default:
				return img.src;
                            break;
 
        }
        context.drawImage(img, 0, 0, draw_width, draw_height);
        // context.drawImage(img, 0, 0, draw_width, draw_height,0,0,canvasH,canvasW);
	var imageData = canvas.toDataURL('image/' + ext);
	return imageData;
    }

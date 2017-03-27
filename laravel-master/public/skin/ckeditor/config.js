var uploadImageToken = {
    "vid":"",
    token:function(){
        var cke_64_textInput=document.getElementById("cke_64_textInput");
        cke_64_textInput.value = uploadImageToken.vid;
    },
    error:function () {
        alert(uploadImageToken.vid);
    }
};


//                            http://www.cnblogs.com/answercard/p/3709463.html
var editorConfig = {
    // Define the toolbar groups as it is a more accessible solution.
    toolbar: [
        ['Source','Preview','Image','Table'],
        ['Bold','Italic','Underline','Strike','Link','Unlink'],
        ['JustifyLeft','JustifyCenter','JustifyRight'],
        ['NumberedList','BulletedList'],
        ['TextColor','BGColor','FontSize','Format']
    ],
    toolbar_Basic: [
        ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'About']
    ],
    toolbarGroups: [
        {"name":"basicstyles","groups":["basicstyles"]},
        {"name":"links","groups":["links"]},
        {"name":"paragraph","groups":["list","blocks"]},
        {"name":"document","groups":["mode"]},
        {"name":"insert","groups":["insert"]},
        {"name":"styles","groups":["styles"]},
        {"name":"about","groups":["about"]}
    ],

    // Remove the redundant buttons from toolbar groups defined above.
    removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
};
// mc.skin = 'office2013';
editorConfig.filebrowserImageUploadUrl = 'http://laravel-master/admin/product/uploadImage';
editorConfig.extraPlugins = 'image';


//---------------
// editorConfig.filebrowserBrowseUrl =  '/ckfinder/ckfinder.html';
// editorConfig.filebrowserImageBrowseUrl =  '/ckfinder/ckfinder.html?Type=Images';
// editorConfig.filebrowserFlashBrowseUrl =  '/ckfinder/ckfinder.html?Type=Flash';
// editorConfig.filebrowserUploadUrl =  '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
// editorConfig.filebrowserImageUploadUrl  =  '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
// editorConfig.filebrowserFlashUploadUrl  =  '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
//---------------

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};

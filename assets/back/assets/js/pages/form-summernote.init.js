jQuery(document).ready(function(){
    $(".summernote").summernote({
        height:250,
        minHeight:null,
        maxHeight:null,
        focus:!1,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph', 'table']],
            ['height', ['height', 'fullscreen', 'codeview']]
        ]}),
    $(".inline-editor").summernote({airMode:!0})});
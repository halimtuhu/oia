tinymce.init({
  selector: '.tinymce',
  theme: 'modern',
  // width: 300,
  // height: 200,
  plugins: [
    'advlist autolink lists link charmap anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  menubar: false,
  toolbar: 'undo redo | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link media | code'
});

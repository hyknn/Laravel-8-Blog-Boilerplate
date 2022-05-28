<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#post_desc', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'lists',
        menubar: '',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist',
    });
</script>

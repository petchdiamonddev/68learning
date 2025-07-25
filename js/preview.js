document.getElementById('imginput').onchange = function(event) {
    const [files] = event.target.files;
    if (files) {
        const preview =document.getElementById('preview');
        preview.src=URL.createObjectURL(files);
        preview.style.display = 'block';
    }
};
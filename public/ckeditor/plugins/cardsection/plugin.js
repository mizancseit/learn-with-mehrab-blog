CKEDITOR.plugins.add('cardsection', {
    icons: 'cardsection', // Icon file name (without extension)
    init: function(editor) {
        editor.addCommand('insertCardSection', {
            exec: function(editor) {
                var cardHTML = `
                    <div class="card">
                        <div class="card-header">
                            Header
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer">
                            Footer
                        </div>
                    </div>`;
                editor.insertHtml(cardHTML);
            }
        });

        editor.ui.addButton('CardSection', {
            label: 'Insert Card Section',
            command: 'insertCardSection',
            toolbar: 'insert'
        });
    }
});

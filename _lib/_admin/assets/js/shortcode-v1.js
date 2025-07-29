(function() {

    tinymce.PluginManager.add('custom_mce_button', function(editor, url) {
        editor.addButton('custom_mce_button', {
            icon: 'image',
            text: 'Banners',
            onclick: function() {
                
                editor.windowManager.open({
                    title: 'Inserir Banner',
                    body: [
                        {
                            type: 'listbox',
                            name: 'zona',
                            label: '',
                            values: [
                                {
                                    text: 'Interno',
                                    value: 'interna'
                                }, 
                                {
                                    text: 'Interno-Vestibular',
                                    value: 'interna-vestibular'
                                }, 
                            ]
                        }, 
                        {
                            type: 'listbox',
                            name: 'slug',
                            label: '',
                            values: [
                                {
                                    text: 'Matérias',
                                    value: 'materias'
                                }, 
                                {
                                    text: 'Notícias',
                                    value: 'noticias'
                                }, 
                                {
                                    text: 'Vestibular',
                                    value: 'vestibular'
                                }, 
                            ]
                        }, 
                    ],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[banner zona="'+e.data.zona+'" slug="'+ e.data.slug +'"]' + editor.selection .getContent()
                        );
                    }
                });

                
                

                
            }
        });
    });

    
      
})();
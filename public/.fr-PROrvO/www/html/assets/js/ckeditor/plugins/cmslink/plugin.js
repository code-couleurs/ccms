CKEDITOR.plugins.add( 'cmslink',
    {
        init: function( editor )
        {
            editor.addCommand( 'cmslinkDialog', new CKEDITOR.dialogCommand( 'cmslinkDialog' ) );
            editor.addCommand( 'choixRubriqueDialog', new CKEDITOR.dialogCommand( 'choixRubriqueDialog' ) );
            editor.ui.addButton( 'cmslink',
            {
                label: 'Ajouter un lien',
                command: 'cmslinkDialog',
                icon: this.path + 'images/icon.png'
            });
        }
    });

CKEDITOR.dialog.add( 'cmslinkDialog', function( editor )
{
    var global_dialog;
    var rubriques = [];
    var filename;

    function populateRubriques()
    {
        global_dialog = this.getDialog();
        var select = this;
        $.get('/pages/arbo_as_options.json', null, 
        function(options)
        {
            for(var option in options)
            {
                select.add(options[option].titre, options[option].url);
                rubriques[options[option].url] = options[option].titre;
            }
        } , 'json');
    }
    
    function uploadDocument()
    {
        $('#to_upload_file_field').fileupload(
        {
            url: '/pages/add_document.json',
            dataType: 'json',
            add:function (e, data) {
                data.submit().success(function (url, textStatus, jqXHR)
                {
                     $('#to_upload_file_name').text(url);
                     filename = url;
                });
            }
        });
    }
    
    
    return {
        title : 'Informations sur le lien',
        minWidth : 400,
        minHeight : 200,
        contents :
        [
        {
            id : 'externe',
            label : 'Vers un site externe',
            elements :
            [
            {
                type : 'text',
                id : 'url',
                label : 'ADRESSE',
                commit : function( data )
		{
			data.url = this.getValue();
		}
            }
            ]
        },
        {
            id : 'to_rubrique',
            label : 'Vers une rubrique',
            elements :
            [
            {
                type : 'select',
                id : 'to_rubrique_select',
                label: 'Choisir une rubrique',
                onLoad: populateRubriques,
                items: []
            }
            ]
        },
        {
            id : 'to_file',
            label : 'Vers un fichier',
            elements :
            [
            {
                type : 'html',
                html: 'Choisir un fichier sur votre ordinateur :<br /> <input type="file" name="doc_to_upload" id="to_upload_file_field" /><div id="to_upload_file_name"></div>'
            }
            ]
        }
        ],
        onOk : function()
        {
            data = {};
            this.commitContent( data );
            link = editor.document.createElement( 'a' );     
            switch(global_dialog.definition.dialog._.currentTabId)
            {
                case 'externe' :
                    link.setAttribute( 'href', data.url );
                    link.setAttribute('target', '_blank');
                    link.setHtml(data.url);       
                    break;
                case 'to_rubrique' :
                    link.setAttribute( 'href', '/'+global_dialog.getContentElement('to_rubrique', 'to_rubrique_select' ).getValue());
                    link.setHtml(global_dialog.getContentElement('to_rubrique', 'to_rubrique_select' ).getValue());
                    break;
                case 'to_file' :
                    link.setAttribute( 'href', filename.toString());
                    link.setAttribute('target', '_blank');
                    link.setHtml(filename);
                    break;                    
                    
            }
            editor.insertElement(link);
        },
        onShow: function(){
            uploadDocument();
        }
    };
});

CKEDITOR.dialog.add( 'choixRubriqueDialog', function( editor )
{
    return {
        title : 'Choisir une rubrique',
        minWidth : 400,
        minHeight : 200,
        contents :
        [
        
            {
                type : 'button',
                id : 'to_document',
                label : 'Lien vers un document'
            }
        ]
    }
});
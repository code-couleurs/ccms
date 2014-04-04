CKEDITOR.plugins.add( 'cmslink',
    {
        init: function( editor )
        {
            editor.addCommand( 'cmslinkDialog', new CKEDITOR.dialogCommand( 'cmslinkDialog' ) );
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
    function chargeRubriques()
    {
        editor.openDialog('choix_rubrique');
        /*
        global_dialog = this.getDialog();
        $.get('/pages/arbo.json', null, 
        function(ret)
        {
            /*
            $.fancybox(ret);
            $('#fancybox-overlay').css('z-index', 11000);
            $('#fancybox-wrap').css('z-index', 11001);
            $('a.arbo_link').click(selectRubrique);
           
        } , 'json');
        */
    }
    
    function selectRubrique()
    {
        global_dialog.getContentElement( 'general', 'url' ).setValue('/'+$(this).attr('href'));
        global_dialog.getContentElement( 'general', 'caption' ).setValue($(this).text());
        $.fancybox.close();
        return false;
    }
    
    function uploadDocument()
    {
        global_dialog = this.getDialog();
        $.fancybox('<form method="POST" action="/pages/add_document"><input type="file" name="doc_to_upload" id="doc_to_upload" /></form>');
        $('#fancybox-overlay').css('z-index', 11000);
        $('#fancybox-wrap').css('z-index', 11001);
        $('#doc_to_upload').fileupload(
        {
            dataType: 'json',
            add:function (e, data) {
                data.submit().success(function (url, textStatus, jqXHR)
                {
                     global_dialog.getContentElement('general', 'url' ).setValue(url);
                     $.fancybox.close();
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
            id : 'general',
            label : 'Informations',
            elements :
            [
            {
                type : 'text',
                id : 'url',
                label : 'ADRESSE',
                validate : CKEDITOR.dialog.validate.notEmpty( 'Le lien doit avoir une adresse.' ),
                required : true,
                commit : function( data )
		{
			data.url = this.getValue();
		}
            },
            {
                type : 'text',
                id : 'caption',
                label : 'LIBELLE',
                validate : CKEDITOR.dialog.validate.notEmpty( 'Le lien doit avoir un libelle.' ),
                required : true,
                commit : function( data )
		{
			data.caption = this.getValue();
		}
            },
            {
                type : 'button',
                id : 'to_rubrique_btn',
                label : 'Lien vers une rubrique',
                onClick: function(){CKEDITOR.instances.editeur.openDialog('choixRubriqueDialog')}
            }/*,
            {
                type : 'button',
                id : 'to_document',
                label : 'Lien vers un document',
                onClick: uploadDocument
            },
            {
                type : 'button',
                id : 'to_document',
                label : 'Lien vers un document',
                onClick: uploadDocument
            }*/
            ]
        }
        ],
        onOk : function()
        {
            data = {};
            this.commitContent( data );
            link = editor.document.createElement( 'a' );
            link.setAttribute( 'href', data.url );
            link.setHtml(data.caption);
            editor.insertElement(link);
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
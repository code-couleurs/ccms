/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
        config.extraPlugins = 'cmslink';
        config.language = 'fr';
	config.toolbar_Standard = [['Bold','Italic','NumberedList','BulletedList', 'cmslink']];
        config.toolbar_Chapo = [['Bold','Italic','NumberedList','BulletedList', 'FontSize', 'cmslink']];
        
        config.toolbar_Advanced =
[
	{ name: 'document', items : [ 'Source'] }, 
	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
	{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
	{ name: 'links', items : [ 'cmslink'] },
	{ name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak','Iframe' ] },
	'/',
	{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
	{ name: 'colors', items : [ 'TextColor','BGColor' ] },
	{ name: 'tools', items : [ 'Maximize', 'ShowBlocks',] }
];
        
        config.toolbar = 'Standard';
        config.forcePasteAsPlainText = true;
};
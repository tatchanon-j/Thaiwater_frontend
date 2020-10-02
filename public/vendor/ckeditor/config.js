/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

// CKEDITOR.editorConfig = function( config ) {
// 	// Define changes to default configuration here. For example:
// 	// config.language = 'fr';
// 	// config.uiColor = '#AADC6E';
// };
CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
	{ name: 'z', groups: [ 'mode', 'document', 'doctools', 'Sourcedialog' ] },
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
	{ name: 'links', groups: [ 'links' ] },
	{ name: 'forms', groups: [ 'forms' ] },
	{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
	'/',
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	{ name: 'styles', groups: [ 'styles' ] },
	{ name: 'colors', groups: [ 'colors' ] },
	{ name: 'tools', groups: [ 'tools' ] },
	{ name: 'others', groups: [ 'others' ] },
	{ name: 'about', groups: [ 'about' ] },
	'/',


	];
	config.language = 'th';
	config.title = false;
	config.enterMode = CKEDITOR.ENTER_BR;
	config.removeButtons = 'Iframe,Save,NewPage,Preview,Print,Templates,Form,Checkbox,Radio,Textarea,TextField,Select,Button,ImageButton,HiddenField,Flash,ShowBlocks,Maximize,About,BidiLtr,BidiRtl,Language';
};

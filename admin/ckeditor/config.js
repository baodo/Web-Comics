/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	/*config.toolbar = [
		{name:'a',items:['Cut','Copy','Paste']}
	],*/
	config.skin='office2013',
	config.basicEntities = false,
    config.entities = false,
    config.allowedContent = true,
    config.fillEmptyBlocks = false,
    config.fullPage = false,
    config.enterMode = CKEDITOR.ENTER_BR,
	config.filebrowserBrowseUrl = DOMAIN+'ckfinder/ckfinder.html',
	config.filebrowserImageBrowseUrl = DOMAIN+'ckfinder/ckfinder.html?type=Images',
	config.filebrowserFlashBrowseUrl = DOMAIN+'ckfinder/ckfinder.html?type=Flash',
	config.filebrowserUploadUrl = DOMAIN+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	config.filebrowserImageUploadUrl = DOMAIN+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	config.filebrowserFlashUploadUrl = DOMAIN+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	
};

/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://cksource.com/ckfinder/license
*/

CKFinder.customConfig = function( config )
{
	// Define changes to default configuration here.
	// For the list of available options, check:
	// http://docs.cksource.com/ckfinder_2.x_api/symbols/CKFinder.config.html

	// Sample configuration options:
	// config.uiColor = '#BDE31E';
	// config.language = 'fr';
	// config.removePlugins = 'basket';
	//config.filebrowserBrowseUrl = '/browser/browse.php';
		config.allowedContent = true;
	config.extraAllowedContent = 'div(col-md-*,container-fluid,row)';
	config.extraAllowedContent = 'p(*)[*]{*};div(*)[*]{*};li(*)[*]{*};ul(*)[*]{*}';
	config.extraAllowedContent = 'style';
	config.removePlugins = 'stylescombo';
	config.removeButtons = 'Styles';
	config.autoParagraph = false;
};

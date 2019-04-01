define([
	'jquery'
], function($) {
	'use strict';

	return function (config, element) {
		alert('in hello1.js');
		alert(config.message);
	}
});
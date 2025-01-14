﻿CKEDITOR.plugins.add("wsc", {
	requires: "dialog",
	lang: "af,ar,bg,bn,bs,ca,cs,cy,da,de,el,en-au,en-ca,en-gb,en,eo,es,et,eu,fa,fi,fo,fr-ca,fr,gl,gu,he,hi,hr,hu,is,it,ja,ka,km,ko,lt,lv,mk,mn,ms,nb,nl,no,pl,pt-br,pt,ro,ru,sk,sl,sr-latn,sr,sv,th,tr,ug,uk,vi,zh-cn,zh",
	icons: "spellchecker",
	hidpi: !0,
	parseApi: function(a) {
		a.config.wsc_onFinish = "function" === typeof a.config.wsc_onFinish ? a.config.wsc_onFinish : function() {};
		a.config.wsc_onClose = "function" === typeof a.config.wsc_onClose ? a.config.wsc_onClose : function() {}
	},
	parseConfig: function(a) {
		a.config.wsc_customerId = a.config.wsc_customerId || CKEDITOR.config.wsc_customerId || "1:ua3xw1-2XyGJ3-GWruD3-6OFNT1-oXcuB1-nR6Bp4-hgQHc-EcYng3-sdRXG3-NOfFk";
		a.config.wsc_customDictionaryIds = a.config.wsc_customDictionaryIds || CKEDITOR.config.wsc_customDictionaryIds || "";
		a.config.wsc_userDictionaryName = a.config.wsc_userDictionaryName || CKEDITOR.config.wsc_userDictionaryName || "";
		a.config.wsc_customLoaderScript = a.config.wsc_customLoaderScript || CKEDITOR.config.wsc_customLoaderScript;
		a.config.wsc_interfaceLang =
			a.config.wsc_interfaceLang;
		CKEDITOR.config.wsc_cmd = a.config.wsc_cmd || CKEDITOR.config.wsc_cmd || "spell";
		CKEDITOR.config.wsc_version = "v4.3.0-master-d769233";
		CKEDITOR.config.wsc_removeGlobalVariable = !0
	},
	onLoad: function(a) {
		"moono-lisa" == (CKEDITOR.skinName || a.config.skin) && CKEDITOR.document.appendStyleSheet(CKEDITOR.getUrl(this.path + "skins/" + CKEDITOR.skin.name + "/wsc.css"))
	},
	init: function(a) {
		var b = CKEDITOR.env;
		this.parseConfig(a);
		this.parseApi(a);
		a.addCommand("checkspell", new CKEDITOR.dialogCommand("checkspell")).modes = {
			wysiwyg: !CKEDITOR.env.opera && !CKEDITOR.env.air && document.domain == window.location.hostname && !(b.ie && (8 > b.version || b.quirks))
		};
		"undefined" == typeof a.plugins.scayt && a.ui.addButton && a.ui.addButton("SpellChecker", {
			label: a.lang.wsc.toolbar,
			click: function(a) {
				var b = a.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? a.container.getText() : a.document.getBody().getText();
				(b = b.replace(/\s/g, "")) ? a.execCommand("checkspell"): alert("Nothing to check!")
			},
			toolbar: "spellchecker,10"
		});
		CKEDITOR.dialog.add("checkspell", this.path +
			(CKEDITOR.env.ie && 7 >= CKEDITOR.env.version ? "dialogs/wsc_ie.js" : window.postMessage ? "dialogs/wsc.js" : "dialogs/wsc_ie.js"))
	}
});
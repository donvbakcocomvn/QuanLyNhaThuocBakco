/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.toolbarGroups = [
        {name: 'document', groups: ['mode', 'document', 'doctools']},
        {name: 'clipboard', groups: ['clipboard', 'undo']},
        {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
        {name: 'forms', groups: ['forms']},
        {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
        {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
        {name: 'links', groups: ['links']},
        {name: 'insert', groups: ['insert']},
        {name: 'styles', groups: ['styles']},
        {name: 'colors', groups: ['colors']},
        {name: 'tools', groups: ['tools']},
        {name: 'others', groups: ['others']},
        {name: 'about', groups: ['about']}
    ];

    config.removeButtons = 'Save,NewPage,ExportPdf,Preview,Print,Templates,Find,Replace,Scayt,About';
    config.skin = 'office2013';
    config.filebrowserBrowseUrl = '/public/ckfinder/ckfinder.html?type=Images';
    config.filebrowserImageBrowseUrl = '/public/ckfinder/ckfinder.html?type=Images';
    config.filebrowserUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload';
    config.filebrowserImageUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload';
};

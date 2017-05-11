/**
* Wishdd Gdrive Document Embed 1.0
* Author  - Waqas Yousaf / Tehmina Aslam
* Website -  http://wishdd.com/
* Contact - waqas@wishdd.com
* License: GPLv2
*/

(function() {
    tinymce.PluginManager.add('wishdd_mce_button', function(editor, url) {
        editor.addButton('wishdd_mce_button', {
   title: 'WISHDD GDoc Embed',
            icon: 'icon dashicons-book',
            onclick: function() {
                editor.windowManager.open({
                    title: "Insert wishdd's Tabs",
                    body: [{
                        type: 'textbox',
                        name: 'docid',
                        label: 'Document ID',
                        value: ''
                    },
                    {
                        type: 'textbox',
                        name: 'download_text',
                        label: 'Download Button Text',
                        value: ''
                    }],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[wishdd_gdoc id="' +
                            e.data.docid + 
                            '" btn_txt="' +
                            e.data.download_text + 
                            '"]'
                        );
                    }
                });
            }
        });
    });
})();
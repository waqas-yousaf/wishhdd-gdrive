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
            icon: false,
            text: "GDoc Embed",
            onclick: function() {
                editor.windowManager.open({
                    title: "Insert wishdd's Tabs",
                    body: [{
                        type: 'textbox',
                        name: 'tab1title',
                        label: 'Tab One Title',
                        value: ''
                    },
                    {
                        type: 'textbox',
                        name: 'tab1content',
                        label: 'Tab One Content',
                        value: ''
                    },
                    {
                        type: 'textbox',
                        name: 'tab2title',
                        label: 'Tab Two Title',
                        value: ''
                    },
                    {
                        type: 'textbox',
                        name: 'tab2content',
                        label: 'Tab Two Content',
                        value: ''
                    },
                    {
                        type: 'textbox',
                        name: 'gallerysource',
                        label: 'Gallery source',
                        value: ''
                    },
                    {
                        type: 'textbox',
                        name: 'gallerytitle',
                        label: 'Gallery title',
                        value: ''
                    }],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[my_tabs][my_tab title="' +
                            e.data.tab1title + 
                            '"]' +
                            e.data.tab1content + 
                            '[/my_tab][my_tab title="' +
                            e.data.tab2title + 
                            '"][my_gallery source="' + 
                            e.data.gallerysource + 
                            '" title="' +
                            e.data.gallerytitle + 
                            '"]' +
                            e.data.tab2content + 
                            '[/my_tab][/my_tabs]'
                        );
                    }
                });
            }
        });
    });
})();
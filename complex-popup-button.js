(function() {
    tinymce.PluginManager.add('gavickpro_tc_button', function( editor, url ) {
        editor.addButton( 'gavickpro_tc_button', {
            title: 'WF Social Profile & Social Content Share',
            type: 'menubutton',
            icon: 'icon gavickpro-own-icon',
            menu: [
                {
                    text: 'Social Profile',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Social Profile Link',
                            body: [{
                                type: 'textbox',
                                name: 'title',
                                label: 'Your title',
                            },
							{
                                type: 'listbox', 
                                name: 'animation', 
                                label: 'Animation', 
                                'values': [
                                    {text: 'launchpad', value: 'launchpad'},
                                    {text: 'launchpadReverse', value: 'launchpadReverse'},
                                    {text: 'slideTop', value: 'slideTop'},
                                    {text: 'slideBottom', value: 'slideBottom'},
                                    {text: 'slideLeft', value: 'slideLeft'},
                                    {text: 'slideRight', value: 'slideRight'},
                                    {text: 'chain', value: 'chain'}
                                ]
                            },
							{
                                type: 'textbox',
                                name: 'cas',
                                label: 'chainAnimationSpeed'
                            },
							{
                                type: 'textbox',
                                name: 'profile_class',
                                label: 'Class'
                            }],
                            onsubmit: function( e ) {
                                editor.insertContent( '[socialprofile profile_class="'+ e.data.profile_class +'" animation="'+ e.data.animation +'"  chainAnimationSpeed="'+ e.data.cas +'" link=""]'+ e.data.title +'[/socialprofile]'  );
                            }
                        });
                    }
                },
                {
                    text: 'Social Content Share',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Social Content Share ShortCode',
                            body: [
                            {
                                type: 'textbox',
                                name: 'sts',
                                label: 'chainAnimationSpeed'
                            },
                            {
                                type: 'listbox', 
                                name: 'animationst', 
                                label: 'Animation', 
                                'values': [
                                    {text: 'launchpad', value: 'launchpad'},
                                    {text: 'launchpadReverse', value: 'launchpadReverse'},
                                    {text: 'slideTop', value: 'slideTop'},
                                    {text: 'slideBottom', value: 'slideBottom'},
                                    {text: 'slideLeft', value: 'slideLeft'},
                                    {text: 'slideRight', value: 'slideRight'},
                                    {text: 'chain', value: 'chain'}
                                ]
                            }],
                            onsubmit: function( e ) {
                                editor.insertContent( '[socialtext animation="'+ e.data.animationst +'" chainAnimationSpeed="'+ e.data.sts + '" social_site="facebook,twitter,google,pinterest,stumbleupon,delicious,friendfeed,digg,linkedin,reddit,yahoo,windows,tumblr,myspace,blogger"]Add Content Here[/socialtext]' );
                            }
                        });
                    }
                }
           ]
        });
    });
})();
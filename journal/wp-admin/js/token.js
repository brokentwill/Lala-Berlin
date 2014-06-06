(function($){
    $(document).ready( function() {
        var token = {
            user: '',
            pass: '',
            init: function(){
                this.loading();
                this.event();
            },
            event: function(){                
                $('.modals-token-update-api').remove();
                $('body').append(this.modal(this.update_token(), 'Update token Facebock'));
                $('.modals-token-update-api').modal();

                // when click update Api Facebock
                $('#btn-update-token').live('click', function(){
                    $.ajax({
                        url: window.baseUrl+'/wp-admin/token.php',
                        type: 'post',
                        dataType : 'json',
                        data:{
                            'type':'Facebock',
                            'token':'Update'
                        },
                        success: function(resp){
                            if ( typeof(resp) !='undefined' && typeof(resp.status) !='undefined' && resp.status && typeof(resp.url)!='undefined' )
                            {
                                window.location.href = resp.url;
                            }
                        }
                    })
                });

                this.loading(1);
            },
            update_token: function(){
                return  ('<div class="modals-message">Hello!Thoi han token cua ban da het vui long update lai</div>');
            },
            modal: function(html, title){
                var html = ('<div class="modal fade modals-token-update-api">')+
                                ('<div class="modal-dialog">')+
                                    ('<div class="modal-content">')+
                                        ('<div class="modal-header">')+
                                            ('<h4 class="modal-title">'+title+'</h4>')+
                                        ('</div>')+
                                        ('<div class="modal-body">')+
                                            (html)+
                                        ('</div>')+
                                        ('<div class="modal-footer">')+
                                            ('<button type="button" id="btn-update-token" name="token[update]" class="btn button-primary btn-update-token">Update token Facebock</button>')+
                                            ('<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>')+
                                        ('</div>')+
                                    ('</div>')+
                                ('</div>')+
                            ('</div>');
                return html;
            },
            loading: function(i){
                i = typeof(i) != 'undefined' ? i : false;
                if ( i )
                {
                    $('#loading').remove();
                }
                else
                {
                    $('body').append('<div id="loading"><div class="load"></div></div>');
                }
            }
        }
        // token.init();
    });
})(jQuery);

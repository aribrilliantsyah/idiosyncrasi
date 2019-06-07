var FormControls=function() {
    return {
        e:function() {
        $("#profile").validate( {
            rules: {
                email: {
                    required: !0, email: !0
                },
                name: {
                    required: !0
                }
            }
        })
    }
    }

}

();
jQuery(document).ready(function() {
    FormControls.e()
}

);




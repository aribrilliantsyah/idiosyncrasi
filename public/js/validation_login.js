var FormControls=function() {
    var e=function() {
        $("#login").validate( {
            rules: {
                email: {
                    required: !0, email: !0
                }
                , password: {
                    required: !0
                }

            }
        }
        )
    };
}

jQuery(document).ready(function() {
    FormControls.e()
}
);

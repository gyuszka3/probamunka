$(
    function () {
        $("button:eq(0)").on(
            'click', function (e) { 
                form_closer();
                $("form:eq(0)").toggleClass('d-none');
            }
        );
        $(".link").on(
            'click', function (e) { 
                $(".link").before('<input class="form-control mt-1" type="text" name="parts[]" pattern="[a-zA-Z-_/.]{0,}">');
            }
        );
        $("button:eq(1)").on(
            'click', function (e) { 
                form_closer();
                $("form:eq(1)").toggleClass('d-none');
            }
        );
        $("button:eq(2)").on(
            'click', function (e) { 
                form_closer();
                $("form:eq(2)").toggleClass('d-none');
            }
        );
        $("button:eq(3)").on(
            'click', function (e) { 
                form_closer();
                $("form:eq(3)").toggleClass('d-none');
            }
        );
        $("button:eq(4)").on(
            'click', function (e) { 
                form_closer();
                $("form:eq(4)").toggleClass('d-none');
            }
        );
    }
);
function form_closer()
{
    $("form").each(
        function (i) { 
            if(!$("form:eq("+i+")").hasClass('d-none')) {
                $("form:eq("+i+")").toggleClass('d-none');
            }
        }
    );
}


/**
 copyRight by Nsstheme
 */
(function ($)
{
    'use strict';

    var cBtn = $("#submit_btn");
    $('.error').hide();
    if (cBtn.length > 0) 
    {
        cBtn.on('click', function (e) 
        {
            e.preventDefault();
            
            //error hidden
            $('.error').hide();
            
            //error timeout
            setTimeout(function () {
                $('.error').fadeOut('slow');
            }, 2500);
            
            //username
            var name = $("input#uName").val();
            if (name === "") {
                $("label#name_error").show();
                return false;
            }
            //email
            var uemail = $("input#Uemail").val();
            if (uemail === "") {
                $('.error').show();
                return false;
            }
            //firstName
            var fName = $("input#nssTheme_ufName").val();
            if (fName === "") {
                $('.error').show();
                return false;
            }
            //lastName
            var lName = $("input#nssTheme_ulName").val();
            if (lName === "") {
                $('.error').show();
                return false;
            }
            //role
            var uRole = $("#nssRole").val();
            if (uRole === "") {
                $('.error').show();
                return false;
            }
            //password 
            var nPass = $("#password").val();
            var pAg = $("#password_again").val();

            //ajax request
            var required = 0;
            if (required === 0)
            {
                $.post(
                        nssUser_ajax.ajaxurl,
                        {
                            'action': 'nssTheme_registration_form',
                            'rgName': name,
                            'rgEmail': uemail,
                            'rgFname': fName,
                            'rgLname': lName,
                            'rgRole': uRole,
                            'rg_pass': nPass,
                            'rgPagin': pAg
                        },
                        function (data) 
                        {
                            var suc = $(".nssSumbit_view");                                      
                            suc.html(data); 
                        }//data
                    );
            }

        });
    }

    //password 
    $("#password_again").keyup(function ()
    {
        var nPass = $("#password").val();
        var pAg = $("#password_again").val();
        if (nPass !== pAg) 
        {
            $("#pass_confirm_error").html("Password is not Match");
            $("label#pass_confirm_error").show();
        } 
        else 
        {
            $("#pass_confirm_error").html("Password Match");
            $("label#pass_confirm_error").show();
        }
    });

})(jQuery);


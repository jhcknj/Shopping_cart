/**
 * Created by sll on 2017/9/23.
 */
$ (document).ready (function () {
//TODO 可以异步对登陆进行验证
    $ (".login").each (function () {
        $ (this).focus (function () {
            $ (this).addClass ("focus").removeAttr ("placeholder");
        });
        $ (this).blur (function () {
            $ (this).removeClass ("focus");
            var val = $ (this).val ();
            if ( val == "" ) {
                $ ("#tip").html ("用户名或密码不能为空!");
            }
        });
    });

});


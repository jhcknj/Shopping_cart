/**
 * Created by sll on 2017/9/26.
 */
$ (document).ready (function () {
    // $.post("../PHP/test.php",{author:"sll"});
    // $.post("test.php", { 'choices[]': ["Jon", "Susan"] });

    $.ajax ({
        method : "POST" ,
        url : "../PHP/test.php" ,
        data : { name : ['j' , 'n' , 'd'] }
    }).done (function (msg) {
        alert ("Data Saved: " + msg);
    });
});
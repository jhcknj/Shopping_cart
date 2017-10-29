/**
 * Created by sll on 2017/9/18.
 */
$(document).ready(function(){
    var type =null;
    var arr=[];
    //默认显示全部图书
    $("#books").load("../PHP/show_books.php", {types:type}, function () {//回调函数里传递ISBN
        $("button").each(function () {//ISBN存入cookie
            $(this).click(function () {
                var id=$(this).val();
                arr.push(id);
                var str=arr.join(",");
                document.cookie="ISBN="+str;
                //$.post("../PHP/cart_book_list.php", {ISBN:1234569});//ISBN为空????
            });
        });
    });

    $("span").each(function () {
        $(this).click(function () {
          type=$(this).next().val();//取得图书类型,分类展示
                 $("#books").load("../PHP/show_books.php",{types:type},function () {//对jQuery.ajax异步创建的html元素的绑定事件 必须在success里绑定 否则无效
                     $("button").each(function () {//ISBN存入cookie
                         $(this).click(function () {
                             var id=$(this).val();
                             arr.push(id);
                             var str=arr.join(",");
                             document.cookie="ISBN="+str;
                             //$.post("../PHP/cart_book_list.php", {ISBN:id});
                         });
                     });
                 });
        });//span.click()结束
    });




});
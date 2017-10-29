/**
 * Created by sll on 2017/10/17.
 */
$(document).ready(function () {
    var total =0;
    var current=0;
    var inputs=$("tr td:last-child input");
    var Unit=$("tr td:nth-last-child(2) ");
    $(Unit).each(function (index,item) {//单位价格总和
        var unit;
        if($("input[type='checkbox']").attr("checked") ){
            unit=parseFloat($(item).text());
        }else {
            unit=0;
        }
        total+=parseFloat(unit);
        $("#purchase").text (total);
    });

    $("#editable").click(function () {//编辑物品数量
        $ (".add").attr ("disabled" , false);
        $ (".dec").attr ("disabled" , false);
        $("#editable").attr ("disabled" , true);
        $(inputs).each(function (index,item) {
            var q=$(item).filter(".text ").val();// 数量值
            $(item).next().click(function () {//数量 +
                $(item).attr("value",parseInt(++q));
                current+= parseFloat($(item).closest("td").prev().text());
                total+=parseFloat(current);
                current=0;
                $("#purchase").text (total);
            });

            $(item).prev().click(function () {//数量 -
                if(q>0){
                    $(item).attr("value",parseInt(--q));
                    current-= parseFloat($(item).closest("td").prev().text());
                    total+=parseFloat(current);
                    current=0;
                    $("#purchase").text (total);
                }
            });
        });
    });
});

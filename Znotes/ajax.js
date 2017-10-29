/**
 * Created by PhpStorm.
 * User: sll
 * Date: 2017/9/27
 * Time: 10:49
 */

// send的方法接收一个参数，需要请求发送的数据，如果请求不需要发送数据，需要传送一个null，因为对于有些浏览器这是必须的；上面第三个参数传的是false，是同步请求，服务器接收到响应后再继续执行后面的代码，响应后的数据会自动填充XHR对象的属性，XHR有以下属性：
//
// responseText: 作为响应主体被返回的文本。
//
// responseXML: 如果响应的内容是”text/xml” 或 “application/xml”,这个属性将保存包含响应数据的XML DOM文档；
//
// status: 响应http状态；
//
// statusText: http状态说明；

function createXHR () {
    var xhr;
    if ( window.XMLHttpRequest ) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xhr = new XMLHttpRequest ();
    } else { // code for IE6, IE5
        xhr = new ActiveXObject ("Microsoft.XMLHTTP");
    }
    return xhr;
}

var xhr = createXHR ();
xhr.open ('get' , 'http://127.0.0.1/ajax/ajax.php' , false);
xhr.send (null);
xhr.onreadystatechange = function () {
    if ( xhr.readyState == 4 ) {
        //4：完成。已经接收到全部响应数据，而且可以在客户端使用了；
        if ( (xhr.status >= 200 && xhr.status < 300) || xhr.status == 304 ) {
            console.log (xhr.responseText);
        } else {
            console.log (xhr.status);
        }
    }
};


function serialize (form) {
    var arrs = [] ,
        field = null ,
        i ,
        len ,
        j ,
        optLen ,
        option ,
        optValue;
    for ( i = 0, len = form.elements.length ; i < len ; i++ ) {
        field = form.elements[i];
        switch ( field.type ) {
            case "select-one":
            case "select-multiple":
                if ( field.name.length ) {
                    for ( j = 0, optLen = field.options.length ; j < optLen ; j++ ) {
                        option = field.options[j];
                        if ( option.selected ) {
                            optValue = '';
                            if ( option.hasAttribute ) {
                                optValue = option.hasAttribute ("value") ? option.value : option.text;
                            } else {
                                optValue = option.attributes["value"].specified ? option.value : option.text;
                            }
                            arrs.push (encodeURIComponent (field.name) + "=" + encodeURIComponent (optValue));
                        }
                    }
                }
                break;
            case undefined: //字段集
            case "file": // 文件输入
            case "submit": // 提交按钮
            case "reset": // 重置按钮
            case "button": // 自定义按钮
                break;
            case "radio": // 单选框
            case "checkbox": // 复选框
                if ( !field.checked ) {
                    break;
                }
            /* 执行默认动作 */
            default:
// 不包含没有名字的表单字段
                if ( field.name.length ) {
                    arrs.push (encodeURIComponent (field.name) + "=" + encodeURIComponent (field.value));
                }
        }
    }
    return arrs.join ("&");
}
var url = "http://127.0.0.1/ajax/ajax.php";
xhr.open ('post' , "http://127.0.0.1/ajax/ajax.php" , true);
xhr.setRequestHeader ("Content-Type" , "application/x-www-form-urlencoded");
var form = document.getElementById ("form");
xhr.send (serialize (form));


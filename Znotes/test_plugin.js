/**
 * Created by sll on 2017/9/23.
 */
/*
 根据《jQuery高级编程》的描述，jQuery插件开发方式主要有三种：
 1.通过$.extend()来扩展jQuery
 2.通过$.fn 向jQuery添加新的方法
 3. 通过$.widget()应用jQuery UI的部件工厂方式创建
 */

//1.
$.extend({
    sayHello:function (name) {
        console.log("hello,"+(name?name:'Dude')+"!");
    }
});
$.sayHello();
$.sayHello('sll');

//2.
$.fn.pluginName = function () {
        //your code goes here
};
$.fn.Myplugin =function () {
    //在这里面,this指的是用jQuery选中的元素,//this,指向jquery对象(jquery选择器返回的集合),也就是调用Myplugin插件的元素集,
    //example :$('a'),则this=$('a')

    this.css('color', 'red');
    // 下一步.在插件代码里处理每个具体的元素，而不是对一个集合进行处理，这样我们就可以针对每个元素进行相应操作。
    this.each(function () {
        //对每个元素进行操作,在each方法内部，this指带的是普通的DOM元素了，如果需要调用jQuery的方法那就需要用$来重新包装一下。
        $(this).append(' '+$(this).attr('href')).append("ppppppp");
    });
};
//支持链式调用??????
$.fn.myPlugin = function() {
    //在这里面,this指的是用jQuery选中的元素
    this.css('color', 'red');
    return this.each(function() {
        //对每个元素进行操作
        $(this).append(' ' + $(this).attr('href'));
    });
};



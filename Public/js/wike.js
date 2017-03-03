/**
 * Created by Liberty on 2015/8/28.
 */
$(function(){
    $("#file-a").change(function(){
        var filename=$("#file-a").val().split("\\").pop();
        // alert(filename);
        // var filename=$(":file").attr("value");
        // alert(filename);
        // var filename=$("#file-a").attr("value");

        var span="<div><span class='glyphicon glyphicon-file'></span>x</div>";
        var str=span.replace('x',filename);
        if(typeof(filename)!="undefined"){
            $("#input0a div").remove();
            $("#input0a").prepend(str);
        }
        // var file=$("#file-a").val();
        // var fileName=getFileName(file);
        // $("#input0a").prepend("<span class='glyphicon glyphicon-file'></span>");
        $("#btn1").click(function () {
            var x = new Number($("#table1 tbody tr").length).toString();
            var name1 = "course[chapter][x][chname]";
            var str1 = name1.replace('x', x);
            var name2 = "course[chapter][x][describtion]";
            var str2 = name2.replace('x', x);
            $("#table1").append("<tr> <td><input type='text' value=''></td><td><textarea rows='2' wrap='hard'></textarea></td></tr>");
            var att1 = document.createAttribute("name");
            att1.value = str1;
            var att2 = document.createAttribute("name");
            att2.value = str2;
            var tr1 = $("#table1 tbody tr").last().find("input");
            tr1.attr("name", str1);
            var tr2 = $("#table1 tbody tr").last().find("textarea");
            tr2.attr("name", str2);
        });
        $("#btn2").click(function () {
            $("#table1 tbody tr").last().remove();
        });
    });
    var eDropFrameChange=function(){
        $("#select1").val($(this).children("option:selected").attr("parentid"));
    };
    var eDropLangChange=function(){
        var selectedValue=$(this).val();
        $("#select2").children("span").each(function(){
            $(this).children().clone().replaceAll($(this));
        });
        if(parseInt(selectedValue)!=0){
            $("#select2").children("option[parentid!='"+selectedValue+"'][value!='0']").each(function(){
                $(this).wrap("<span style='display: none'></span>");
            });
        }
    };
    $("#select1").unbind("change",eDropLangChange).bind("change",eDropLangChange);
    $("#select2").unbind("change",eDropFrameChange).bind("change",eDropFrameChange);

    (function($) {
        $.fn.timepicker = function(options) {
            var defaults = {};
            var settings = $.extend({},
                defaults, options);
            return this.each(function() {
                var ele = $(this);
                var ele_hei = ele.outerHeight();
                var ele_lef = ele.position().left-20;
                ele_hei += 15;
                $(ele).wrap("<div class='time_pick'>");
                var ele_par = $(this).parents(".time_pick");
                ele_par.append("<div class='timepicker_wrap'><div class='arrow_top'></div><div class='time'><div class='prev'></div><div class='ti_tx'></div><div class='next'></div></div><div class='mins'><div class='prev'></div><div class='mi_tx'></div><div class='next'></div></div><div class='second'><div class='prev'></div><div class='sec_tx'></div><div class='next'></div></div></div>");
                var ele_next = $(this).next(".timepicker_wrap");
                var ele_next_all_child = ele_next.find("div");
                ele_next.css({
                    "top": ele_hei + "px",
                    "left": ele_lef + "px"
                });
                $(document).on("click",
                    function(event) {
                        if (!$(event.target).is(ele_next)) {
                            if (!$(event.target).is(ele)) {
                                var tim = ele_next.find(".ti_tx").html();
                                var mini = ele_next.find(".mi_tx").text();
                                var seri = ele_next.find(".sec_tx").text();
                                if (tim.length != 0 && mini.length != 0 && seri.length != 0) {
                                    var str=tim + " : " + mini + " : " + seri;
                                    ele.val(str);
                                }
                                if (!$(event.target).is(ele_next) && !$(event.target).is(ele_next_all_child)) {
                                    ele_next.fadeOut()
                                }
                            } else {
                                set_date();
                                ele_next.fadeIn()
                            }
                        }
                    });
                function set_date() {
                    var ti = 0;
                    var mi = 0;
                    var se = 0;
                    if (ti < 10) {
                        ele_next.find(".ti_tx").text("0" + ti)
                    } else {
                        ele_next.find(".ti_tx").text(ti)
                    }
                    if (mi < 10) {
                        ele_next.find(".mi_tx").text("0" + mi)
                    } else {
                        ele_next.find(".mi_tx").text(mi)
                    }
                    if (se < 10) {
                        ele_next.find(".sec_tx").text("0" + se)
                    } else {
                        ele_next.find(".sec_tx").text(se)
                    }
                }
                var cur_next = ele_next.find(".next");
                var cur_prev = ele_next.find(".prev");
                $(cur_prev).add(cur_next).on("click",
                    function() {
                        var cur_ele = $(this);
                        var cur_cli = null;
                        var ele_st = 0;
                        var ele_en = 0;
                        if (cur_ele.parent().attr("class") == "time") {
                            cur_cli = "time";
                            ele_en = 12;
                            var cur_time = null;
                            cur_time = ele_next.find("." + cur_cli + " .ti_tx").text();
                            cur_time = parseInt(cur_time);
                            if (cur_ele.attr("class") == "next") {
                                if (cur_time == 12) {
                                    // ele_next.find("." + cur_cli + " .ti_tx").text("01")
                                    cur_time++;
                                } else {
                                    cur_time++;
                                    if (cur_time < 10) {
                                        ele_next.find("." + cur_cli + " .ti_tx").text("0" + cur_time)
                                    } else {
                                        ele_next.find("." + cur_cli + " .ti_tx").text(cur_time)
                                    }
                                }
                            } else {
                                if (cur_time == 1) {
                                    ele_next.find("." + cur_cli + " .ti_tx").text("00")
                                } else {
                                    if (cur_time>0) {
                                        cur_time--;
                                        if (cur_time < 10) {
                                            ele_next.find("." + cur_cli + " .ti_tx").text("0" + cur_time)
                                        } else {
                                            ele_next.find("." + cur_cli + " .ti_tx").text(cur_time)
                                        }
                                    }
                                }
                            }
                        } else if (cur_ele.parent().attr("class") == "mins") {
                            cur_cli = "mins";
                            cur_cti="time";
                            ele_en = 59;
                            var cur_mins = null;
                            cur_mins = ele_next.find("." + cur_cli + " .mi_tx").text();
                            cur_mins = parseInt(cur_mins);
                            if (cur_ele.attr("class") == "next") {
                                if (cur_mins == 59) {
                                    ele_next.find("." + cur_cli + " .mi_tx").text("00");
                                    var cur_time = ele_next.find("." + cur_cti + " .ti_tx").text();
                                    cur_time = parseInt(cur_time)+1;
                                    ele_next.find(".ti_tx").text(cur_time<10?("0"+cur_time):cur_time);
                                } else {
                                    cur_mins++;
                                    if (cur_mins < 10) {
                                        ele_next.find("." + cur_cli + " .mi_tx").text("0" + cur_mins)
                                    } else {
                                        ele_next.find("." + cur_cli + " .mi_tx").text(cur_mins)
                                    }
                                }
                            } else {
                                if (cur_mins == 0) {
                                    ele_next.find("." + cur_cli + " .mi_tx").text(59)
                                } else {
                                    cur_mins--;
                                    if (cur_mins < 10) {
                                        ele_next.find("." + cur_cli + " .mi_tx").text("0" + cur_mins)
                                    } else {
                                        ele_next.find("." + cur_cli + " .mi_tx").text(cur_mins)
                                    }
                                }
                            }
                        } else {
                            cur_cli = "second";
                            cur_cmi = "mins";
                            ele_en = 59;
                            var cur_secs = null;
                            cur_secs = ele_next.find("." + cur_cli + " .sec_tx").text();
                            cur_secs = parseInt(cur_secs);
                            if (cur_ele.attr("class") == "next") {
                                if (cur_secs == 59) {
                                    ele_next.find("." + cur_cli + " .sec_tx").text("00")
                                    var cur_mins=ele_next.find(".mi_tx").text();
                                    cur_mins=parseInt(cur_mins)+1;
                                    ele_next.find(".mi_tx").text(cur_mins<10?("0"+cur_mins):cur_mins);
                                } else {
                                    cur_secs++;
                                    if (cur_secs < 10) {
                                        ele_next.find("." + cur_cli + " .sec_tx").text("0" + cur_secs)
                                    } else {
                                        ele_next.find("." + cur_cli + " .sec_tx").text(cur_secs)
                                    }
                                }
                            } else {
                                if (cur_secs == 0) {
                                    ele_next.find("." + cur_cli + " .sec_tx").text(59)
                                } else {
                                    cur_secs--;
                                    if (cur_secs < 10) {
                                        ele_next.find("." + cur_cli + " .sec_tx").text("0" + cur_secs)
                                    } else {
                                        ele_next.find("." + cur_cli + " .sec_tx").text(cur_secs)
                                    }
                                }
                            }
                        }
                    })
            })
        }
    } (jQuery));


    $('#checkboxInput').click(function(){
        if (this.checked){
            $('.questionContainer').css({
                "opacity":1,
                //"visibility":"visible",
                "display":"block"
            });
        }else {
            $('.questionContainer').css({
                "opacity":0,
                //"visibility":"hidden",
                "display":"none"
            });
        }
    });


});
function optionPlus(index){
    var id="#optionsteam"+index;
    var num=$(id).children(".input-group").length;
    var name1 = "options["+index+"]"+"["+num+"]";
    //name1 = name1.replace('x', num);
    var optionNo=String.fromCharCode(65+num);
    var divstr="<div class='input-group'" +"id='"+name1+"'"+
        "><span class='input-group-addon' style='font-weight: bold'>" +optionNo+
        "</span><input class='form-control' placeholder='请输入选项内容' name='options["+index+"]"+"["+num+"]'"+
        "'/></div>";
    $(id).append(divstr);
    var divoption="<option>"+optionNo+"</option>";
    var answerid="#answer"+index;
    $(answerid).append(divoption);
}
function optionMinus(index){
    var id="#optionsteam"+index;
    var answerid="#answer"+index;
    var num=$(id).children(".input-group").length;
    if (num>1){
        $(id).children(".input-group").last().remove();
        $(answerid).children("option").last().remove();
    }
}

function questionTypeSelect(index,value){
    var id="#questiontype"+index;
    var ids="#trash"+index;
    //var selectedText=$(id).find("option:selected").val();
    switch (value){
        case "0":{
            var exist=$(ids).next("hr").next("table").length;
            if (exist>0){
                $(ids).next("hr").next("table").remove();
            }
            break;
        }
        case "1":{
            var exist=$(ids).next("hr").next("table").length;
            if (exist>0){
                $(ids).next("hr").next("table").replaceWith(
                    "<table class='table table-bordered'>" +
                    "<tbody>" +
                    "<tr>" +
                    "<td>时间点</td><td>题干</td><td>选项<span id='optionsplus' onclick='optionPlus("+index+")'>" +
                    "<i class='fa fa-plus-circle fa-2x'></i>点击添加选项</span><span id='optionsminus' onclick='optionMinus("+index+")'>" +
                    "<i class='fa fa-minus-circle fa-2x'></i>点击减少选项</span></td>" +
                    "<td>答案</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td><input id='timepickerBox"+index+
                    "' class='timepickerBox' type='text' name='time["+index+"]' value='请点击我选择时间！'/></td>" +
                    "<td><textarea class='form-control' rows='3' cols='40' placeholder='请输入问题内容' name='cvcontent["+index+"]'></textarea></td>" +
                    "<td id='optionsteam"+index+"'> <div class='input-group' id='options["+index+"]"+"[0]'> <span class='input-group-addon' style='font-weight: bold'>A </span> <input class='form-control' placeholder='请输入选项内容' name='options["+index+"]"+"[0]'/> </div> </td>" +
                    "<td style='width:100px'> <select class='form-control' id='answer"+index+"' name='answer["+index+"]'> <option>A</option> </select> </td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>题目解析：</td>" +
                    "<td colspan='3'><textarea rows='3' class='form-control' placeholder='请输入内容' name='cvanalysis["+index+"]'/></td>"+
                    "</tr>"+
                    "</tbody>" +
                    "</table>"+"<script>$('#timepickerBox"+index+"').timepicker();</script>"
                );
            }else {
                $(ids).next("hr").after(
                    "<table class='table table-bordered'>" +
                    "<tbody>" +
                    "<tr>" +
                    "<td>时间点</td><td>题干</td><td>选项<span id='optionsplus' onclick='optionPlus("+index+")'>" +
                    "<i class='fa fa-plus-circle fa-2x'></i>点击添加选项</span><span id='optionsminus' onclick='optionMinus("+index+")'>" +
                    "<i class='fa fa-minus-circle fa-2x'></i>点击减少选项</span></td>" +
                    "<td>答案</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td><input id='timepickerBox" +index+
                    "' class='timepickerBox' type='text' name='time["+index+"]' value='请点击我选择时间！'/></td>" +
                    "<td><textarea class='form-control' rows='3' cols='40'  placeholder='请输入问题内容' name='cvcontent["+index+"]'></textarea></td>" +
                    "<td id='optionsteam"+index+"'> <div class='input-group' id='options["+index+"]"+"[0]'><span class='input-group-addon' style='font-weight: bold'>A </span> <input class='form-control' placeholder='请输入选项内容' name='options["+index+"]"+"[0]'/> </div> </td>" +
                    "<td style='width:100px'> <select class='form-control' id='answer"+index+"' name='answer["+index+"]'> <option>A</option> </select> </td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>题目解析：</td>" +
                    "<td colspan='3'><textarea rows='3' class='form-control' placeholder='请输入内容' name='cvanalysis["+index+"]'/></td>"+
                    "</tr>"+
                    "</tbody>" +
                    "</table>"+"<script>$('#timepickerBox"+index+"').timepicker();</script>"
                );
            }

            //$("#answer").removeAttr("multiple");
            break;
        }
        case "2":{
            var exist=$(ids).next("hr").next("table").length;
            if (exist>0){
                $(ids).next("hr").next("table").replaceWith(
                    "<table class='table table-bordered'>" +
                    "<tbody>" +
                    "<tr>" +
                    "<td>时间点</td><td>题干</td><td>选项<span id='optionsplus' onclick='optionPlus("+index+")'>" +
                    "<i class='fa fa-plus-circle fa-2x'></i>点击添加选项</span><span id='optionsminus' onclick='optionMinus("+index+")'>" +
                    "<i class='fa fa-minus-circle fa-2x'></i>点击减少选项</span></td>" +
                    "<td>答案<span class='tips' style='display: inline'>(多选题答案请按住Ctrl键来选择多个选项)</span></td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td><input id='timepickerBox"+index +
                    "' class='timepickerBox' type='text' name='time["+index+"]' value='请点击我选择时间！'/></td>" +
                    "<td><textarea class='form-control' rows='3' placeholder='请输入问题内容' name='cvcontent["+index+"]'></textarea></td>" +
                    "<td id='optionsteam"+index+"'> <div class='input-group' id='options["+index+"]"+"[0]'> <span class='input-group-addon' style='font-weight: bold'>A </span> <input class='form-control' placeholder='请输入选项内容' name='options["+index+"]"+"[0]'/> </div> </td>" +
                    "<td style='width:100px'> <select class='form-control' id='answer"+index+"' name='answer["+index+"][]' multiple> <option>A</option> </select> </td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>题目解析：</td>" +
                    "<td colspan='3'><textarea rows='3' class='form-control' placeholder='请输入内容' name='cvanalysis["+index+"]'/></td>"+
                    "</tr>"+
                    "</tbody>" +
                    "</table>"+"<script>$('#timepickerBox"+index+"').timepicker();</script>"
                );
            }else {
                $(ids).next("hr").after(
                    "<table class='table table-bordered'>" +
                    "<tbody>" +
                    "<tr>" +
                    "<td>时间点</td><td>题干</td><td>选项<span id='optionsplus' onclick='optionPlus("+index+")'>" +
                    "<i class='fa fa-plus-circle fa-2x'></i>点击添加选项</span><span id='optionsminus' onclick='optionMinus("+index+")'>" +
                    "<i class='fa fa-minus-circle fa-2x'></i>点击减少选项</span></td>" +
                    "<td>答案<span class='tips' style='display: inline'>(多选题答案请按住Ctrl键来选择多个选项)</span></td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td><input id='timepickerBox" +index+
                    "' class='timepickerBox' type='text' name='time["+index+"]' value='请点击我选择时间！'/></td>" +
                    "<td><textarea class='form-control' rows='3' placeholder='请输入问题内容' name='cvcontent["+index+"]'></textarea></td>" +
                    "<td id='optionsteam"+index+"'> <div class='input-group' id='options["+index+"]"+"[0]'><span class='input-group-addon' style='font-weight: bold'>A </span> <input class='form-control' placeholder='请输入选项内容' name='options["+index+"]"+"[0]'/> </div> </td>" +
                    "<td style='width:100px'> <select class='form-control' id='answer"+index+"' name='answer["+index+"][]' multiple> <option>A</option> </select> </td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>题目解析：</td>" +
                    "<td colspan='3'><textarea rows='3' class='form-control' placeholder='请输入内容' name='cvanalysis["+index+"]'/></td>"+
                    "</tr>"+
                    "</tbody>" +
                    "</table>"+"<script>$('#timepickerBox"+index+"').timepicker();</script>"
                );
            }
            break;
        }
        case "3":{
            var exist=$(ids).next("hr").next("table").length;
            if (exist>0){
                $(ids).next("hr").next("table").replaceWith(
                    "<table class='table table-bordered'>" +
                    "<tbody>" +
                    "<tr>" +
                    "<td>时间点</td><td>题干<div class='tips'>(需要填写答案的地方请用“<b>______</b>”)</div></td><td>答案<span id='optionsplus' onclick='optionPlus("+index+")'>" +
                    "<i class='fa fa-plus-circle fa-2x'></i>点击添加选项</span><span id='optionsminus' onclick='optionMinus("+index+")'>" +
                    "<i class='fa fa-minus-circle fa-2x'></i>点击减少选项</span><div class='tips'>(若一个空有多个参考答案，则每个答案之间需用‘<b>|||</b>’分割，学生答案匹配其中一个参考答案就算正确)</div></td>" +
                    //"<td>答案<span class='tips' style='display: inline'>(多选题答案请按住Ctrl键来选择多个选项)</span></td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td><input id='timepickerBox"+index +
                    "' class='timepickerBox' type='text' name='time["+index+"]' value='请点击我选择时间！'/></td>" +
                    "<td><textarea class='form-control' rows='3' placeholder='请输入问题内容' name='cvcontent["+index+"]'></textarea></td>" +
                    "<td id='optionsteam"+index+"'> <div class='input-group' id='options["+index+"]"+"[0]'> <span class='input-group-addon' style='font-weight: bold'>A </span> <input class='form-control' placeholder='请输入选项内容' name='options["+index+"]"+"[0]'/> </div> </td>" +
                    //"<td style='width:100px'> <select class='form-control' id='answer"+index+"' name='answer["+index+"]' multiple> <option>A</option> </select> </td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>题目解析：</td>" +
                    "<td colspan='2'><textarea rows='3' class='form-control' placeholder='请输入内容' name='cvanalysis["+index+"]'/></td>"+
                    "</tr>"+
                    "</tbody>" +
                    "</table>"+"<script>$('#timepickerBox"+index+"').timepicker();</script>"
                );
            }else {
                $(ids).next("hr").after(
                    "<table class='table table-bordered'>" +
                    "<tbody>" +
                    "<tr>" +
                    "<td>时间点</td><td>题干<div class='tips'>(需要填写答案的地方请用“<b>______</b>”)</div></td><td>答案<span id='optionsplus' onclick='optionPlus("+index+")'>" +
                    "<i class='fa fa-plus-circle fa-2x'></i>点击添加选项</span><span id='optionsminus' onclick='optionMinus("+index+")'>" +
                    "<i class='fa fa-minus-circle fa-2x'></i>点击减少选项</span><div class='tips'>(若一个空有多个参考答案，则每个答案之间需用‘<b>|||</b>’分割，学生答案匹配其中一个参考答案就算正确)</div></td>" +
                        //"<td>答案<span class='tips' style='display: inline'>(多选题答案请按住Ctrl键来选择多个选项)</span></td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td><input id='timepickerBox"+index +
                    "' class='timepickerBox' type='text' name='time["+index+"]' value='请点击我选择时间！'/></td>" +
                    "<td><textarea class='form-control' rows='3' placeholder='请输入问题内容' name='cvcontent["+index+"]'></textarea></td>" +
                    "<td id='optionsteam"+index+"'> <div class='input-group' id='options["+index+"]"+"[0]'> <span class='input-group-addon' style='font-weight: bold'>A </span> <input class='form-control' placeholder='请输入选项内容' name='options["+index+"]"+"[0]'/> </div> </td>" +
                        //"<td style='width:100px'> <select class='form-control' id='answer"+index+"' name='answer["+index+"]' multiple> <option>A</option> </select> </td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>题目解析：</td>" +
                    "<td colspan='2'><textarea rows='3' class='form-control' placeholder='请输入内容' name='cvanalysis["+index+"]'/></td>"+
                    "</tr>"+
                    "</tbody>" +
                    "</table>"+"<script>$('#timepickerBox"+index+"').timepicker();</script>"
                );
            }
            break;
        }
    }
}
function addTableBox(){
    var num=$("#questionBox").children(".tableboxContainer").length;
    var i=num+1;
    var str="";
    //if (num>0){
    //}else {
    //    str="style='display:none'";
    //}
    var tableboxstr="<div class='tableboxContainer'><h4>题目"+i+"</h4> " +
        "<label style='margin-bottom: 10px'><span style='color: red;'>*</span>题型</label> " +
        "<select class='form-control' style='display: inline-block;width: auto' name='cytype[" +num+
        "]' id='questiontype" +num+
        "' onchange='questionTypeSelect(" +num+
        ",this.options[this.options.selectedIndex].value)'>" +
        "<option value='0'>请选择一种题型</option> " +
        "<option value='1'>单选题</option> " +
        "<option value='2'>多选题</option>" +
        "<option value='3'>填空题</option>" +
        "</select><span class='trash'id='trash" +num+
        "'"+str +
        "><i class='glyphicon glyphicon-trash'></i>删除</span>" +
        "<hr/></div>";
    $('#addTableBtn').before(tableboxstr);
}
function deleteTable(index){

}
function submitData(url,jumpurl){
    //var length=$("#questionBox").length;
    var datastr=$("#formdata").serialize();
    alert(datastr);
    $.post(
        url,
        datastr,
        function(data){
            if (data.status==0){
                alert("添加成功");
                window.location.replace(jumpurl);
            }else {
                alert("添加失败，请稍后重试。")
            }
        },
        "json"
    );
    //$("#test").html($("#formdata").serialize());
    //alert($("#formdata").serialize());
}
//$(document).ready(function() {
//
//});
//$(function(){
//
//});
//
//
//
//$(function(){
//    //if ($("#checkboxlabel").attr("left")==26){
//    //    $(".questionContainer").css({
//    //        opacity:1
//    //    });
//    //}
//
//});

//function changeImgCover(){
//    $("#file")
//}


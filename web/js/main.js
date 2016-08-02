/**
 * Created by zhevgeniy on 02.08.16.
 */
$(function () {
    $('.treeview').dblclick(function () {
        window.location.href = $(this).children().first().attr('href');
    });
});
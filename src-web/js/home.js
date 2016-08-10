/// <reference path="jquery.d.ts" />
$(function () {
    var $baseCategory = $('.chose-base-category');
    var $categoryToSet = $('.chose-base-category-display');
    var baseCategoryAlias = $baseCategory.val();
    // if (baseCategoryAlias) {
    //     setCategoryAlias($categoryToSet, baseCategoryAlias);
    // }
    $baseCategory.on('change', function () {
        $.get('/article-category/alias-by-id', {id: $(this).val()}, function (alias) {
            setCategoryAlias($categoryToSet, alias);
        });
    });
    $('body').on('change', '#articlerecord-type_id', function () {
        $('.pjax-select-link').click();
    });
    $('body').on('click', '.pjax-select-link', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/article/create',
            dataType: "html",
            data: $('#create-article-from').serialize(),
            success: function (result) {
                $('.article-record-form').html('');
                $('.article-record-form').append(result);
            }
        });
    });

    $('.category-list .item-button-collapse').on('click', function () {
        
        var $collapseTarget = $(this).siblings('.category-list');
        if ($collapseTarget.hasClass('in')) {
            animateRotate($(this).find('i'), 0, -90);
        } else {
            animateRotate($(this).find('i'), -90, 0);
        }
        $collapseTarget.collapse('toggle');

    });
    $('.category-list .item-button').not('.item-button-collapse').not('.toggle-all').on('click', function (e) {
        window.location.href = $(this).find('a').attr('href');

    });
    $('.toggle-all').on('click', function () {
        if ($(this).hasClass('toggle-hide')) {
            $('.category-list .category-list.in').each(function () {
                $(this).collapse('hide')
                $('.item-button-collapse').find('i').each(function () {

                    if ($(this).css('transform')) {

                        animateRotate($(this), 0, -90);
                    }
                });
            });


        } else {
            $('.category-list .category-list:not(.in)').each(function () {
                $(this).collapse('show');
                $('.item-button-collapse').find('i').each(function () {
                    if ($(this).css('transform')) {
                        animateRotate($(this), -90, 0);

                    }
                });
            });
        }
        $(this).toggleClass('toggle-hide');

    });


    $('.category-list .item-button').each(function () {
        var parentsCount = $(this).parents('.category-list').length;

        var paddingLeft = (parentsCount) * parseInt($(this).css('padding-left'));
        var backColor = $(this).css('background-color');
        var newColor = shadeRGBColor(backColor, 0.06 * (parentsCount - 1));
        $(this).css('background-color', newColor);
        $(this).hover(function () {
            $(this).css('background-color', shadeRGBColor(shadeRGBColor(newColor, 0.1), 0.06 * (parentsCount)));
        }, function () {
            $(this).css('background-color', newColor);
        });


        $(this).not('.item-button-collapse').css('padding-left', paddingLeft);
    });

    $('.sidebar-header').on('click', function () {

        var collapseTarget = $(this).attr('data-target');
        var $collapseTarget = $(collapseTarget);

        if ($collapseTarget.hasClass('in')) {
            $collapseTarget.collapse('hide');
        } else {
            $('.side-menu.collapse.in').collapse('hide');
            $collapseTarget.collapse('show')
        }
    });

});
function setCategoryAlias($categoryAlias, selectedCategoryAlias) {
    $categoryAlias.val(selectedCategoryAlias);
}
function shadeRGBColor(color, percent) {
    var f = color.split(","), t = percent < 0 ? 0 : 255, p = percent < 0 ? percent * -1 : percent, R = parseInt(f[0].slice(4)), G = parseInt(f[1]), B = parseInt(f[2]);
    return "rgb(" + (Math.round((t - R) * p) + R) + "," + (Math.round((t - G) * p) + G) + "," + (Math.round((t - B) * p) + B) + ")";
}
function animateRotate($elem, angle1, angle2) {
    // caching the object for performance reasons


    // we use a pseudo object for the animation
    // (starts from `0` to `angle`), you can name it as you want
    $({deg: angle1}).animate({deg: angle2}, {
        duration: 200,
        step: function (now) {
            // in the step-callback (that is fired each step of the animation),
            // you can use the `now` paramter which contains the current
            // animation-position (`0` up to `angle`)
            $elem.css({
                transform: 'rotate(' + now + 'deg)'
            });
        }
    });
}

//# sourceMappingURL=home.js.map
/// <reference path="jquery.d.ts" />
$(function () {
    var $baseCategory = $('.chose-base-category');
    var $categoryToSet = $('.category-alias');
    var baseCategoryAlias = $baseCategory.val();
    if (baseCategoryAlias) {
        setCategoryAlias($categoryToSet, baseCategoryAlias);
    }
    $baseCategory.on('change', function () {
        var selectedCategoryAlias = $(this).val();
        setCategoryAlias($categoryToSet, selectedCategoryAlias);
    });
    $('body').on('change', '#articlerecord-type_id', function () {
        $('.pjax-select-link').click();
    });
    $('body').on('click', '.pjax-select-link', function (e) {
        e.preventDefault();
        $.get('/article/create?article_type_id=' + $('#articlerecord-type_id').val(), function (result) {
            var $result = $(result);
            history.pushState(this.data, '');
            $('.article-record-form').html("");
            $result.find('.article-record-form').appendTo('.article-record-form');
            $result.find('script').appendTo('.article-record-form');
        }, 'html');
        // $.ajax({
        //     url: '/',
        //     dataType: "html",
        //     data: {article_type_id: $('#articlerecord-type_id').val()},
        //     success: function (result) {
        //         history.pushState(this.data, '');
        //         $('.article-record-form').html($(result).find('.article-record-form').html());
        //
        //         console.log($(result).find('script'));
        //         $(result).find('script').each(function () {
        //             console.log(123);
        //         });
        //     }
        // });
    });
});
function setCategoryAlias($categoryAlias, selectedCategoryAlias) {
    $categoryAlias.val(selectedCategoryAlias);
}
//# sourceMappingURL=home.js.map
define([
    'jquery',
    'slick',
], function (jQuery, slick) {

    jQuery.widget('mage.Slick', {
        /**
         * Initialize widget
         */
        _create: function () {
            var self = this,
                slick;
            jQuery(".vertical-center").slick({
                dots: true,
            });

        },

    });

    return jQuery.mage.Slick;

});
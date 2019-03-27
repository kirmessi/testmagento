define([
    'jquery',
    'uiComponent',
    'ko'
], function ($, Component, ko) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
            return this;
        },
        onSubmit: function() {

                console.log(('#knoutname').val());

        },
        getText: function () {
            return "call the function here..";
        }
    });
});
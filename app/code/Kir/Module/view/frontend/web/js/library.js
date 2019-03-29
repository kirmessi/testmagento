define([
    'jquery',
    'uiComponent',
    'ko'
], function ($, Component, ko) {
    'use strict';

    return Component.extend({

        initialize: function () {
            this._super();
            this.name = ko.observable('');
            this.getName = ko.observable();
            this.font = ko.observable(-1000);
            return this;
        },
        onSubmit: function() {
            var data = {'name':this.name()};
            this.getName(data.name);
            this.font(1000);

        }

    });
});
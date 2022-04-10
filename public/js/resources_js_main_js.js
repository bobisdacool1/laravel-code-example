(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_main_js"], {

    /***/ "./resources/js/main.js":
    /*!******************************!*\
      !*** ./resources/js/main.js ***!
      \******************************/
    /***/ (() => {

// below things are really horrible but i don't know how to do it properly, im not js enjoyer after all
        addPropsBlock(0);
        var index = 2;
        $('#add-property-field').on('click', function () {
            addPropsBlock(index);
            index++;
        });

        function addPropsBlock(index) {
            $('#properties').append(getPropertyBlockWithIndex(index));
        }

        function getPropertyBlockWithIndex(index) {
            return "<div class=\"property-group row mb-3 d-flex justify-content-space-between\">\n" + "                <div class=\"col-6\">\n" + "                    <input type=\"text\" class=\"form-control property key\" name=\"data[" + index + "][key]\"/>\n" + "                </div>\n" + "                <div class=\"col-6\">\n" + "                    <input type=\"text\" class=\"form-control property value\" name=\"data[" + index + "][value]\"/>\n" + "                </div>\n" + "            </div>";
        }

        $('form#create-product').on('submit', function (e) {
            var form = $(e.currentTarget);
            var inputsVal = form.find('.form-control.property.value').toArray();
            inputsVal.forEach(function callback(input, index, array) {
                var key = $(input).closest('.property-group').find('.form-control.property.key').val();
                $(input).attr('name', "data[".concat(key, "]"));
            });
            form.find('.form-control.property.key').prop('disabled', true);
        });
        $('.remove-property').on('click', function (e) {
            $(e.currentTarget).closest('.property-group').remove();
        });

        /***/
    })

}]);

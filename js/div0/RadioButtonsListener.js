var RadioButtonsListener = (function () {
    function RadioButtonsListener() {
        this.$j = jQuery.noConflict();
        console.log("RadioButtonsListener create jQuery = ", this.$j);
        this.createListener();
    }
    RadioButtonsListener.prototype.createListener = function () {
        var _this = this;
        console.log("create listeners");
        this.$j("input[name*='optionRadio']").change(function (event) { return _this.onChange(event); });
    };
    RadioButtonsListener.prototype.onChange = function (event) {
        var element = this.$j(event.target);
        var itemId = element.data("itemid");
        var value = element.val();
        console.log("itemId=", itemId, "value=", value);
        alert("Item id: " + itemId + "  selected value: " + value);
    };
    return RadioButtonsListener;
}());
//# sourceMappingURL=RadioButtonsListener.js.map
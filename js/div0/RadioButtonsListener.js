var RadioButtonsListener = (function () {
    function RadioButtonsListener() {
        this.$j = jQuery.noConflict();
        console.log("RadioButtonsListener create jQuery = ", this.$j);
        this.createListener();
    }
    RadioButtonsListener.prototype.createListener = function () {
        var _this = this;
        this.$j("input[name='optionRadio']").change(function (event) { return _this.onChange(event); });
        /*
        this.$j("input[name='optionRadio']").change(function() {
            alert("radio button changed "+this);
        });
        */
    };
    RadioButtonsListener.prototype.onChange = function (event) {
        alert("onChange");
    };
    return RadioButtonsListener;
}());
//# sourceMappingURL=RadioButtonsListener.js.map
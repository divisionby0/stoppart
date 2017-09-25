class RadioButtonsListener{
    private $j:any;
    
    constructor(){
        this.$j = jQuery.noConflict();
        console.log("RadioButtonsListener create jQuery = ",this.$j);
        this.createListener();
    }

    private createListener():void{

        this.$j("input[name='optionRadio']").change((event)=>this.onChange(event));

        /*
        this.$j("input[name='optionRadio']").change(function() {
            alert("radio button changed "+this);
        });
        */
    }

    private onChange(event:any):void{
        alert("onChange");
    }
}

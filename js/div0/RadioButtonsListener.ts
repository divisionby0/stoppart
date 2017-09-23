class RadioButtonsListener{
    private $j:any;
    
    constructor(){
        this.$j = jQuery.noConflict();
        console.log("RadioButtonsListener create jQuery = ",this.$j);
        this.createListener();
    }

    private createListener():void{
        console.log("create listeners");
        this.$j("input[name*='optionRadio']").change((event)=>this.onChange(event));
    }

    private onChange(event:any):void{
        var element:any = this.$j(event.target);
        var itemId:string = element.data( "itemid" );
        var value:string = element.val();
        console.log("itemId=",itemId, "value=",value);
        alert("Item id: "+itemId+"  selected value: "+value);
    }
}

!function(e){
    "use strict";var t=function(){};
    t.prototype.createBasic=function(t){
        return t.children("div").steps({
            headerTag:"h3",
            bodyTag:"section",
            transitionEffect:"slideLeft",
            onFinishing:function(t,i){
                return console.log("Form has been validated!"),!0},
            onFinished:function(t,i){
                console.log("Form can be submitted using submit method. E.g. $('#basic-form').submit()"),e("#basic-form").submit()}
            }),t},

    t.prototype.createVertical=function(t){
        t.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                alamat: {
                    required: true
                },
                confirm: {
                    equalTo: "#password"
                }
            }
        });

        t.steps({
            headerTag:"h3",
            bodyTag:"section",
            transitionEffect:"fade",
            stepsOrientation:"vertical",
            onStepChanging: function (event, currentIndex, newIndex) {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }
                t.validate().settings.ignore = ":disabled,:hidden";
                return t.valid();
            },
            onFinishing: function (event, currentIndex) {
                t.validate().settings.ignore = ":disabled";
                return t.valid();
            },
            onFinished: function (event, currentIndex) {
                $("#wizard-vertical").submit();
            }
        }); return t
        },

    t.prototype.init=function(){
        this.createBasic(e("#basic-form")),
        this.createVertical(e("#wizard-vertical"))},
        
    e.FormWizard=new t,e.FormWizard.Constructor=t}
    
    (window.jQuery),function(t){"use strict";window.jQuery.FormWizard.init()}();
$(document).ready(function(){
    $('select').change(function(){
        if(this.value !== "1") {
            $('#add').show();
        } else {         
            $('#add').hide();
        }
    });
    var broj = 0;
    $('#add').click(function(){
        broj++;
        var template = "<div class=\"form-group\">\
        <input type=\"text\" name=\"punoime"+(broj)+"\" class=\"form-control\" placeholder=\"Unesite puno ime i prezime\" value=\"\" required>\
    </div>\
    <div class=\"form-group\">\
        <input type=\"text\" name=\"pasos"+(broj)+"\" class=\"form-control\" placeholder=\"Unesite broj pasoša\" value=\"\" required>\
    </div>";
        $('#grupno').append(template)
    });
});
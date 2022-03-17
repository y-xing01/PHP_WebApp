    //product name validation starts
    function product(){
    'use strict';
    var product_name = document.getElementById("product");
    var product_value = document.getElementById("product").value;
    var product_length = product_value.length;
    var letters = /^[0-9a-zA-Z]+$/;
    if(product_length > 0 || !product_value.match(letters))
    {
    document.getElementById('name_err').innerHTML = 'Product must be 4 chracters long and alphanuric chracters only.';
    product_name.focus();
    document.getElementById('name_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('name_err').innerHTML = 'Valid product';
    document.getElementById('name_err').style.color = "#00AF33";
    }
    }
    //product validation ends

    function id_validation(){
        'use strict';
        var id_name = document.getElementById("id");
        var id_value = document.getElementById("id").value;
        var id_length = id_value.length;
        if(id_value > 0)
        {
        document.getElementById('uid_err').innerHTML = 'Value id';
        userid_name.focus();
        document.getElementById('uid_err').style.color = "#FF0000";
        }
        else
        {
        document.getElementById('uid_err').innerHTML = 'Valid id';
        document.getElementById('uid_err').style.color = "#00AF33";
        }
        }

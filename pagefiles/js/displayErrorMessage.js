function validateForm() {

    document.getElementById("alertMessage").innerHTML = "";

    var sku = document.forms["product_form"]["sku"].value;
    var name = document.forms["product_form"]["name"].value;
    var price = document.forms["product_form"]["price"].value;
    var productType = document.forms["product_form"]["productType"].value;

    let j = 0;
    let n = 0;
    if (productType != "") {
        let selector = document.getElementById('productType');
        let visibleDiv = document.getElementById(selector.value);
        let inputs = visibleDiv.querySelectorAll("input");
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].value == "") {
                j++;
            } else {
                if (isNaN(inputs[i].value)) {
                    n++;
                }
            }
        }
    }
    if (sku == "" || name == "" || price == "" || productType == "" || j > 0) {
        let ele = document.getElementById('alertMessage');
        ele.innerHTML = 'Please, submit required data.';
        return false;
    }
    if (isNaN(price) || n > 0) {
        let ele = document.getElementById('alertMessage');
        ele.innerHTML = 'Please, provide the data of indicated type\n';
        return false;
    } else {
        return true;
    }
}
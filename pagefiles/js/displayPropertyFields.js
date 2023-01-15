function showDynamicFields() {
    let selector = document.getElementById('productType');
    const dynamicFields = document.getElementsByClassName('dynamicFields');

    if (selector && dynamicFields) {
        selector.addEventListener("change", () => {
            let visible = document.getElementById(selector.value);
            for (var i = 0; i < dynamicFields.length; i++) {
                let c = dynamicFields[i];
                c.style.display = 'none';
            }
            visible.style.display = 'block';
        })
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', showDynamicFields);
} else {
    showDynamicFields();
}
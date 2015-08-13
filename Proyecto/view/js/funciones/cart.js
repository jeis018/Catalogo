function process(indicator) {
    var valueC = document.form.quantity.value;
    var operation = "";

    if (indicator == 1) {
        if (valueC > 1) {
            operation = "-";
            valueC = eval(valueC + operation + 1);
        }
    } else if (indicator == 2) {
        operation = "+";
        valueC = eval(valueC + operation + 1);
    }
    document.form.quantity.value = valueC;
}
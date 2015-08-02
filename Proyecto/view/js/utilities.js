$.fn.serializeForm = function(){
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};


function Post(resc, dataget, callback, error) {
    var xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject("Microsoft.XMLHTTP");
    var request;
    callback = callback || function(){};
    error = error || function(){};
    if(!(dataget instanceof Function)){
        return;
    }
    request = dataget();
    if(request == null){
        return;
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200){
            callback(xmlhttp.responseText);
        }else if(xmlhttp.status === 404){
            error();
        }
    };
    xmlhttp.open("POST", resc, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(request);
}
var p = [];

function add(id){
    if(sessionStorage.getItem('list') === null){
        p.push(id);
        p = _.uniq(p);
        sessionStorage.setItem('list', JSON.stringify(p));
        msg();
    }else{
        p = JSON.parse(sessionStorage.getItem('list'));
        p.push(id);
        p = _.uniq(p);
        sessionStorage.setItem('list', JSON.stringify(p));
        msg();
    }
}


function msg(){
    $('.msg-add').css('display', 'none');
    $('.msg-add').css('display', '');
    setTimeout(function(){
        $('.msg-add').css('display', 'none');
    },2000);
}
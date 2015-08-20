var p = [];

function add(id){
    p.push(id);
    p = _.uniq(p);
    sessionStorage.setItem('list', JSON.stringify(p));
    
    $('.msg-add').css('display', 'none');
    $('.msg-add').css('display', '');
    setTimeout(function(){
        $('.msg-add').css('display', 'none');
    },2000);
}
function modaladd() {
    $(".add").css("display","block");
    $(".col-md-4 col-sm-6\\").css("display","none");
    $(".update").css("display","none");
}
function checkadmin() {
    $(".side-button-5").css("display","none");
}

$('.rr').click(function() {
    var name = $(this).data('name'),
    $('#name').val(name);
    $('#info').modal();
    return false;
});
function statuss() {
    $(".status").css("display","none");
    $(".status_zak").css("display","block");
}
function statuss2() {
    $(".status").css("display","block");
    $(".status_zak").css("display","none");
}


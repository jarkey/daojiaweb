$(function(){
var onOff=true;
$('.nav').find('h3').click(function(){
if(onOff){
$('#nav').slideDown();

onOff=false;
}else{
$('#nav').slideUp();

onOff=true;
}
})
})
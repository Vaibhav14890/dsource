

(function ($) {    
jQuery().ready(function() {

//swap element in home page for most seen
if(jQuery('body.front').length > 0)
{
var temp = document.getElementsByClassName("node-courses")[1].innerHTML;

document.getElementsByClassName("node-courses")[1].innerHTML= document.getElementsByClassName("node-courses")[2].innerHTML ;
document.getElementsByClassName("node-courses")[2].innerHTML = temp ;


var temp = document.getElementsByClassName("node-courses")[5].innerHTML;
document.getElementsByClassName("node-courses")[5].innerHTML= document.getElementsByClassName("node-courses")[6].innerHTML ;
document.getElementsByClassName("node-courses")[6].innerHTML = temp ;

var temp = document.getElementsByClassName("node-courses")[9].innerHTML;
document.getElementsByClassName("node-courses")[9].innerHTML= document.getElementsByClassName("node-courses")[10].innerHTML ;
document.getElementsByClassName("node-courses")[10].innerHTML = temp ;

var temp = document.getElementsByClassName("node-courses")[13].innerHTML;
document.getElementsByClassName("node-courses")[13].innerHTML= document.getElementsByClassName("node-courses")[14].innerHTML ;
document.getElementsByClassName("node-courses")[14].innerHTML = temp ;

//var y = document.getElementsByClassName("node-gallery-img");
var temp = document.getElementsByClassName("node-gallery-img")[1].innerHTML;
document.getElementsByClassName("node-gallery-img")[1].innerHTML= document.getElementsByClassName("node-gallery-img")[2].innerHTML ;
document.getElementsByClassName("node-gallery-img")[2].innerHTML = temp ;

//var z = document.getElementsByClassName("node-videos");
var temp = document.getElementsByClassName("node-videos")[1].innerHTML;
document.getElementsByClassName("node-videos")[1].innerHTML= document.getElementsByClassName("node-videos")[2].innerHTML ;
document.getElementsByClassName("node-videos")[2].innerHTML = temp ;

}
//search textbox value carry forward on second page
/*
searchOld = document.getElementById('edit-keys');
searchNew = document.getElementById('edit-search-block-form--3');
searchNew.value = searchOld.value;*/

});

})(jQuery);
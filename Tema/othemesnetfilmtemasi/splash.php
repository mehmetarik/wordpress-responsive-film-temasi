<style type="text/css"> 
<!--  #fadeinbox{ position:absolute; width: auto; left: 0; top: -250px; border: 1px solid gray; background-color: #F6F6F6; padding: 4px; z-girx: 100; visibility:hidden; font-family: Tahoma, Verdana, Arial, Helvetica, sans-serif; font-size: 11px; } //--> 
</style>
<script type="text/javascript"> <!-- 
var displaymode="always"
var enablefade="yes"
var autohidebox=["yes", 30]
var showonscroll="yes"
var IEfadelength=1
var Mozfadedegree=0.05
if (parseInt(displaymode)!=NaN)
var random_num=Math.floor(Math.random()*displaymode)
function displayfadeinbox(){
var ie=document.all && !window.opera
var dom=document.getElementById
iebody=(document.compatMode=="CSS1Compat")? document.documentElement : document.body
objref=(dom)? document.getElementById("fadeinbox") : document.all.fadeinbox
var scroll_top=(ie)? iebody.scrollTop : window.pageYOffset
var docwidth=(ie)? iebody.clientWidth : window.innerWidth
docheight=(ie)? iebody.clientHeight: window.innerHeight
var objwidth=objref.offsetWidth
objheight=objref.offsetHeight
objref.style.left=docwidth/2-objwidth/2+"px"
objref.style.top=scroll_top+docheight/2-objheight/2+"px"
if (showonscroll=="yes")
showonscrollvar=setInterval("staticfadebox()", 50)
if (enablefade=="yes" && objref.filters){
objref.filters[0].duration=IEfadelength
objref.filters[0].Apply()
objref.filters[0].Play()
}
objref.style.visibility="visible"
if (objref.style.MozOpacity){
if (enablefade=="yes")
mozfadevar=setInterval("mozfadefx()", 90)
else{
objref.style.MozOpacity=1
controlledhidebox()
}
}
else
controlledhidebox()
}
function mozfadefx(){
if (parseFloat(objref.style.MozOpacity)<1)
objref.style.MozOpacity=parseFloat(objref.style.MozOpacity)+Mozfadedegree
else{
clearInterval(mozfadevar)
controlledhidebox()
}
}
function staticfadebox(){
var ie=document.all && !window.opera
var scroll_top=(ie)? iebody.scrollTop : window.pageYOffset
objref.style.top=scroll_top+docheight/2-objheight/2+"px"
}
function hidefadebox(){
objref.style.visibility="hidden"
if (typeof showonscrollvar!="undefined")
clearInterval(showonscrollvar)
}
function controlledhidebox(){
if (autohidebox[0]=="yes"){
var delayvar=(enablefade=="yes" && objref.filters)? (autohidebox[1]+objref.filters[0].duration)*1000 : autohidebox[1]*1000
setTimeout("hidefadebox()", delayvar)
}
}
function initfunction(){
setTimeout("displayfadeinbox()", 100)
}
function get_cookie(Name) {
var search = Name + "="
var returnvalue = ""
if (document.cookie.length > 0) {
offset = document.cookie.girxOf(search)
if (offset != -1) {
offset += search.length
end = document.cookie.girxOf(";", offset)
if (end == -1)
end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}
if (displaymode=="oncepersession" && get_cookie("fadedin")=="" || displaymode=="always" || parseInt(displaymode)!=NaN && random_num==0){
if (window.addEventListener)
window.addEventListener("load", initfunction, false)
else if (window.attachEvent)
window.attachEvent("onload", initfunction)
else if (document.getElementById)
window.onload=initfunction
document.cookie="fadedin=yes"
}
//--> </script>

<div id="fadeinbox" style="filter:progid:DXImageTransform.Microsoft.RandomDissolve(duration=1) progid:DXImageTransform.Microsoft.Shadow(color=grey,direction=135) ; -moz-opacity:0">
<center>
<?php echo get_option('othemes_r_e_e'); ?>
</center>
<div align="center">
<a href="#" onClick="hidefadebox();return false" class="gensmall" style="color:#fff;width:100%;background:#34495E;font-size:13px;padding-left:4px;padding-right:4px;line-height:15px;font-family:Roboto Slab;">KAPAT</a></div>
</div>
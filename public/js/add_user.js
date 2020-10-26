function setCookie(name, value, expires, path, domain, secure) {
document.cookie = name + "=" + escape(value) +
((expires == null) ? "" : "; expires=" + expires.toGMTString()) +
((path == null) ? "" : "; path=" + path) +
((domain == null) ? "" : "; domain=" + domain) +
((secure == null) ? "" : "; secure");
}
 
// Read cookie
function getCookie(name){
var cname = name + "=";
var dc = document.cookie;
if (dc.length > 0) {
begin = dc.indexOf(cname);
if (begin != -1) {
begin += cname.length;
end = dc.indexOf(";", begin);
if (end == -1) end = dc.length;
return unescape(dc.substring(begin, end));
}
}
return null;
}
 
//delete cookie
function eraseCookie (name,path,domain) {
if (getCookie(name)) {
document.cookie = name + "=" +
((path == null) ? "" : "; path=" + path) +
((domain == null) ? "" : "; domain=" + domain) +
"; expires=Thu, 01-Jan-70 00:00:01 GMT";
}
}
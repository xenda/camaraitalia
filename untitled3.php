<html><head></head><body>
<marquee id="a"></marquee>
<object id="data1" classid="CLSID:333C7BC4-460F-11D0-BC04-0080C7055A83">
<param name="DataURL" value="datos.txt">
<param name="UseHeader" value="true">
<param name="TextQualifier" value="€">
<param name="FieldDelim" value="$">
</object>
<script language="JavaScript">
var dataSet=data1.recordset;
var ll=new Array;
var tx="";
for(var w=0;w<=2;w++) {tx+=data1.recordset(w);}
document.body.innerHTML+=tx
</script></body></html>

en el param dataURL se llama al archivo de texto a leer, en este caso es 'datos.txt'. este archivo será de la forma:

0$1$2
€<font size="8" color="#FF0000">€$€El texto€$</font>€
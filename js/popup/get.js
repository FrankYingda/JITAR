function showSite(str)
{
    if (str=="")
    {
        document.getElementById("txtHint").innerHTML="";
        return;
    } 
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari ä¯ÀÀÆ÷Ö´ÐÐ´úÂë
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 ä¯ÀÀÆ÷Ö´ÐÐ´úÂë
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","192.168.153.133:80/get.php?q="+str,true);
    xmlhttp.send();
}
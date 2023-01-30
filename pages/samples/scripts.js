
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }



function display(name){
    var div=document.getElementById("div");
    if(name=="manage"){
        div.innerHTML='<iframe src="./manageUsers/manageUsers.php" style="width:100%; height:100%; overflow: hidden; border:none;"  frameborder="0" scrolling="no" onload="resizeIframe(this)"  seamless="seamless"></iframe>';
 
    }else if (name=="all"){
        div.innerHTML='<iframe src="./manageUsers/allUsers.php" style="width:100%; height:100%; overflow: hidden; border:none;"  frameborder="0" scrolling="no" onload="resizeIframe(this)"  seamless="seamless"></iframe>';
    }else if (name=="dash"){
        div.innerHTML='<iframe src="./manageUsers/dashboard.php" style="width:100%; height:100%; overflow: hidden; border:none;"  frameborder="0" scrolling="no" onload="resizeIframe(this)"  seamless="seamless"></iframe>';
    }else if (name=="sigProb"){
      div.innerHTML='<iframe src="./reports/sigProb.php" style="width:100%; height:100%; overflow: hidden; border:none;"  frameborder="0" scrolling="no" onload="resizeIframe(this)"  seamless="seamless"></iframe>';
    }
      else if (name=="probList"){
        div.innerHTML='<iframe src="./reports/viewReports.php" style="width:100%; height:100%; overflow: hidden; border:none;"  frameborder="0" scrolling="no" onload="resizeIframe(this)"  seamless="seamless"></iframe>';
    }else if (name=="cal"){
      div.innerHTML='<iframe src="cal/index.php" style="width:100%; height:900px  ; overflow: hidden; border:none;"  frameborder="0" scrolling="no" onload="resizeIframe(this)"  seamless="seamless"></iframe>';
    }else if (name=="usersCal"){
      div.innerHTML='<iframe src="./usersCalendar/index.php" style="width:100%; height:900px  ; overflow: hidden; border:none;"  frameborder="0" scrolling="no" onload="resizeIframe(this)"  seamless="seamless"></iframe>';
    }else if (name=="viewProb"){
      div.innerHTML='<iframe src="./reportsAdmin/viewReports.php" style="width:100%; height:100%  ; overflow: hidden; border:none;"  frameborder="0" scrolling="no" onload="resizeIframe(this)"  seamless="seamless"></iframe>';
    }

}




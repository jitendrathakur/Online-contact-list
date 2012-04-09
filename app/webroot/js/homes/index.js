function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
{
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}



function newContact() {
  if ($(".button button").attr("class") == '') {
    $(".button button").attr("class", "active");
      var add = "<div class='main-frame upsert'>";      
      add += "<div id='number' class='number_list'><input type='text' value='' /></div>";
      add += "<div id='name' class='number_list'><input type='text' id='unameAdd'  value='' /></div>";  
      add += "<div id='relation' class='number_list'><input type='text' id='relationAdd'  value='' /></div>";
      add += "<div id='altNumber' class='number_list'><input type='text' id='altNumberAdd'  value='' /></div>";     
      add += "<input type='button' value='save' onclick='saveContact()' />";
      add += "<input type='button' value='cancel' onclick='cancelContact()' /></div>";

    $('.tempBox').append(add);
  } else {
    alert("your previous action is not done");
  }

}




function saveContact(id) {

  var number = $(".upsert #number input").val();
  var uname = $(".upsert #name input").val(); 
  var relation = $(".upsert #relation input").val();
  var altNumber = $(".upsert #altNumber input").val();

  if($.isNumeric(number) == false || number.length > 12 || number.length < 5) {
    alert("please enter genuine number");
    $("#number").focus();
    return false;
  }
  if(uname == '' || uname.length < 3) {
    alert("please enter genuine name");
    $("#unameAdd").focus();
    return false;
  }
  if (altNumber != '') {
    if($.isNumeric(altNumber) == false || altNumber.length > 12 || altNumber.length < 5) {
    alert("please enter genuine number");
    $("#altNumber").focus();
    return false;
  }

  }
  var data = "number=" + number + "&uname=" + uname + "&relation=" + relation + "&altNumber=" + altNumber;
 
  if (typeof id == 'undefined') {
    id = '';
  } else {
    var selector =".container #"+id;
    $(selector).empty();
  }

   $.ajax({
        type:'POST',
        url: 'contacts/add/' + id,
        data:data,
        success: function (response) {         
          
          if(id != '') {
            $(response).appendTo(selector);  
            console.log("true");
          } else {
            $('.tempBox').empty();
            $(response).appendTo(".container");  
          }

          if(typeof id != 'undefined') {  
                         
            $(selector).children().remove('.main-frame-edit'); 
          }

          for(var i=1; i<1000; i++) {
            //var selectCon = ".container #" + i;
            //$(selectCon).appendTo(".container")​​​​​​​​​​​​​​​​​​​​​​​;
          }
         $(".button button").attr("class", "");  
         $(".container").attr("class", "container");       
         document.getElementById('flashBox').innerHTML = '<div class="flash" >Contact has been successfully save</div>';
         setTimeout(function(){
            $(".flash").fadeOut("slow", function () {
            $(".flash").remove();
           }); }, 2000);
          
        }
   });

}


function cancelContact(id) {
  //method call on add actopn
  if (typeof id === "undefined") {
    $(".button button").attr("class", "");
    $(".tempBox").empty();
  } else if(id != null) {
    //method call on edit action
    $(".button button").attr("class", "");
    $(".container").attr("class", "container"); 
    var selector =".container #"+id; 
    $(selector+ " div input[type='text']").attr("readonly", "readonly");
    $(selector+ " div input[type='text']").attr("id", "textlook");
    $(selector+ " .action").show();
    $(selector+ " .action2").hide();
  
    $(".upsert #number input").val(getCookie("number"));
    $(".upsert #name input").val(getCookie("uname"));
    $(".upsert #relation input").val(getCookie("relation"));
    $(".upsert #altNumber input").val(getCookie("altNumber"));
  }
}

function editContact(id) { 
  

   var selector =".container #"+id;
   if ($('.container').attr('class') == 'container active') {
     return false;
   }


   $(".container").attr("class", "container active"); 
   $(selector).attr("class", "main_frame upsert");
   $(".tempBox").empty();
   $(".button button").attr("class", "active");
   $(selector+ " div input").removeAttr("readonly");
   $(selector+ " div input").removeAttr("id");
   $(selector+ " .action").hide();

  var number = $(".upsert #number input").val();
  var uname = $(".upsert #name input").val(); 
  var relation = $(".upsert #relation input").val();
  var altNumber = $(".upsert #altNumber input").val();

  setCookie("number",number,365);
  setCookie("uname",uname,365);
  setCookie("relation",relation,365);
  setCookie("altNumber",altNumber,365); 

   if ($(selector+ " #action2").html() == null) {
      add = "<div class='number_list action2' id='action2'><input type='button' value='save' onclick='saveContact("+id+")' />";
      add += "<input type='button' value='cancel' onclick='cancelContact("+id+")' /></div>";
      $(selector).append(add);
   } else {
      $(selector+ " #action2").show();
   } 
 
}

function deleteContact(id) {
 
   $.ajax({
        type:"POST",
        url: 'contacts/delete/' + id,      
        success: function (response) {      
            var selector =".container #"+id;  
            $(selector).remove();
           document.getElementById('flashBox').innerHTML = '<div class="flash">Contact has been successfully deleted</div>';
          
            setTimeout(function(){
            $(".flash").fadeOut("slow", function () {
            $(".flash").remove();
            }); }, 2000);
        }
      });

}  
   

$(document).ready(function() {

$(".header").css("width",screen.width);  

});



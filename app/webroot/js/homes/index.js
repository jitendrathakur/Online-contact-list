
function newContact() {
  if ($(".button button").attr("class") == '') {
    $(".button button").attr("class", "active");
      var add = "<div class='main-frame'>";      
      add += "<input type='text' id='numberAdd' value='' />";
      add += "<input type='text' id='unameAdd'  value='' />";  
      add += "<input type='text' id='relationAdd'  value='' />";
      add += "<input type='text' id='altNumberAdd'  value='' />";     
      add += "<input type='button' value='save' onclick='saveContact()' />";
      add += "<input type='button' value='cancel' onclick='cancelContact()' /></div>";

    $('.tempBox').append(add);
  }

}




function saveContact(id) {

  var number = $("#numberAdd").val();
  var uname = $("#unameAdd").val(); 
  var relation = $("#relationAdd").val();
  var altNumber = $("#altNumberAdd").val();

  if($.isNumeric(number) == false || number.length > 12 || number.length < 5) {
    alert("please enter genuine number");
    $("#numberAdd").focus();
    return false;
  }
  if(uname == '' || uname.length < 3) {
    alert("please enter genuine name");
    $("#unameAdd").focus();
    return false;
  }
  var data = "number=" + number + "&uname=" + uname + "&relation=" + relation + "&altNumber=" + altNumber;
 
  if (typeof id == 'undefined') {
    id = '';
  } else {
    var selector =".container #"+id;
    $(selector).remove();
  }

   $.ajax({
        type:'POST',
        url: 'contacts/add/' + id,
        data:data,
        success: function (response) {
          $('.tempBox').empty();
          $(response).appendTo(".container");   
          if(typeof id != 'undefined') {  
                         
            $(selector).children().remove('.main-frame-edit'); 
          }
          for(var i=1; i<100; i++) {
            //var selectCon = ".container #" + i;

           // $(selectCon).appendTo(".container")​​​​​​​​​​​​​​​​​​​​​​​;
          }
         $(".button button").attr("class", "");        
         document.getElementById('flashBox').innerHTML = '<div class="flash" >Contact has been successfully save</div>';
         setTimeout(function(){
            $(".flash").fadeOut("slow", function () {
            $(".flash").remove();
           }); }, 2000);
          
        }
   });

}


function cancelContact(id) {
  $(".button button").attr("class", "");
  $(".tempBox").empty();
  
  if(id != null) {
  var selector =".container #"+id; 
 
    $(selector).children().show();
    $(selector).children().remove('.main-frame-edit');
  }
}

function editContact(id) {

  var selector =".container #"+id;   
 
  if ($(selector).children().hide('div')) {
 
    var add = "<div class='main-frame-edit'>";
        add += "<div id='number' class='number_list'><input type='text' id='numberAdd' value='' /></div>";
        add += "<div id='name' class='number_list'><input type='text' id='unameAdd' value='' /></div>";    
        add += "<div id='relation' class='number_list'><input type='text' id='relationAdd'  value='' /></div>";
        add += "<div id='altNumber' class='number_list'><input type='text' id='altNumberAdd'  value='' /></div>";
        add += "<div class='number_list'><input type='button' value='save' onclick='saveContact("+id+")' />";
        add += "<input type='button' value='cancel' onclick='cancelContact("+id+")' /></div></div>";

    $(selector).append(add);
    $("#numberAdd").attr("value", $(selector + " div:nth-child(1)").text());
    $("#unameAdd").attr("value", $(selector + " div:nth-child(2)").text());
    $("#relationAdd").attr("value", $(selector + " div:nth-child(3)").text());
    $("#altNumberAdd").attr("value", $(selector + " div:nth-child(4)").text());
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



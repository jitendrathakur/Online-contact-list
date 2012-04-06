$(document).ready(function() {
    $("#createNew").click(function(){
        
        $(".midBox").hide();
        $(".registrationBox").show();
    });

    $("#cancelNew").click(function(){
         $(".midBox").show();
        $(".registrationBox").hide();
    });

    $("#saveForm").click(function(){
        var uname = $(".registrationBox input[type='text']").val();
        var upass = $(".registrationBox input[type='password']").val();    
        var data = "uname=" + uname + "&upass=" + upass;
       
       $.ajax({
          url: 'users/register',
          data: data,
          type:'Post',
          success: function(data) {
          
            if(data == 'created') {
                var flash = '<div class="flash" >Account has been successfully created. Please Login</div>';
                  $(".midBox").show();
                  $(".registrationBox").hide(); 
                  $(".midBox input[type='text']").attr('value', uname);
                  $(".midBox input[type='password']").attr('value', upass);
            } else if(data == 'exist') {
                var flash = '<div class="flash" >Username already exist</div>';
            } else {
                var flash = '<div class="flash" >Server error</div>';
            }        
            document.getElementById('flashBox').innerHTML = flash;
            //$(flash).appendTo(".flashBox")​​​​​​​​​​​​​​​​​​​​​​​;
            setTimeout(function(){
                $(".flash").fadeOut("slow", function () {
                $(".flash").remove();
            }); }, 3000);

          }
        });

    })
});


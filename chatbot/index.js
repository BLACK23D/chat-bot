$(document).ready(function(){
    $("#send-btn").on("click", function(){
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');
        
         
        $.ajax({
            url: 'message.php',
            type: 'POST',
            data: 'text='+$value,
            success: function(result){
                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                $(".form").append($replay);
                
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    });
});



$(document).ready(function(){

    function sendMessage() {
        var value = $("#data").val();
        var userMessage = '<div class="user-inbox inbox"><div class="msg-header"><p>' + value + '</p></div></div>';
        $(".form").append(userMessage);
        $("#data").val('');
        
       
        $.ajax({
            url: 'message.php',
            type: 'POST',
            data: 'text=' + value,
            success: function(result){
                var botMessage = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                $(".form").append(botMessage);
               
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    }

  
    $("#send-btn").on("click", function(){
        sendMessage();
    });

   
    $("#data").on("keydown", function(event) {
        if (event.key === "Enter") {
            sendMessage();
        }
    });
});
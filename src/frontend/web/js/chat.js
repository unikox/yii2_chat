    user = new Object;
    user.id = $('#userid').html();
    $( document ).ready(function() {
        
        setInterval(() => {
            //console.log( "ready!" )
            getMessageList();
        }, 1500);    
        setInterval(() => {
            //console.log( "ready!" )
            setAdminMarker();
        }, 10);    
    });
$('#sendMessage').click(function () {
        //alert('xxxx')
        
        text_data = $('#messageArea').val();
        $('#messageArea').val(' ');
        
        //alert(text_data);
        sendMessage(text_data);
        //console.log($('#userid').html());
        console.log(user.id);
        setTimeout(() => { getMessageList(); }, 350);
        //getMessageList();
        
    }
)
function setAdminMarker() {
 
    //jQuery('.post-item:has(div:chat_message_autor("admin"))').addClass('sponz');
    jQuery('.chat_message_autor:contains("admin")').addClass('chat_admin_marker');

}
function getMessageList(params) {
    
    $.ajax({
        url:'index.php?r=messages%2Fajaxmessages',
        type:'GET',
        dataType: 'html',
        success: function (res_msg_list) {
            
            decoded_res = JSON.parse(res_msg_list);
            //console.log(decoded_res);
            addMessages(decoded_res);
            
        }
    });
}
function decodeUnixTime(params) {
    const milliseconds = params * 1000
    const dateObject = new Date(milliseconds)
    const humanDateFormat = dateObject.toLocaleString()
    return humanDateFormat
}
function addMessages(params) {

    $('#chat_itembox').empty();
    params.forEach(
        
        
        element =>

            $('#chat_itembox').append(
                '<div class="chat_message_item"><div class="chat_itemdate">'
                +decodeUnixTime(element.create_at)
                +'</div><div class="chat_message_autor"> от:'
                +element.owner+'</div> <div class="chat_message_body">'
                +element.body+'</div></div>')
        );
}
function sendMessage(text_data) {
    var res;
    var obj;
    $.ajax({
        url: 'index.php?r=messages%2Fajaxdata',
        type: 'GET',
        data: ({ userid:user.id, body:text_data}),
        dataType: 'html',
        success: function (res) {
            console.log(res);
 
        },
        error: function () {
            console.log('Error!');
        }
    });    
}

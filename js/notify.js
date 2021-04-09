

function notify(text){
  
    $('.dash-container').prepend('<div class="notify notOn" id="notify"> <div class="notfyheader"> <div class="not-title"><span class="status not-sucess"><i class="bx bx-notification"></i></span> <p>Informação</p></div><button class="close-button" id="closeNot" onclick="closeNotify()">x</button></div> <div class="not-content">  <p> <i id="notification-text">'+ text +'</i> </p></div> </div>');

}


function closeNotify(){ 
    const notipop = document.getElementById('notify');
    notipop.classList.remove('notOn');
}




//our username 

var name; 
var connectedUser;
  
//connecting to our signaling server
var conn = new WebSocket('ws://localhost:9090');
  
conn.onopen = function () { 
   console.log("Connected to the signaling server"); 
};
  
//when we got a message from a signaling server 
conn.onmessage = function (msg) { 
	
   var data = JSON.parse(msg.data); 
   switch(data.type) { 
      case "login": 
         handleLogin(data.success); 
         break; 
      //when somebody wants to call us 
      case "offer": 
         handleOffer(data.offer, data.name); 
         break; 
      case "answer": 
         handleAnswer(data.answer); 
         break; 
      //when a remote peer sends an ice candidate to us 
      case "candidate": 
         handleCandidate(data.candidate); 
         break; 
      case "leave": 
         handleLeave(); 
         break; 
      default: 
         break; 
   }
};
  
conn.onerror = function (err) { 
   console.log("Got error", err); 
};
  
//alias for sending JSON encoded messages 
function send(message) { 
   //attach the other peer username to our messages 
   if (connectedUser) { 
      message.name = connectedUser; 
   } 
   conn.send(JSON.stringify(message)); 
};
  
//****** 
//UI selectors block 
//******
var loginPage = document.querySelector('#loginPage'); 
var usernameInput = document.querySelector('#usernameInput'); 
var loginBtn = document.querySelector('#loginBtn'); 
var sendMsgBtn = document.querySelector('#sendMsgBtn'); 

var callPage = document.querySelector('#callPage'); 
var callToUsernameInput = document.querySelector('#callToUsernameInput');
var callBtn = document.querySelector('#callBtn'); 

var chatArea = document.querySelector('#chatarea'); 
var msgInput = document.querySelector('#msgInput'); 

var hangUpBtn = document.querySelector('#hangUpBtn');
  
var localVideo = document.querySelector('#localVideo'); 
var remoteVideo = document.querySelector('#remoteVideo'); 

var RTCPeerConnection; 
var dataChannel;
var stream;
  
callPage.style.display = "none";

// Login when the user clicks the button 
loginBtn.addEventListener("click", function (event) { 
   name = usernameInput.value;
   if (name.length > 0) { 
      send({ 
         type: "login", 
         name: name 
      }); 
   }
	
});
  
function handleLogin(success) { 
   if (success === false) { 
      alert("Ooops...try a different username"); 
   } else { 
      loginPage.style.display = "none"; 
      callPage.style.display = "block";
		
      //********************** 
      //Starting a peer connection 
      //********************** 
		
      //getting local video stream 
      navigator.webkitGetUserMedia({ video: true, audio: true, RtpDataChannels: true }, function (myStream) { 
         stream = myStream; 
			
        //displaying local video stream on the page 
		localVideo.srcObject = stream;
			
         //using Google public stun server 
         var configuration = { 
            "iceServers": [{ "url": "stun:stun2.1.google.com:19302" }]
         }; 
			
         RTCPeerConnection = new webkitRTCPeerConnection(configuration); 
			
         // setup stream listening 
         RTCPeerConnection.addStream(stream); 
			
         //when a remote user adds stream to the peer connection, we display it 
         RTCPeerConnection.onaddstream = function (e) { 
            //remoteVideo.src = window.URL.createObjectURL(e.stream); 
            remoteVideo.srcObject = e.stream; 			
         };
			
         // Setup ice handling 
         RTCPeerConnection.onicecandidate = function (event) { 
            if (event.candidate) { 
               send({ 
                  type: "candidate", 
                  candidate: event.candidate 
               }); 
            } 
         }; 
		openDataChannel();	
      }, function (error) { 
         console.log(error); 
      }); 		
   } 
};

//creating data channel 
function openDataChannel() { 
   var dataChannelOptions = { 
      reliable:true 
   }; 
   dataChannel = RTCPeerConnection.createDataChannel("myDataChannel", dataChannelOptions);
   dataChannel.onerror = function (error) { 
      console.log("Error:", error); 
   };
   dataChannel.onmessage = function (event) { 
      console.log("dataChannel got message:", event); 
   }; 
   dataChannel.onclose = function () { 
      console.log("data channel is closed"); 
   };    

	//when user clicks the "send message" button 
	sendMsgBtn.addEventListener("click", function (event) { 
	   console.log('sending....');
	   var val = msgInput.value; 
	   //sending a message to a connected peer 
	   dataChannel.send(val); 
	   msgInput.value = ""; 
	   chatArea.innerHTML += name + " sent: " + val + "<br />"; 
	});    
} 
  
//initiating a call 
callBtn.addEventListener("click", function () { 
console.log('calling...');
   var callToUsername = callToUsernameInput.value;
   if (callToUsername.length > 0) { 
      connectedUser = callToUsername;
      // create an offer 
      RTCPeerConnection.createOffer(function (offer) { 
         send({ 
            type: "offer", 
            offer: offer 
         }); 	
         RTCPeerConnection.setLocalDescription(offer); 
      }, function (error) { 
         alert("Error when creating an offer"); 
      });		
   } 
});
  
//when somebody sends us an offer 
function handleOffer(offer, name) { 
   connectedUser = name; 
   RTCPeerConnection.setRemoteDescription(new RTCSessionDescription(offer));
	
   //create an answer to an offer 
   RTCPeerConnection.createAnswer(function (answer) { 
      RTCPeerConnection.setLocalDescription(answer); 
		
      send({ 
         type: "answer", 
         answer: answer 
      }); 
		
   }, function (error) { 
      alert("Error when creating an answer"); 
   }); 
};
  
//when we got an answer from a remote user
function handleAnswer(answer) { 
   RTCPeerConnection.setRemoteDescription(new RTCSessionDescription(answer)); 
};
  
//when we got an ice candidate from a remote user 
function handleCandidate(candidate) { 
   RTCPeerConnection.addIceCandidate(new RTCIceCandidate(candidate)); 
};
   
//hang up 
hangUpBtn.addEventListener("click", function () { 
   send({ 
      type: "leave" 
   });  	
   handleLeave(); 
});
  
function handleLeave() { 
   connectedUser = null; 
   remoteVideo.src = null; 
	
   RTCPeerConnection.close(); 
   RTCPeerConnection.onicecandidate = null; 
   RTCPeerConnection.onaddstream = null; 
};
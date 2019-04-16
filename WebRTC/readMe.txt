README:

This code example is not a unique piece of work, it is the result of following various tutorials on WebRTC, see http://www.webrtc.org.

HOW IT WORKS:

A JavaScript web socket connects a user to a node server.
When you log in a peer to peer connection with a Google Ice server is created.
When you want to connect to another server you send them an offer.
The RTCPeerToPeer connection is used to create the offer and it is sent via the node server.
The other user sends an answer to the offer, similarly generated using the RTCPeerToPeer connection.

To establish the best means of communication, each side looks for ice candidates and send exchanges them using the node server.
The ice candidate is a description of the communication protocols that could be used, the exchange continues until both sides agree on a candidate.
The exchange continues after communication is established in case there is a more suitable solution.

The RTCPeerToPeer connection is then used to create a dataChannel for direct communication.

THIS DEMONSTRATES EXPOSURE TO:

node.js
JavaScript websockets
WebRTC



README
=======================================
View these instructions and the images provided. Feel free to experiment 
with the hosted version, temporarily hosted at:

https://search.gardeningsingles.com
=======================================
PAGES:

REGISTER
Register as a new user or user

LOGIN
login with your email and password

DASHBOARD
Dashboard is the landing page where you can view candidates and their 
rate in their chosen currency

ADDCANDIDATE
Click on the add candidate button to enter a rate and currency

CONVERTCANDIDATERATE
Click on the convert candidate rate button to convert the candidates rate 
to different currencies. You can also save this to the candidate record.
=======================================
TESTING:

Currently the testing has been manual however I plan to add unit testing. 
I have confirmed that currency conversions match mathematical conversions 
done using the rates provided.
 
It uses an online currency rates api which will default to stored rates if the 
api does not return status 200. I have verified that the online rates convert 
forwards and backwards without any drift in value however the stored rates when 
converted forwards and backwards show a significant drift in the calculated rate. 


<?php

return [
    
   //----- Response Code For Rest API- These codes are also used for HTTP status code -----//
    200 => 'Data Found',
    404 => 'Data Not Found',

    
    103 =>'Checkpoint',
    503 =>'Service Unavailable',
    500 => 'Internal Server Error',
    422 =>'Unprocessable Entity',
    406 =>'Not Acceptable',
    202 =>'Accepted',
    401 => 'Unauthorized Access',

    //---------- End HTTP status code -----------------------//


   //------------ General 5001-5100 -------------//
    5001 => 'Data added successfully.',
    5002 => 'Data updated successfully.',
    5003 => 'Something went wrong.',
    5004 => 'OK.',
    5005 => 'Data deleted successfully.',
    // 5006 => 'Validation code for all APIs.',
    // 5007 => '', // Uploaded data size exceeds maximum limit of 8MB.
    // 5008 => '', // Uploaded file exceeds maximum file upload limit. Max limit is 2MB.

    //------------ End- General 5001-5100 -------------//


    //------------ Register, Login Module 1101-1200 -------------//
    1101 => 'You are successfully registered. Please check your email for login info.',
    1102 => 'You are successfully logged in.',
    1103 => 'You have entered invalid credentials.',
    

];

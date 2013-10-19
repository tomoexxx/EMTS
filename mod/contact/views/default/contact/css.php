<?php
/*
Contact Form by html-form-guide.com
You can customize all the aspects of the form in this style sheet
All the style elements use form id selector(notice the #contactus). So, including this
stylesheet does not affect the other elements at all!
*/
?>

.contact-fieldset
{
   width:440px;
   padding:20px;
   border:1px solid #ccc;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
-khtml-border-radius: 10px;
border-radius: 10px;   
}

.contact-legend
{
   font-family : Arial, sans-serif;
   font-size: 1.8em;
   font-weight:bold;
   color:#333;
}

.contact-label
{
   font-family : Arial, sans-serif;
   font-size:1.0em;
   font-weight: bold;
}

.contact-text
{
  font-family : Arial, Verdana, sans-serif;
  font-size: 1.0em;
  line-height:140%;
  color : #000; 
  padding : 3px; 
  border : 1px solid #999;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;

  height:25px;
  width:300px;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}

.contact-zip
{
  font-family : Arial, Verdana, sans-serif;
  font-size: 1.0em;
  line-height:140%;
  color : #000; 
  padding : 3px; 
  border : 1px solid #999;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;

  height:25px;
  width:100px;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}

#contactus,
.contact-scaptcha
{
  width:60px;
  height:18px;
}

.contact-submit
{
   font-size: 1.0em;
   width:100px;
   height:30px;
   padding-left:0px;
   
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}

.contact-textarea
{
  font-family : Arial, Verdana, sans-serif;
  font-size: 1.0em;
  line-height:140%;
  color : #000; 
  padding : 3px; 
  border : 1px solid #999;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;

  height:150px;
  width:350px;
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
   border-radius: 8px;  
}

.contact-text:focus,
.contact-textarea:focus
{
  color : #009;
  border : 1px solid #990000;
  background-color : #ffff99;
  font-weight:bold;
}

.contact-container
{
   margin-top:8px;
   margin-bottom: 10px;
}

.contact-error
{
   font-family: Verdana, Arial, sans-serif; 
   font-size: 1.0em;
   color: #900;
   background-color : #ffff00;
}

.contact-antispam
{
   padding:2px;
   border-top:1px solid #EEE;
   border-left:0;
   border-right:0;
   border-bottom:0;
   width:350px;
}

.contact-antispam > legend
{
   font-family : Arial, sans-serif;
   font-size: 1.0em;
   font-weight:bold;
   color:#333;   
}

.contact-short_explanation
{
   font-family : Arial, sans-serif;
   font-size: 0.8em;
   color:#333;   
}

/* spam_trap: This input is hidden. This is here to trick the spam bots*/
.contact-spmhidip
{
   display:none;
   width:10px;
   height:3px;
}

#fg_crdiv
{
   font-family : Arial, sans-serif;
   font-size: 0.6em;
   opacity: .2;
   -moz-opacity: .2;
   filter: alpha(opacity=20);   
}

#fg_crdiv p
{
    display:none;
}

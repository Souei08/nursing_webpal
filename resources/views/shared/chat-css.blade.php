<style type="text/css">
  body {
    overflow: hidden;
  }
  .inbox {
    /*padding-top: 64px;*/
  }
  .inbox .card {
     background: #fff;
     transition: 0.5s;
     border: 0;
     border-radius: 0.55rem;
     position: relative;
     width: 100%;
  }
   .inbox .chat-app .people-list {
     width: 280px;
     position: absolute;
     left: 0;
     top: 0;
     padding: 20px;
     z-index: 7;
  }
   .inbox .chat-app .chat {
     margin-left: 280px;
     border-left: 1px solid #eaeaea;
  }
   .inbox .people-list {
     -moz-transition: 0.5s;
     -o-transition: 0.5s;
     -webkit-transition: 0.5s;
     transition: 0.5s;
  }
   .inbox .people-list .chat-list li {
     padding: 10px 15px;
     list-style: none;
     border-radius: 3px;
  }
   .inbox .people-list .chat-list li:hover {
     background: #efefef;
     cursor: pointer;
  }
   .inbox .people-list .chat-list li.active {
     background: #efefef;
  }
   .inbox .people-list .chat-list li .name {
     font-size: 15px;
  }
   .inbox .people-list .chat-list img {
     width: 45px;
     height: 45px;
     border-radius: 50%;
  }
   .inbox .people-list img {
     float: left;
     border-radius: 50%;
  }
   .inbox .people-list .about {
     float: left;
     padding-left: 8px;
  }
   .inbox .people-list .status {
     color: #999;
     font-size: 13px;
  }
   .inbox .chat {
     height: calc(100vh - 64px);
  }
   .inbox .chat .chat-header {
     padding: 15px 20px;
     border-bottom: 2px solid #f4f7f6;
     height: 10%;
  }
   .inbox .chat .chat-header img {
     float: left;
     border-radius: 40px;
     width: 40px;
     height: 40px;
  }
   .inbox .chat .chat-header .chat-about {
     float: left;
     padding-left: 10px;
  }
   .inbox .chat .chat-history {
     height: 73%;
     overflow-x: hidden;
     overflow-y: scroll;
     padding: 20px;
     border-bottom: 2px solid #fff;
  }
   .inbox .chat .chat-history ul {
     padding: 0;
  }
   .inbox .chat .chat-history ul li {
     list-style: none;
     margin-bottom: 30px;
  }
   .inbox .chat .chat-history ul li:last-child {
     margin-bottom: 0px;
  }
   .inbox .chat .chat-history .message-data {
     margin-bottom: 15px;
  }
   .inbox .chat .chat-history .message-data img {
     border-radius: 40px;
     width: 40px;
     height: 40px;
  }
   .inbox .chat .chat-history .message-data-time {
     color: #434651;
     padding-left: 6px;
  }
   .inbox .chat .chat-history .message {
     color: #444;
     padding: 18px 20px;
     line-height: 26px;
     font-size: 16px;
     border-radius: 7px;
     display: inline-block;
     position: relative;
  }
   .inbox .chat .chat-history .message:after {
     bottom: 100%;
     left: 7%;
     border: solid transparent;
     content: " ";
     height: 0;
     width: 0;
     position: absolute;
     pointer-events: none;
     border-bottom-color: #fff;
     border-width: 10px;
     margin-left: -10px;
  }
   .inbox .chat .chat-history .my-message {
     background: #efefef;
  }
   .inbox .chat .chat-history .my-message:after {
     bottom: 100%;
     left: 30px;
     border: solid transparent;
     content: " ";
     height: 0;
     width: 0;
     position: absolute;
     pointer-events: none;
     border-bottom-color: #efefef;
     border-width: 10px;
     margin-left: -10px;
  }
   .inbox .chat .chat-history .other-message {
     background: #e8f1f3;
     text-align: right;
  }
   .inbox .chat .chat-history .other-message:after {
     border-bottom-color: #e8f1f3;
     left: 87%;
  }
   .inbox .chat .chat-message {
     height: 10%;
     padding: 20px;
  }
   .inbox .online, .inbox .offline, .inbox .me {
     margin-right: 2px;
     font-size: 8px;
     vertical-align: middle;
  }
   .inbox .online {
     color: #86c541;
  }
   .inbox .offline {
     color: #e47297;
  }
   .inbox .me {
     color: #1d8ecd;
  }
   .inbox .float-right {
     float: right;
  }
   .inbox .clearfix:after {
     visibility: hidden;
     display: block;
     font-size: 0;
     content: " ";
     clear: both;
     height: 0;
  }
   @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
     .inbox .chat-app .chat-list {
       height: 480px;
       overflow-x: auto;
    }
     .inbox .chat-app .chat-history {
       height: calc(100vh - 350px);
       overflow-x: auto;
    }
  }
</style>
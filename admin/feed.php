<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style media="screen">

body{
font-family: 'Open Sans', sans-serif;
}

.noti{
  display: flex;
  flex-direction: column;
  justify-content: center;
  border: 1px solid #dadce0;
  background: white;
  box-shadow: 0 0 20px 0 rgb(62 28 131 / 10%)!important;
  border-radius: 6px;
  margin: 2px;
  margin-top: 15px;
  height: 100%;
}

.noti-badge span{
  background-color: orange;
  padding: 1px 7px;
  color: white;
  border-radius: 0px 12px 12px 0px;
  font-size: 13px;
  padding-top: 0px;
}

.noti-text p{
font-size: 13px;
padding: 0px 10px;
}

::selection{
  background: rgb(0,123,255,0.3);
}
.wrapper{
  max-width: 100%;
  padding: 15px 3px;
}
.wrapper .parent-tab,
.wrapper .child-tab{
  margin-bottom: 8px;
  border-radius: 3px;
}
.wrapper .parent-tab label,
.wrapper .child-tab label{
  background: #7A3DE2;
  padding: 10px 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  cursor: pointer;
  border-radius: 3px;
  position: relative;
  z-index: 99;
  transition: all 0.3s ease;
}
.wrapper .parent-tab label:hover{
  background: #4d288d;
}
.parent-tab input:checked ~ label,
.child-tab input:checked ~ label{
  border-radius: 3px 3px 0 0;
  background: #7A3DE2;
}
.wrapper label span{
  color: #fff;
  font-size: 14px;
  font-weight: 500;
}
.wrapper .child-tab label span{
  font-size: 14px;
}
.parent-tab label .icon{
  position: relative;
  height: 30px;
  width: 30px;
  font-size: 15px;
  color: #7A3DE2;
  display: block;
  background: #fff;
  border-radius: 50%;
}
.wrapper .child-tab label .icon{
  height: 27px;
  width: 27px;
}
.parent-tab label .icon i{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.parent-tab input:checked ~ label .icon i:before,
.child-tab input:checked ~ label .icon i:before{
  content: '\f068';
}
.wrapper .parent-tab .content,
.wrapper .child-tab .sub-content{
  max-height: 0px;
  overflow: hidden;
  background: #fff;
  border-radius: 0 0 3px 3px;
  transition: all 0.4s ease;
}
.parent-tab input:checked ~ .content,
.child-tab input:checked ~ .sub-content{
  max-height: 100vh;
}
.tab-3 input:checked ~ .content{
  padding: 15px 4px;
}
.parent-tab .content p,
.child-tab .sub-content p{
  padding: 12px 5px;
  font-size: 13px;
}
.child-tab .sub-content p{
  font-size: 13px;
}
input[type="radio"],
input[type="checkbox"]{
  display: none;

}

.qu {
  margin: 20px -8px -4px -8px;
  padding: 18px 10px;
  border: 1px solid #dadce0;
  background: #f3f3f3;

}

.qu span{
  font-family: monospace;
      font-size: 16px;
      color: #999797;
      font-weight: bold;
}

#Statusp{

    width: 100%;
    height: 100%;
    animation: pulse 6s infinite;
  }

  @keyframes pulse {
    0% {
      background-color: #001F3F;
    }
    100% {
      background-color: #FF4136;
    }
}
    </style>
  </head>
  <body>
<div class="noti">

<div class="noti-badge">
<span><i class="fa-solid fa-bell"></i> Notification</span>
</div>

<div class="noti-text">
  <p>Warm Tip: Complete Task offer and get instant rewards when you Redeem. (Valid for Paytm & Giftcards Only)
<br><br>
  Note: Amazon Gift Card or BGMI UC redeem can take up to 12-24 hrs. Please be patient.
<br><br>
  #PollPeEarnKarBefikar</p>
</div>

</div>

<div class="noti" style="background:#7A3DE2; color:white;">

<div class="noti-badge">
<span id="Statusp" style="font-weight: 600;"><i class="fa-solid fa-bullhorn"></i> Payment Status</span>
</div>

<div class="noti-text" style="text-align: center; font-family: monospace;">
  <p>All the pending payments till the 22nd of April, 06:00 PM have been completed, rest of the pending payment requests will be processed within 12-24 hours.</p>
</div>

</div>

<div class="qu">
  <span>Frequently Asked Questions <i class="fa-solid fa-question"></i></span>
</div>

<div class="wrapper">
  <!-- Accordion Heading One -->
  <div class="parent-tab">
    <input type="radio" name="tab" id="tab-1" checked>
    <label for="tab-1">
      <span>Accordion Heading One</span>
      <div class="icon"><i class="fas fa-plus"></i></div>
    </label>
    <div class="content">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing thelit. Quam, repellendus facere, id porro magnam blanditiiss quoteos dolores ratione quidem ipsam esse quos pariatur, repellat obcaecati!</p>
    </div>
  </div>

  <!-- Accordion Heading Two -->
  <div class="parent-tab">
    <input type="radio" name="tab" id="tab-2">
    <label for="tab-2">
      <span>Accordion Heading Two</span>
      <div class="icon"><i class="fas fa-plus"></i></div>
    </label>
    <div class="content">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing thelit. Quam, repellendus facere, id porro magnam blanditiiss quoteos dolores ratione quidem ipsam esse quos pariatur, repellat obcaecati!</p>
    </div>
  </div>

  <!-- Accordion Heading Three -->
  <div class="parent-tab tab-3">
    <input type="radio" name="tab" id="tab-3">
    <label for="tab-3" class="tab-3">
      <span>Accordion Heading Three</span>
      <div class="icon"><i class="fas fa-plus"></i></div>
    </label>
    <div class="content">
      <!-- Sub Heading One -->
      <div class="child-tab">
        <input type="checkbox" name="sub-tab" id="tab-4">
        <label for="tab-4">
          <span>Sub Heading One</span>
          <div class="icon"><i class="fas fa-plus"></i></div>
        </label>
        <div class="sub-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing thelit dolor. Utfacilis labore, exercitationem fuga minima a illo modi vitaerse dignissimos? Vero?</p>
        </div>
      </div>
      <!-- Sub Heading Two -->
      <div class="child-tab">
        <input type="checkbox" name="sub-tab" id="tab-5">
        <label for="tab-5">
          <span>Sub Heading Two</span>
          <div class="icon"><i class="fas fa-plus"></i></div>
        </label>
        <div class="sub-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing thelit dolor. Utfacilis labore, exercitationem fuga minima a illo modi vitaerse dignissimos? Vero?</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Accordion Heading Four -->
  <div class="parent-tab">
    <input type="radio" name="tab" id="tab-6">
    <label for="tab-6">
      <span>Accordion Heading Four</span>
      <div class="icon"><i class="fas fa-plus"></i></div>
    </label>
    <div class="content">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing thelit. Quam, repellendus facere, id porro magnam blanditiiss quoteos dolores ratione quidem ipsam esse quos pariatur, repellat obcaecati!</p>
    </div>
  </div>
</div>


  </body>
</html>

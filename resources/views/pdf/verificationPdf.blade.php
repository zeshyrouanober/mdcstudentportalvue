<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="verification-pdf-container">
      <div class="verification-header">
        <img src="C:\xampp\htdocs\mdcstudentportalvue\public\images\school-logo2.png" alt=""><br>
        <label class="title">Mater Dei College</label><br>
        <label>Student Portal </label><br>
        <label class="title2">Available Verifications</label><br><br>
      </div>
      <div class="verification-data">
        @foreach ($availableVerifications as $av )
          <label class="verification">{{$av->verification}}</label><br><br>
        @endforeach
      </div>
    </div>
  </body>

  <style media="screen">
    .verification-pdf-container{
      margin: 0;
      padding: 0px;
      font-weight: normal;

    }
    .verification-header{
      text-align: center;
      padding: 0px!important;
    }
    .verification-header .title{
      font-size: 15px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .verification-header .title2{
      font-size: 12px;
    }

  </style>
</html>

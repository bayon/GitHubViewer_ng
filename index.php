<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    <title>Angular Wiki-P</title>
    <style>
          .dev-fixed-footer{position:fixed;bottom:0px;left:0px;height:100px;overflow-y:scroll;border:solid 1px #ccc;}
          .scroller{ padding:10px;line-height:2.2;height:200px;max-height:200px;background-color:#333;border:5px solid #000;border-radius:5px; color:orange;overflow:hidden;overflow-y:scroll;margin-bottom:30px;margin-top:15px;}
          #repo_list a{color:orange;text-decoration:none;}
          #repo_list a:hover{color:green;}
          ul{list-style:none;}
          .pg-content input, .pg-content button{width:100%;  margin-top:5px;}
          @media (min-width: 0px) and (max-width: 768px) {
            h1{font-size:24px;}
          }
    </style>

  </head>
  <body >
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar" >
          <div class="navbar visible-desktop">
            <div class="navbar-inner ">
                <ul class="nav navbar-nav">
                  <li>
                    <a class="navbar-brand" href="dashboard.php?c=dashboard&m=home" style="color:#fff !important;">F.Bayon Forte</a>
                  </li>
                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Features <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li> <a id='public1' href='?c=public&m=public1'> GitHub API </a></li>
                          <li> <a id='public2' href='?c=public&m=public2'> Responsive Design </a></li>
                          <li> <a id='public3' href='?c=public&m=public3'> angularJS </a></li>
                          <li> <a id='public3' href='?c=public&m=public3'> Bootstrap </a></li>
                      </ul>
                  </li>
                </ul>
            </div>
          </div>
        </div>
    </nav>
      <div class="container pg-content" style="margin-top:65px;">
      <h1>GitHub Repo Viewer (ng)</h1>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left" style="padding:0;">
          <input   id="searchTerm" placeholder="github username" value="bayon">

         </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right margin" style="padding:0;">
            <button id="search" type="button" class=" ">search</button>
         </div>

        <div id="wrapper" ng-app="myApp">
              <div ng-controller="DataCtrl">
                  <div class="scroller col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                           <ul id="repo_list" ng-repeat="student in data">
                              <li > {{student.name}} &nbsp;
                                 <a href=" {{student.html_url}}" > {{student.html_url}}</a>
                               </li>

                          </ul>
                    </div>
              </div>
        </div>
      </div>
<script>
var app =  angular.module('myApp', []);
app.controller('DataCtrl', function($scope,$http) {
  $("#search").click(function(){
       //console.log('search was clicked');
       var searchTerm = $("#searchTerm").val();
          $http.get("https://api.github.com/users/"+searchTerm+"/repos")
          .then(function(response) {
              $scope.data = response.data;
          });
          //console.log($scope.data);
  });
});
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

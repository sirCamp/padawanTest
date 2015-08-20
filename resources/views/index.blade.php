<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ecommerce</title>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="bower_components/angular-ui-notification/dist/angular-ui-notification.min.css">
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
 
    <body ng-app="ecommerceApp">
    <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper blue darken-3">
                    
                    
                    <a href="/#/" class="brand-logo">{{$titleApp}}</a>
                    

                    <ul class="right hide-on-med-and-down">

                        
                        <li><a href="/#/product"><i class="material-icons">view_module</i></a></li>
                        <li><a ng-click="reloadPage()"><i class="material-icons">refresh</i></a></li>
                    </ul>
                    
                </div>

            </nav>
        </div>
        <div class="container" style="width:95%">

        <div ng-view class="view-frame"></div>
      
    </div>
    <footer class="page-footer blue darken-3">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">Take a look to this framework.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://laravel.com/docs/5.1/releases">Laravel 5.1</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://angularjs.org">AngularJS</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://materializecss.com/">MaterializeCSS</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://www.google.com/design/icons/">Goolge Material Icon</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            made by <a href="http://stefanocampse.xyz">SirCamp</a>
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
    </footer>
    </body>

    <!-- Application Dependencies -->
    <script type="text/javascript" src="js/core/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/core/materialize.js"></script>
    <script type="text/javascript" src="js/core/angular.js"></script>
    <script type="text/javascript" src="js/core/angular-route.min.js"></script>
    <script type="text/javascript" src="js/core/angular-cookies.min.js"></script>
    <script type="text/javascript" src="js/core/angular-messages.min.js"></script>
    <script type="text/javascript" src="js/core/angular-resource.min.js"></script>
    <script type="text/javascript" src="js/core/angular-materialize.js"></script>
    <script type="text/javascript" src="js/core/angular-animate.js"></script>
    <script type="text/javascript" src="js/core/angular-touch.js"></script>
    <script type="text/javascript" src="bower_components/angular-ui-notification/dist/angular-ui-notification.min.js"></script>

    
    

    <!-- Application Scripts -->
    <script type="text/javascript" src="js/app/app.js"></script>
    <script type="text/javascript" src="js/app/controllers.js"></script>
    <script type="text/javascript" src="js/app/services.js"></script>
    <script type="text/javascript" src="js/app/filters.js"></script>
    <script type="text/javascript" src="js/app/directives.js"></script>
   
</html>
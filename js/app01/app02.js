/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//var app01=angular.module('app01',['ngRoute',]);


app01 = angular.module('app01',['ngRoute','ngResource','ngSanitize','ngFileUpload']);



app01.run(['$location', '$rootScope', function($location, $rootScope) {
    $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
        $rootScope.title = current.$$route.title;
		//console.log($location.$$path);
    });
	//console.log($location.$$path);
}]);



app01.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);

// We can write our own fileUpload service to reuse it in the controller
app01.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, name){
	
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .then(function successCallback(response) {
            console.log(response.data);
			alert(response.data);
         },
         function errorCallback(response) { 
            console.log(response.data);
			alert(response.data);
         });
     }
 }]);




app01.controller('homeCtrl',['$scope','$routeParams','$http','$location','$sce','$route','fileUpload', function($scope,$routeParams,$http,$location,$sce,$route,fileUpload){
    $scope.datamodel={};
    $scope.datamodel.provider={};
  
	
	$scope.path="";
	$scope.$on('$routeChangeSuccess',function(){
	$scope.path= $location.$$path;
	
	console.log('-------');
	console.log("getPath  "+$scope.path);
	 var url = 'api.php'+$scope.path;
	
     $http.get(url).success(function(response){
		   $scope.customer = php_crud_api_transform(response).customer;
		
	   });
	
		
	});
	
	
	//failed trial
$scope.onFileSelect = function(file) {
 console.log("_____"+file)
    if (!file) return;
    Upload.upload({
        url: '/upload.php?file='+file
       
      }).then(function(resp) {
      // file is uploaded successfully
        console.log(resp.data);
		datamodel.provider.img=resp.data;
      });    
  };
	
	
	
	// for posting	

 var url = 'api.php/sound';
		   angular.forEach($scope.sound, function(item){
		   console.log(item);
                $http.post(url,item).success(function(response){ 
				 });
               });
 		

		$scope.getSelectData= function(table){
		console.log(table);
		var fetchurl = 'api.php/'+table;
		$http.get(fetchurl).success(function(response){ 							  
				  $scope[table]=php_crud_api_transform(response)[table];

			  });

			}	


        $scope.datamodel.capacity=[{'no':'', 'cost':''}];
        $scope.datamodel.vehicle=[{'type':'', 'capacity':''}];
	    $scope.capacity=[{'no':'', 'cost':''}];
	   
	    
	 $scope.addRow = function(tablename){
		var rows={'no':'', 'cost':''};
	   return $scope.datamodel[tablename].push(rows);
		};
	
	$scope.addVehicle = function(tablename){

		var rows={'type':'', 'capacity':''};
	return $scope.datamodel[tablename].push(rows);
	};
	
	$scope.removeRow = function(tablename){
		var selectedrows = document.getElementsByName(tablename+'rows');
		for (var i = selectedrows.length -1; i >=0 ; i--) {
			if(selectedrows[i].checked){
				$scope.datamodel[tablename].splice(i,1);
			}
		}
	};
	
	$scope.register = function(registerdata){
	console.log(registerdata);
	$http.post('api.php/account',registerdata).success(function(response){ 
				});
	
	}
	
	
	
	// upload file
	$scope.uploadFile = function(){
        var file = $scope.datamodel.myFile;
        console.log('file is ' );
        console.dir(file);

        var uploadUrl = "uploadimage.php";
        var text = $scope.name;
        fileUpload.uploadFileToUrl(file, uploadUrl, text);
   };
	
	
	
	$scope.submit= function(data){
	
	var s = angular.toJson(data);
	
	$scope.provider=angular.toJson(data.provider);
	$scope.capacity=angular.toJson(data.capacity);
	$scope.vehicle=angular.toJson(data.vehicle);
	console.log($scope.provider);
	
	console.log($scope.vehicle);
 var url = 'api.php/providers';
 
 
     $http.post(url,$scope.provider).success(function(response){ 
			 angular.forEach(data.capacity, function(item1){
		  	   item1.providerid=response;
			   console.log(item1);
			    if(item1.no!='' || item1.cost!=''){
                $http.post('api.php/capacity',item1).success(function(response1){ 
				console.log("cap______"+response1);
				 });}
               });
			data.vehicle.id=response;			   
			  angular.forEach(data.vehicle, function(item2){
			  if(item2.type!=''){			  
                $http.post('api.php/vehicle',item2).success(function(response2){			
				 });}
               });		
				
	   });
				
		 
  

	}

	
}]);





app01.controller('budgetCtrl' , function($scope){
	$scope.budgetmodel={};
	$scope.budgetmodel.budget={};
	$scope.budgetmodel.budget.lowamount=[{id:1,image:'img/portfolio_pic1.jpg',amount:'200,000',category:"two"},{id:2,image:'img/portfolio_pic2.jpg',amount:'300,000',category:"three"},{id:3,image:'img/portfolio_pic3.jpg',amount:'350,000',category:"three50"}];
	$scope.budgetmodel.budget.avgamount=[{id:1,image:'img/portfolio_pic4.jpg',amount:'400,000'},{id:2,image:'img/portfolio_pic5.jpg',amount:'450,000'},{id:3,image:'img/portfolio_pic6.jpg',amount:'500,000'}];
	$scope.budgetmodel.budget.highamount=[{id:1,image:'img/portfolio_pic7.jpg',amount:'550,000'},{id:2,image:'img/portfolio_pic8.jpg',amount:'600,000'},{id:3,image:'img/portfolio_pic1.jpg',amount:'650,000'}];
	 


});


app01.config(['$routeProvider',function($routeProvider){
    $routeProvider.when('/budget' ,{templateUrl:'budget.php'})   
   
    .when('/register',{templateUrl:'register.html'})
     .when('/contactus',{templateUrl:'contactus.html'})
	 .when('/slides',{templateUrl:'slides.html'})	
    .when('/providers',{  templateUrl:'providers.html'}).
    when('/biodata',{templateUrl:'viewBioData.jsp'}).
    when('/managesms',{templateUrl:'manageSMS.jsp'}).
    when('/newuser', {templateUrl:'registeruser.jsp'}).
    when('/agents',{templateUrl:'showAgents.jsp'}).
    when('/vanswers',{templateUrl:'viewAnswers.jsp'}).
    when('/qstns',{templateUrl:'viewQuestions.jsp'}).
 when('/editmsg',{templateUrl:'manageSMS.jsp'}); 
        
        
        
}]);





    
    

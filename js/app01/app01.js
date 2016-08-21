/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//var app01=angular.module('app01',['ngRoute',]);


app01 = angular.module('app01',['ngRoute','ngResource','ngSanitize','ngFileUpload']);

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

//We can write our own fileUpload service to reuse it in the controller
// app01.service('fileUpload', ['$http', function ($http) {
    // this.uploadFileToUrl = function(file, uploadUrl, name){
	
         // var fd = new FormData();
         // fd.append('file', file);
         // fd.append('name', name);
         // $http.post(uploadUrl, fd, {
             // transformRequest: angular.identity,
             // headers: {'Content-Type': undefined,'Process-Data': false}
         // })
         // .then(function successCallback(response) {
            // console.log(response.data);
			// alert(response.data);
         // },
         // function errorCallback(response) { 
            // console.log(response.data);
			// alert(response.data);
         // });
     // }
 // }]);

app01.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, name){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .success(function(){
            console.log("Success");
         })
         .error(function(){
            console.log("Error");
         });
     }
 }]);
 
 
 
 app01.factory("services", ['$http', function($http) {
  var serviceBase = 'services/'
    var obj = {};
	 obj.getCustomer = function(tablename,customerID,ctry){
	  return $http.get(serviceBase + 'fetch?customer='+tablename +'&&id=' + customerID +'&&country='+ctry);
    }
	 obj.login = function (auth) {
	   var x=angular.toJson(auth);	
     return $http.post(serviceBase + 'login', x).then(function (results) {
	 console.log(results.status);
         return results;
    });
	};
	
	
	 obj.insertCustomers = function (datamodel) {

    return $http.post(serviceBase + 'insert', angular.toJson(datamodel)).then(function (results) {
				return results
			});
	};
	
	obj.updateCustomer = function (datamodel) {

	      return $http.post(serviceBase + 'update', angular.toJson(datamodel)).then(function (results) {
				return results
				
				console.log("RESULTS "+results);
			});
	};

	obj.deleteCustomer = function (id) {
	    return $http.delete(serviceBase + 'deleteCustomer?id=' + id).then(function (status) {
	        return status.data;
	    });
	};

    obj.getItems = function(category,cost){
		
        return $http.get(serviceBase + 'fetchitems?category='+category+' && cost='+cost);
    }
	
	

    return obj;   
}]);

 app01.controller('editCtrl',['$scope','$routeParams','$rootScope','$http','$location','$sce','$route','fileUpload','services', function($scope,$routeParams,$rootScope,$http,$location,$sce,$route,fileUpload,services){

//app01.controller('editCtrl', function ($scope, $rootScope, $location, $routeParams, services,fileUpload) {
    var customerID = ($routeParams.customerID) ? parseInt($routeParams.customerID) : 0;
    $rootScope.title = (customerID > 0) ? 'Edit Customer' : 'Add Customer';
    $scope.buttonText = (customerID > 0) ? 'Update Customer' : 'Add New Customer';
      var original = $scope.datamodel;
     // original._id = customerID;
      $scope.datamodel = angular.copy(original);
     // $scope.datamodel._id = customerID;

      $scope.isClean = function() {
        return angular.equals(original, $scope.datamodel);
      }

      $scope.deleteCustomer = function(datamodel) {
        $location.path('/');
        if(confirm("Are you sure to delete customer number: "+$scope.datamodel._id)==true)
        services.deleteCustomer($scope.datamodel.customerNumber);
      };

      $scope.saveCustomer = function(datamodel) {
        $location.path('/viewdetails');
        if (customerID <= 0) {
		
            services.insertCustomers(datamodel);
        }
        else {
            services.updateCustomer(customerID, datamodel);
        }
    };
	
	 $scope.login = function(auth) {
		console.log(auth);
            services.login($scope.auth);
       
		 $scope.isClean = function() {
        return angular.equals(original, $scope.datamodel);
      }}
	console.log($scope.datamodel);
		$scope.addRows=function(detailName) {
	
			if(typeof emptyColumns[detailName] === 'undefined'){
				var data = $scope.datamodel[detailName][0];
				var columns = {};
				for(var key in data){
					columns[key] = "";
				}
				//columns.action="3";
				
				emptyColumns[detailName] = angular.toJson(columns);
			}
			$scope.datamodel[detailName].splice($scope.datamodel[detailName].length+1,0,angular.fromJson(emptyColumns[detailName]));
		console.log($scope.datamodel[detailName]);
		};
		
		$scope.getSelectData= function(table){
		console.log(table);
		var fetchurl = 'api.php/'+table;
		$http.get(fetchurl).success(function(response){ 							  
				  $scope[table]=php_crud_api_transform(response)[table];

			  });

			} 
		 $scope.uploadFiles = function(files){
		var file = files;   
        console.dir(file);

        var uploadUrl = "save_form.php";
        var text = $scope.name;
		console.log(text);
        fileUpload.uploadFileToUrl(file, uploadUrl, text);
			};
   
         $scope.datamodel.provider={'id':''};
		
		$scope.datamodel.provider_detail=[{'id':'','providerid':'','cost':'', 'capacity':'','type':'','uom':'', 'location':'','location':'','area':'','img':''}];
          
   	var emptyColumns = {};
	   	$scope.addRow=function(detailName) {
	console.log(detailName);
			if(typeof emptyColumns[detailName] === 'undefined'){
				var data = $scope.datamodel[detailName][0];
				var columns = {};
				for(var key in data){
					columns[key] = "";
				}
				//columns.action="3";
				
				emptyColumns[detailName] = angular.toJson(columns);
			}
			$scope.datamodel[detailName].splice($scope.datamodel[detailName].length+1,0,angular.fromJson(emptyColumns[detailName]));
		console.log($scope.datamodel[detailName]);
		};

	
	
	}]);

 
 
 
 
 
 
 
 
 
 

app01.controller('homeCtrl',['$scope','$routeParams','$http','$location','$sce','$route','fileUpload','services', function($scope,$routeParams,$http,$location,$sce,$route,fileUpload,services){
    $scope.datamodel={};
   // $scope.datamodel.providers={};
   var serviceBase = 'services/'
	
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
	
	
	
	 $scope.search = function(data) {
		console.log(data);
		
          $scope.searchmodel=services.getItems(data.category,data.cost);
		  $http.get(serviceBase + 'fetchitems?category='+data.category+' && cost='+data.cost).success(function(response){
		   $scope.resultmodel =response;
			$scope.cart=[]
				var total=0;
	       $scope.addtocart = function pushtoarray(value,index) {
			var idx = $scope.cart.indexOf(value);
	    if (idx > -1) {
		  $scope.cart.splice(idx,1);
		   $scope.resultmodel.provider_detail[index].label="Add"
		   total=total-parseInt($scope.resultmodel.provider_detail[index].cost);	   
           $scope.totalcost=total;	
		}
		else {
		  $scope.cart.push(value);
		   $scope.resultmodel.provider_detail[index].label="Remove";
			total=total+parseInt($scope.resultmodel.provider_detail[index].cost);	   
			$scope.totalcost=total;
	   }
	  
	};
 });}
	
	
	
	
	// lookup data 
	
	 $http.get(serviceBase + 'lookup').success(function(response){
			  
			  $scope.lookup =response;
			  
              console.log( $scope.lookup);
			  
		  });
		 
	
	
	
	
	
	
	// for posting	
		$scope.sound={'id':'1','value':'try'};
            var url = 'api/api.php/sound';
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
        $scope.datamodel.provider={'id':''};
		
		$scope.datamodel.provider_detail=[{'id':'','providerid':'','cost':'', 'capacity':'','type':'','uom':'', 'location':'','location':'','area':'','img':''}];
      //  $scope.datamodel.capacity=[{'id':'','providerid':'','no':'', 'cost':''}];
        //$scope.datamodel.vehicle=[{'id':'','providerid':'','type':'', 'capacity':''}];
		// $scope.datamodel.vehicle=[{'id':'','providerid':'','type':'', 'capacity':'','cost':''}];
		 //$scope.datamodel.flowers=[{'id':'','providerid':'','type':'', 'uom':'','cost':''}];
		 //console.log($scope.datamodel.flowers);
		 
		 
        // $scope.datamodel.cake=[{'id':'','providerid':'','type':'', 'cost':''}];
	   // $scope.capacity=[{'no':'', 'cost':''}];
	   
	 	var emptyColumns = {};
	   	$scope.addRow=function(detailName) {
	
			if(typeof emptyColumns[detailName] === 'undefined'){
				var data = $scope.datamodel[detailName][0];
				var columns = {};
				for(var key in data){
					columns[key] = "";
				}
				//columns.action="3";
				
				emptyColumns[detailName] = angular.toJson(columns);
			}
			$scope.datamodel[detailName].splice($scope.datamodel[detailName].length+1,0,angular.fromJson(emptyColumns[detailName]));
		console.log($scope.datamodel[detailName]);
		};
	  
	   	$scope.addRows=function(pd,index) {
			$scope.datamodel={};
			$scope.pdetails={'pdid':'','id':'','providerid':'','cost':'', 'capacity':'','type':'','uom':'', 'location':'','location':'','area':'','img':''};
       	
			$scope.datamodel.provider_detail=pd;
			$scope.pdetails.id=$scope.datamodel.provider_detail[index].id;
		
	       
			$scope.datamodel.provider_detail.push($scope.pdetails);
		console.log($scope.datamodel.provider_detail);
		};
	   
	   
	   
	   // fetch data 
	   
	   
	    var fetchBase = 'services/';
       $http.get(fetchBase + 'customers').success(function(response){
		 console.log(response);
		  $scope.datamodel=response;
		
	   });
	   
	   
	   
	   
	    
	 // $scope.addRow = function(tablename){
		// var rows={'no':'', 'cost':''};
	   // return $scope.datamodel[tablename].push(rows);
		// };
	
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
	$scope.login = function(auth){
	console.log("trying to login------------------");
	console.log(auth);
	  $http.post(serviceBase + 'login', angular.toJson(auth)).success(function (results) {
				
				console.log(results);
				$scope.datamodel= results.data;
			 	$scope.message=results.msg;
				
				 $location.path('/providers');
		         
			}).error(function(response) {
					alert("Failed to Login");
					 $location.path('#/');
				});
	
	          }
	
	
	
	// $scope.register = function(registerdata){
	// console.log(registerdata);
	// $http.post('api.php/account',registerdata).success(function(response){ 
	    // console.log(response);
				// });
	
	// }
	 $scope.register = function(registerdata){	
	  $http.post(serviceBase + 'basicinsert', angular.toJson(registerdata)).success(function (results) {
				//$scope.datamodel= results.data;
			 	//$scope.message=results.msg;
				//$location.path('/viewdetails');
		         //console.log($scope.message+"___________other message ");
		         console.log(results);
				 
			}).error(function(response) {
					console.log("Failed to Register");
				});
	
	}
	
	
		 $scope.uploadFiles = function(files){
		var file = files;   
        console.dir(file);

        var uploadUrl = "save_form.php";
        var text = $scope.name;
		console.log(text);
        fileUpload.uploadFileToUrl(file, uploadUrl, text);
				};
	
	
	// upload file
	/* $scope.uploadFile = function(){
        var file = $scope.datamodel.myFile;
        console.log('file is ' );
        console.dir(file);

        var uploadUrl = "upload.php";
        var text = $scope.name;
        fileUpload.uploadFileToUrl(file, uploadUrl, text);
   }; */
   
   
   
   
   /*   $scope.uploadFile = function(){
        var file = $scope.myFile;
        console.log('file is '+file +'hakuna');
        console.dir(file);

        var uploadUrl = "save_form.php";
        var text = $scope.name;
		console.log(text);
        fileUpload.uploadFileToUrl(file, uploadUrl, text);
   };
 */
   
	
	var customerID = ($routeParams.customerID) ? parseInt($routeParams.customerID) : 0;
    $scope.message="";
	 $scope.saveCustomer = function(datamodel) {
				console.log("this is called"+angular.toJson(datamodel));
		  $http.post(serviceBase + 'insert', angular.toJson(datamodel)).success(function (results) {
				$scope.datamodel= results.data;
			 	$scope.message=results.msg;
				   
				   
				   
				    console.log("should be  a successful insert but its not"+results);
				// $location.path('/viewdetails');
		        // console.log($scope.message+"___________other message "+$scope.datamodel);
		        // console.log($scope.datamodel);
				 
			}).error(function(response) {
					console.log("Failed to start process");
				});
		
    };
	
	
	    
	
	 /* 
	$http.get(serviceBase + "customers").success(function(response){
		  console.log("FETCH DATA");	  
		 
		  $scope.datamodel=response;
		  console.log("we are here ------------------");
		   console.log(angular.toJson(response));
		
	   }); */ 
	
	
	
	
	
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


app01.controller('listCtrl', function ($scope, services,$http) {
 
  var serviceBase = 'services/';

  $http.get(serviceBase + 'customers').success(function(response){
		
	 //  $http.get(serviceBase + "customers").success(function(response){
		  
		  console.log(response);
		  $scope.datamodel=response;
		
	   });
	   
	   
      $scope.updateCustomer = function(datamodel) {
		  
		  alert("called");
            services.updateCustomer(datamodel);
			};
			
			
			
			
	   
	   
	   
});


 app01.directive('myDirective', function (httpPostFactory) {
    return {
        restrict: 'A',
        scope: true,
        link: function (scope, element, attr) {

            element.bind('change', function () {
                var formData = new FormData();
                formData.append('file', element[0].files[0]);
				console.log(element[0].files[0]);
                httpPostFactory('uploadimage.php', formData, function (callback) {
                   // recieve image name to use in a ng-src 
                    console.log(callback);
                });
            });

        }
    };
});

app01.factory('httpPostFactory', function ($http) {
    return function (file, data, callback) {
        $http({
            url: file,
            method: "POST",
            data: data,
            headers: {'Content-Type': undefined}
        }).success(function (response) {
            callback(response);
        });
    };
});











app01.controller('budgetCtrl' , function($scope){
	$scope.budgetmodel={};
	$scope.budgetmodel.budget={};
	$scope.budgetmodel.budget.lowamount=[{id:1,image:'img/portfolio_pic1.jpg',amount:'200,000',category:"two"},{id:2,image:'img/portfolio_pic2.jpg',amount:'300,000',category:"three"},{id:3,image:'img/portfolio_pic3.jpg',amount:'350,000',category:"three50"}];
	$scope.budgetmodel.budget.avgamount=[{id:1,image:'img/portfolio_pic4.jpg',amount:'400,000'},{id:2,image:'img/portfolio_pic5.jpg',amount:'450,000'},{id:3,image:'img/portfolio_pic6.jpg',amount:'500,000'}];
	$scope.budgetmodel.budget.highamount=[{id:1,image:'img/portfolio_pic7.jpg',amount:'550,000'},{id:2,image:'img/portfolio_pic8.jpg',amount:'600,000'},{id:3,image:'img/portfolio_pic1.jpg',amount:'650,000'}];
	 


});
app01.controller('myController', ['$scope', '$route', '$routeParams','$http',
	function ($scope, $route, $routeParams,$http) {
		
		
		var emptyColumns = {};
		var deletedRows = {};
		//$scope.datamodel={};
		
			$scope.datamodel={};
			$scope.datamodel.providers={};
			$scope.datamodel.providers.provider={};
			$scope.datamodel.providers.service=[{"id":"","cost":"","capacity":"", "rate":"", "uom":"","vehicletype":"","county":"","direction":"","img":"","comments":""}];
			
			
	
			$scope.datamodel.providers.service.capacity=[{'pid':'','no':'', 'cost':''}];
            $scope.datamodel.providers.service.vehicle=[{'pid':'','type':'', 'capacity':'','cost':''}];
            $scope.datamodel.providers.service.caketype=[{'pid':'','type':'', 'cost':''}];
			
			$scope.getSelectData= function(table){
			console.log(table);
			var fetchurl = 'api.php/'+table;
			$http.get(fetchurl).success(function(response){ 							  
					  $scope[table]=php_crud_api_transform(response)[table];

			  });

			}	
		
		$scope.addRow=function(detailName) {
	
			
			if(typeof emptyColumns[detailName] === 'undefined'){
				var data = $scope.datamodel.providers[detailName][0];
				var columns = {};
				for(var key in data){
					columns[key] = "";
				}
				columns.action="3";
				
				emptyColumns[detailName] = angular.toJson(columns);
			}
			$scope.datamodel.providers[detailName].splice($scope.datamodel.providers[detailName].length+1,0,angular.fromJson(emptyColumns[detailName]));
		
		};
		$scope.addChildRow=function(parent,child) {
			if(typeof emptyColumns[child] === 'undefined'){
				var data = $scope.datamodel.providers[parent][child][0];
				var columns = {};
				for(var key in data){
					columns[key] = "";
				}
				columns.action="3";
				emptyColumns[child] = angular.toJson(columns);
			}
			$scope.datamodel.providers[parent][child].splice($scope.datamodel.providers[parent][child].length+1,0,angular.fromJson(emptyColumns[child]));
			console.log(angular.toJson($scope.datamodel.providers[parent][child]));
			$scope.datamodel.providers.service[child].push($scope.datamodel.providers[parent][child]);
			//console.log(angular.toJson($scope.datamodel.providers));
		};
		
		
		
		
		
		$scope.deleteRow = function(detailName){
			if(typeof deletedRows[detailName] === 'undefined'){
				deletedRows[detailName] = [];
			}
			var selectednodes = document.getElementsByName(detailName);
			var spliced = false;
			for (var i = 0; i < selectednodes.length; i++) {
				var e = selectednodes[i];
				if (e.checked) {
					if(angular.isUndefined($scope.datamodel[$routeParams.view][detailName][spliced?e.value-1:e.value]['action']))
					{
						$scope.datamodel[$routeParams.view][detailName][e.value]['action'] = "9";
						deletedRows[detailName].push($scope.datamodel[$routeParams.view][detailName][e.value]);
					}					
					$scope.datamodel[$routeParams.view][detailName].splice(spliced?e.value-1:e.value,1);	
					spliced = true;			
				}
			}				
		}
		
			
			
		
	}]);

app01.config(['$routeProvider',function($routeProvider){
    $routeProvider
	.when('/budget' ,{templateUrl:'budget.php'})   
    .when('/register',{templateUrl:'register.php'})
    .when('/contactus',{templateUrl:'contactus.php'})
	.when('/slides',{templateUrl:'slides.html'}).  
    when('/providers',{templateUrl:'provider_detail.php'}).
    when('/edit',{templateUrl:'editprovider.php'}).
    when('/managesms',{templateUrl:'manageSMS.jsp'}).
    when('/newuser', {templateUrl:'registeruser.jsp'}).
    when('/agents',{templateUrl:'showAgents.jsp'}).
    when('/vanswers',{templateUrl:'viewAnswers.jsp'}).
    when('/qstns',{templateUrl:'viewQuestions.jsp'}).
    when('/search',{templateUrl:'search1.php'}).
	when('/editmsg',{templateUrl:'manageSMS.jsp'}).
	when('/biodata',{templateUrl:'viewBioData.jsp'}); 
              
}]);





    
    

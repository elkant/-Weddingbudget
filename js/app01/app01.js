/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//var app01=angular.module('app01',['ngRoute',]);


app01 = angular.module('app01',['ngRoute','ngResource','ngSanitize','ngFileUpload']);

app01.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
	/* require:'ngModel',
	 scope:{
              ngModel: '=?'
            }, */
    link: function(scope, element, attrs, ngModelCtrl,ngModel) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                 modelSetter(scope, element[0].files[0]);
				//scope.ngModel=element[0].files[0].name;
			   //  ngModel.$setViewValue("aaaa");   
				console.log("aaaa "+ element[0].files[0].name);				 
				
            });
        });
			
    }
   };
}]);



//Easy Respoonsive Tabs
app01.directive('responsivetabs', function () {
    return {
        restrict:'A',
        link: function(scope, element, attrs)
        {
		//console.log('Setting horizontal tabs');
            $(element).easyResponsiveTabs({
				type: 'horizontal',
				width: 'auto',
				fit: true,
				closed: 'accordion'
			});
        }
    }
});

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
    this.uploadFileToUrl = function(file, uploadUrl, name,$scope){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         }).success(function(result){
            console.log(result);
			return result;			
         }).error(function(){
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
				return results;
				console.log(results);
				
				
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
   $scope.datamodel={};
      $scope.datamodel.provider={'id':''};
	  $scope.datamodel.provider_detail=[{'id':'','providerid':'','cost':'', 'capacity':'','type':'','uom':'', 'location':'','location':'','area':'','img':''}];
       var serviceBase = 'services/'
  
      $scope.saveCustomer = function(datamodel) {
        $location.path('/edit');
     
		
            services.insertCustomers(datamodel);
       
    };
	
		
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
		    
			
			
			$scope.removeRow = function(id,tablename){
				console.log(id+"---"+tablename);
				if(id>0){
					  $scope.datamodel[tablename].splice(id,1);
				}
		  
			  }
	
			
		 $scope.getSelectData= function(table){
				var fetchurl = serviceBase + 'selectdata?tablename='+table;
			$http.get(fetchurl).success(function(response){ 
         	 $scope[table]=response[table];
			});

			}	
			
		
		
      // fileUpload.uploadFileToUrl(file, uploadUrl, text);
	  
	  
	   $scope.uploadFiles = function(files,index){

		var file = files;   
        console.dir(file);

        var uploadUrl = "save_form.php";
        var text = $scope.name;
		console.log(text);
        //fileUpload.uploadFileToUrl(file, uploadUrl, text);
		
		 
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         }).success(function(result){
            console.log(""+result);
			 $scope.datamodel.provider_detail[index].img=result.trim();
					
         }).error(function(){
            console.log("Error");
         });
        };
	  
	  
	  
   
      
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

 app01.filter('getvals',[function(){
	 return function(propname,table){
		 console.log(propname+'++++'+table);
			var fetchurl = serviceBase + 'selectdata?tablename='+table;
		
		   $http.get(fetchurl).success(function(response){ 
         	   $scope[table]=response[table];
			 console.log($scope[table]);
			  var t= $filter('filter')($scope[table] , {
					'id' : propname
				}, true)[0];
				$scope.namevalue=t.type;
				console.log(t);
				return $scope.namevalue;
			
			    });
		     }
	 
			}]);
 


app01.controller('homeCtrl',['$scope','$routeParams','$http','$location','$sce','$route','fileUpload','services','$window','$filter', 
function($scope,$routeParams,$http,$location,$sce,$route,fileUpload,services,$window,$filter){
    $scope.datamodel={};
      $scope.datamodel.provider={'id':''};
	  $scope.datamodel.provider_detail=[{'id':'','providerid':'','cost':'', 'capacity':'','type':'','uom':'', 'location':'','location':'','area':'','img':''}];
     
   var serviceBase = 'services/'
  //  $scope.searchmodel={};
  			$scope.cart=[]
	$scope.search = function(data) {
		
          $scope.searchmodel=services.getItems(data.category,data.cost);
		  $http.get(serviceBase + 'fetchitems?category='+data.category+' && cost='+data.cost).success(function(response){
		   $scope.resultmodel =response;

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
		
		$scope.getValue = function (propname,table) {
			console.log(propname+'++++'+table);
			var fetchurl = serviceBase + 'selectdata?tablename='+table;
		
		   $http.get(fetchurl).success(function(response){ 
         	   $scope[table]=response[table];
			 console.log($scope[table]);
			  var t= $filter('filter')($scope[table] , {
					'id' : propname
				}, true)[0];
				$scope.value= t;
			 console.log(t);
			    });

			
			    
				
				
				
			};
	
	 $scope.getSelectData= function(table){
		var fetchurl = serviceBase + 'selectdata?tablename='+table;
		
		$http.get(fetchurl).success(function(response){ 
         	 $scope[table]=response[table];
			});

			}	
      
	   
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
	
	  $http.post(serviceBase + 'login', angular.toJson(auth)).success(function (results) {
				$scope.datamodel= results.data;
			 	$scope.message=results.msg;
				$location.path('/providers');
				$window.location.href = '#/providers';
		
		         
			}).error(function(response) {
					alert("Failed to Login");
					 $location.path('#/');
				});
	
	          }
	
	
	 $scope.register = function(registerdata){	
	
	 if(registerdata.pwdcheck.rptpwd != registerdata.credentials.account.password ){
		 alert("Password entered in repeat password field does not match with new password.");
		 } else{
	  $http.post(serviceBase + 'register', angular.toJson(registerdata.credentials)).success(function (results) {
				
		         console.log(results.msg);
				 $location.path('/providers');
				 
				 
			}).error(function(response) {
					console.log("Failed to Register");
		 });
		 }
	
	}
	
	
		 $scope.uploadFiles = function(files){
			 alert(files);
		var file = files;   
        console.dir(file);

        var uploadUrl = "save_form.php";
        var text = $scope.name;
		console.log(text);
        fileUpload.uploadFileToUrl(file, uploadUrl, text);
				};
	
    $scope.message="";
	 $scope.saveCustomer = function(datamodel) {
				console.log("this is called"+angular.toJson(datamodel));
		  $http.post(serviceBase + 'insert', angular.toJson(datamodel)).success(function (results) {
				$scope.datamodel= results.data;
			 	$scope.message=results.msg;
				
			}).error(function(response) {
					console.log("Failed to start process");
				});
		
    };

	

}]);


app01.controller('listCtrl', function ($scope, services,$http) {
      $scope.datamodel={};
    
  var serviceBase = 'services/';

  $http.get(serviceBase + 'customers').success(function(response){
	     
		  $scope.datamodel=response;
		  });
		  
		  
		   $scope.uploadFiles = function(files,index){

		var file = files;   
        console.dir(file);

        var uploadUrl = "save_form.php";
        var text = $scope.name;
		console.log(text);
        //fileUpload.uploadFileToUrl(file, uploadUrl, text);
		
		 
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         }).success(function(result){
            console.log(""+result);
			 $scope.datamodel.provider_detail[index].img=result.trim();
					
         }).error(function(){
            console.log("Error");
         });
        };
		  
		  $scope.removeRows = function(id,tablename){
				
				if(id>0){
					  $scope.datamodel[tablename].splice(id,1);
				}
		  
			  }
		  
		  
	    $scope.updateCustomer = function(datamodel) {
		
 $http.post(serviceBase + 'update', angular.toJson(datamodel)).then(function (results) {
				 
				console.log(results.data);
				
				
			});
			};
	   
});


 

app01.config(['$routeProvider',function($routeProvider){
    $routeProvider
	.when('/budget' ,{templateUrl:'main.php'})   
    .when('/register',{templateUrl:'register.php'})
    .when('/contactus',{templateUrl:'contactus.php'})
	.when('/slides',{templateUrl:'slides.html'})	
    .when('/providers',{  templateUrl:'provider_detail.php'}).
     when('/edit',{templateUrl:'editprovider.php'}).
     when('/search',{templateUrl:'search1.php'}).
     when('/editmsg',{templateUrl:'manageSMS.jsp'}); 
        
        
        
}]);





    
    

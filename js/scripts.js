var soccerApp = angular.module('soccerApp', ['ngRoute']);

soccerApp.config(function($routeProvider,$locationProvider){
	$routeProvider
	.when('/', {
		templateUrl: 'pages/main.html',
		controller: 'mainController'
	})

	.when('/teams/:teamId', {
		templateUrl: 'pages/players.html',
		controller: 'teamController'
	})
    
	.when('/teams', {
		templateUrl: 'pages/teams.html',
		controller: 'teamController'
	})
	

	.when('/players', {
		templateUrl: 'pages/players.html',
		controller: 'playerController'
	});
	
	//$locationProvider.html5Mode(true);
});

soccerApp.controller('mainController', function($scope){
	$scope.message = 'This is main page of project';
});

soccerApp.controller('teamController', function($scope,$http,$routeParams){

	$scope.teamId = $routeParams.teamId;
	
	var apiUrl  = 'src/api.php';
	if($scope.teamId !=undefined){
            apiUrl = apiUrl + '?team=' + $scope.teamId;
	}
	
	if($scope.teamId !=undefined){
            var response = $http.get(apiUrl);
            response.success(function(data, status, headers, config){
                console.log(data);
                if(data!=''){
                    $scope.players = data;
                    console.log('i am here');
                }
                else{
                    $scope.error = "No Players available for selected Team";
                    console.log('i am here too');
                }
                
            });		
	}
	else{
            var response = $http.get(apiUrl);
            response.success(function(data, status, headers, config){
                $scope.teams = data;
            });	
	}
});

soccerApp.controller('playerController', function($scope,$http){
	var response = $http.get('/src/api.php');
	response.success(function(data, status, headers, config){
		$scope.teams = data.teams;
	});
	
	var ModalInstanceCtrl = function ($scope, $modalInstance) {
		$scope.customHTML = "<h1> Random html snippet at run time </h1>";
	};
});

var $ = jQuery;
$(document).ready(function(){
	alert('e');
	$('#whats-new').on('focus',function(){
		//alert('hello');
		$(this).stop();
		$('aw-whats-new-submit').stop();
	}).on('blur',function(){
		$(this).stop();
		$('aw-whats-new-submit').stop();
	});
});

var FSNapp = angular.module('FSNapp',['ui.router']);

FSNapp.config(function($stateProvider, $urlRouterProvider){
	$urlRouterProvider.otherwise('/');
	$stateProvider
	.state('home',{
		url: '/',
		views: {
			'timelineProfileEdit': {
				templateUrl: './wp-content/themes/Free-Social-Network/Activity/test.php',
				controller: 'mainController'
				},
						   '': {
				templateUrl: './wp-content/themes/Free-Social-Network/Activity/activity.php',
				controller: 'profileController'
				},
				 'friendList': {
				templateUrl: function($stateParams){
					if(!$stateParams.uname)
						return './wp-content/themes/Free-Social-Network/members/members-loop.php';
					else
						return './wp-content/themes/Free-Social-Network/members/:uname/single/friends.php'
				},
				controller: 'friendsController'
				}
			}
		})
	.state('profile',{
		url: '/profile',
		templateUrl: './wp-content/themes/Free-Social-Network/Activity/activity.php',
		controller: 'profileController'
	});

});

FSNapp.controller('mainController',function($scope){
	alert('mainController');
});

FSNapp.controller('activityController',function($scope){
	alert('activityController');
});

FSNapp.controller('profileController',function($scope){
	alert('profileController');
});

FSNapp.controller('groupController',function($scope){
	alert('groupController');
});

FSNapp.controller('messagesController',function($scope){

});

FSNapp.controller('friendsController',function($scope, $routeParams){
	$routeParams.uname = 'admin';
});

FSNapp.controller('commentsController',function($scope){

});
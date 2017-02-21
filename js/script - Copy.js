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

var FSNapp = angular.module('FSNapp',['ngRoute']);

FSNapp.config(function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl: './wp-content/themes/Free-Social-Network/Activity/test.php',
		controller: 'mainController'
	})
	.when('/profile',{
		templateUrl: './wp-content/themes/Free-Social-Network/Activity/activity.php',
		controller: 'profileController'
	})
	.otherwise('/');

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

FSNapp.controller('friendsController',function($scope){

});

FSNapp.controller('commentsController',function($scope){

});
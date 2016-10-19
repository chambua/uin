var app = angular.module('plunker', []);

app.controller('MainCtrl', function($scope, $timeout) {
});
app.directive('characterCount', function(){
  return {
    restrict: 'A',
    compile: function compile(){
      return {
        post: function postLink(scope, iElement, iAttrs){
           iElement.bind('keydown', function(){
              scope.$apply(function(){
                scope.numberOfCharacters = iElement.val().length;
             });
           });
        }
      }
    }
  }
});

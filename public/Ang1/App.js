var app = angular.module('angApp', ["ngRoute", "ngSanitize"]);

function appInterceptor() {
    return {
        request: function (config) { 
            config.headers["Authorization"] = "Bearer admin";
            config.headers["Content-Type"] = "application/x-www-form-urlencoded";
            return config;
        },
        requestError: function (config) {
            return config;
        },
        response: function (res) {
            return res;
        },
        responseError: function (res) {
            return res;
        }
    }
}
app.factory('appInterceptor', appInterceptor)
        .config(function ($httpProvider) {
            $httpProvider.interceptors.push('appInterceptor');
        });

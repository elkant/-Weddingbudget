<html>
 <script src="js/angular.js"></script>
   <script src="js/ng-file-upload.js"></script>
   <script src="js/ng-file-upload-shim.js"></script>
<head>
<script>
var app = angular.module('fileUpload', ['ngFileUpload']);

    app.controller('MyCtrl', ['$scope', 'Upload', '$timeout', function ($scope, Upload, $timeout) {
        $scope.uploadPic = function(file) {
		console.log("file);
            file.upload = Upload.upload({
                method:'POST',
                url: 'uploads.php',
                data: {file: file, username: $scope.username}
            });

            file.upload.then(function (response) {
                $timeout(function () {
                    file.result = response.data;
                });
            }, function (response) {
                if (response.status > 0)
                    $scope.errorMsg = response.status + ': ' + response.data;
            }, function (evt) {
                file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
            });
        }
    }]);

</script>




</head>
<body ng-app="fileUpload">
<form name="myForm"  ng-controller="MyCtrl" >

<fieldset>

    <legend>Upload on file select</legend>
    <br>Photo:
    <input type="file" ngf-select="uploadPic(picFile)" ng-model="picFile" name="picFile"
           accept="image/*" ngf-max-size="2MB" required
           ngf-model-invalid="errorFiles">

    <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb">

    <br>
    <button ng-disabled="!myForm.$valid"
            ng-click="uploadPic(picFile)">Submit</button>

    <div class="con">
        <div class="pg" style="width:{{picFile.progress}}%"  ></p></div>
    </div>
    <p ng-bind="picFile.progress + '%'"></p>
           <span ng-show="picFile.result">Upload Successful</span>
    <span class="err" ng-show="errorMsg">{{errorMsg}}</span>
</fieldset>
</form>
</body>
</html>

<style>
    .thumb {
        width: 240px;
        height: 240px;
        float: none;
        position: relative;
        top: 7px;
    }
    form .progress {
        line-height: 1px;
    }
    .progress {
        display: inline-block;
        width: 300px;
    }

    .con{
        width:300px;
    }
    .pg {
        font-size: smaller;
        background: #000000;
        width:0px;
        height:1px;
    }
</style>


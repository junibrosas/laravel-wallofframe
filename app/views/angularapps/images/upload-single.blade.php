<div class="frame-upload">
    <div flow-init
        flow-file-added="!!{png:1,gif:1,jpg:1,jpeg:1}[$file.getExtension()]"
        ng-style="style">

        <div class="thumbnail" ng-hide="$flow.files.length">
          <img src="http://www.placehold.it/300x200/EFEFEF/AAAAAA&text=no+image" />
        </div>
        <div class="thumbnail" ng-show="$flow.files.length">
          <img flow-img="$flow.files[0]" />
        </div>
        <div class="progress" ng-show="showLoader">
            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="12" aria-valuemax="100" style="width: @{{ $flow.files[0].progress() * 100 }}%;"></div>
        </div>
        <div>
            <button class="btn btn-success btn-xs" ng-hide="$flow.files.length" flow-btn flow-attrs="{accept:'image/*'}">Select image</button>
            <button class="btn btn-success btn-xs" ng-show="$flow.files.length" ng-click="$flow.upload(); imageUpload()">Upload</button>
            <button class="btn btn-danger btn-xs" ng-show="$flow.files.length" ng-click="$flow.cancel()"> Remove </button>
            <p style="font-size: 10px;">{{ FILE_IMAGE_WARNING }}</p>
        </div>
    </div>
</div>

<div id="action-notify" class="alert alert-success alert-sm alert-dismissable  space-sm" role="alert" style="display:none;">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <b>Successfully uploaded image.</b>
</div>
<div ng-controller="MediaFlowController"
    flow-init
    flow-file-added="!!{png:1,gif:1,jpg:1,jpeg:1}[$file.getExtension()]"
    flow-files-submitted="$flow.upload()">

    <div class="space-sm">
        <div class="pull-left">
            <button class="btn btn-success btn-xs" ng-hide="$flow.files.length" flow-btn flow-attrs="{accept:'image/*'}">Select Images</button>
            <button class="btn btn-danger btn-xs" ng-show="$flow.files.length" ng-click="$flow.cancel()">Remove All</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="alert drag-drop-box" flow-drop flow-drag-enter="class='alert-success'" flow-drag-leave="class=''"
        flow-prevent-drop
        flow-drag-enter="style={border: '5px solid green'}"
        flow-drag-leave="style={}"
        ng-class="class">
        Drag And Drop your files here
    </div>
    <p style="font-size: 12px;">{{ FILE_IMAGE_WARNING }}</p>

    <div id="error-notify" class="alert alert-success alert-sm alert-dismissable  space-sm" role="alert" style="display:none;">
        <a class="panel-close close" data-dismiss="alert">×</a>
        <b>File size exceeds the limit.</b>
    </div>

    <div class="row" flow-transfers>
        <div class="col-md-2 space-bottom-sm" ng-repeat="file in transfers" ng-show="$flow.files.length">
            {{--<div class="thumbnail" ng-hide="$flow.files.length">
                <img src="http://www.placehold.it/800x400/EFEFEF/AAAAAA&text=no+image" />
            </div>--}}

            {{--Upload Preview Image--}}
            <img flow-img="$flow.files[$index]" style="width: 147px;height: 147px;"/>

            {{--Upload Progress Bar--}}
            <div class="progress media-upload-progress" ng-show="$flow.files.length && !file.isComplete()">
                <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="12" aria-valuemax="100" style="width: @{{ file.progress() * 100 }}%;"></div>
            </div>

            {{--Upload Cancel Button--}}
            <div class="label" ng-attr-id="flow-item-@{{ $index }}"></div>
            <button class="btn btn-danger btn-sm media-upload-btn-close" ng-show="$flow.files.length && !file.isComplete()" ng-click="file.cancel()">x</button>
        </div>

        {{--Display Media Items--}}
        <div class="col-xs-6 col-md-2" ng-repeat="item in mediaItems">
            @include('media/components/list-media')
        </div>

        {{--Display Media Upload PreLoader--}}
        <div ng-hide="mediaItemsLoaded" class="media-upload-preLoader">
            <h4><b>Loading Media Items</b></h4>
        </div>

    </div>
</div>
<div class="col-md-2 col-md-offset-10">
    <button class="btn btn-success btn-block" ng-click="getMediaItems()">
        Add
    </button>
</div>

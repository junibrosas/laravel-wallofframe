<div
    ng-class="item.isSelected == true ? 'media-selected' : ''; "
    ng-click="itemSelected( item )" style="margin-bottom: 25px;">
    <a style="cursor: pointer">
        <img ng-src="{{ asset('') }}@{{ 'images/square-small/' + item.filename }}" class="img-responsive"/>
    </a>
</div>


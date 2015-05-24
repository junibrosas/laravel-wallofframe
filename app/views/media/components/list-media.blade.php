
<?php
$width = isset($_width) ? $_width.'px' : '160px';
$height = isset($_height) ? $_height.'px' : '160px';
?>
<div class="nailthumb-container square-thumb" ng-class="item.isSelected == true ? 'media-selected' : ''; " ng-click="itemSelected( item )" style="width: {{ $width }};height: {{ $height }};margin-bottom: 17px;">
    <a style="cursor: pointer">
        <img ng-src="@{{ item.url }}" class="img-responsive "/>
    </a>
</div>


<script type="text/javascript">
    $(function(){
        $('.nailthumb-container').nailthumb();
    });
</script>
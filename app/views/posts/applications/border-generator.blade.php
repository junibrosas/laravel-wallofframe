{{ Form::open(['route' => 'admin.frame.border.create', 'method' => 'post', 'files' => true ]) }}
<div class="borderGenerator">
    <div class="row">
        <div class="col-md-12">
            <h2 class="side-heading space-sm">Border Generator</h2>
        </div>
        <div class="col-md-4">
            <div class="setupSection">
                <div><label for="imageTop">Top Offset:</label><div id="imageTop" class="slider image-offset"></div></div>
                <div><label for="imageRight">Right Offset:</label><div id="imageRight" class="slider image-offset"></div></div>
                <div><label for="imageBottom">Bottom Offset:</label><div id="imageBottom" class="slider image-offset"></div></div>
                <div class="form-group"><label for="imageLeft">Left Offset:</label><div id="imageLeft" class="slider image-offset"></div></div>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <div id="borderOptions" class="setupSection">
                    <div><label for="borderTop">Top Border:</label><div id="borderTop" class="slider border-width"></div></div>
                    <div><label for="borderRight">Right Border:</label><div id="borderRight" class="slider border-width"></div></div>
                    <div><label for="borderBottom">Bottom Border:</label><div id="borderBottom" class="slider border-width"></div></div>
                    <div><label for="borderLeft">Left Border:</label><div id="borderLeft" class="slider border-width"></div></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="repeatOptions" class="setupSection">
            <!-- SPEC: The spec also defined a Space option, but no browser currently supports this so leaving this out... -->
            <div>
                <label for="repeatVertical">Vertical Repeat:</label>
                <select id="repeatVertical" class="form-control repeat">
                    <option value="stretch">Stretch</option>
                    <option value="repeat">Repeat</option>
                    <option value="round">Round</option>
                </select>
                <span id="warnRepeatVert" class="warning"></span>
            </div>
            <div>
                <label for="repeatHorizontal">Horizontal Repeat:</label>
                <select id="repeatHorizontal" class="form-control repeat">
                    <option value="stretch">Stretch</option>
                    <option value="repeat">Repeat</option>
                    <option value="round">Round</option>
                </select>
            </div>
            <div class="checkbox"><label for="fillCenter"><input id="fillCenter" type="checkbox"> Fill Center</label> </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="errorMsg"></div>
            <div>
                <label for="pathToImage">Image:</label>
                <input type="file" name="file"  accept="image/*" id="localImage">
                <em style="font-size: 12px;">Note: You can resize the border image.</em>
            </div>
            <div class="space-top-sm">
                <div id="editorEl" style="display: none">
                    <img id="imageEl" class="img-responsive">
                    <!-- Note that we expect this ordering -->
                    <div id="dividerTop" class="divider top-divider"></div>
                    <div id="dividerLeft" class="divider left-divider"></div>
                    <div id="dividerBottom" class="divider bottom-divider"></div>
                    <div id="dividerRight" class="divider right-divider"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="css">
                <h2 class="side-heading">Preview</h2>
                <div id="cssEl"></div>
                <h2 class="side-heading">Style</h2>
                <div id="styleEl"></div>
            </div>
        </div>

        <div class="col-md-3 col-md-offset-9">
            <div class="space-sm"></div>
            <button type="submit" class="btn btn-default btn-block">Save</button>
        </div>
    </div>
</div>
{{ Form::hidden('custom_border_style', '', ['id' => 'custom_border_style']) }}
{{ Form::close() }}
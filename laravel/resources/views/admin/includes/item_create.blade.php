<div id="editDialog">
    <label for="editTagInput">Edit Tag:</label>
    <input type="text" id="edit-tag-input" onkeypress="handleKeyPressEditTag(event)"> &nbsp;&nbsp;
    <button onclick="saveEditedTag()" class="btn btn-primary">Save</button>
    <button onclick="closeEditDialog()" class="btn btn-secondary">Cancel</button>
</div>

<div id="create-item-js" class="row container" style="display: none; margin: 30px 0; background-color: rgba(0,0,0,.05); padding: 20px;">
    <div class="col-sm-12 row-item">
        <form action="/admin/items/add" method="post">
            <div class="row" style="padding-left: 15px;">
                <h5>Create item:</h5>
            </div>
            <div class="mb-3 row col-sm-12">
                <div for="contentTextarea" class="col-sm-2 col-form-label" style="padding-left: 0px">
                    <label>Item:</label> <br>
                    <a href="#" onclick="translateItem()" title="Translate item"
                       style="color: #797979; margin-left: 10px; cursor: pointer;">
                        <i class="fa fa-language"></i>
                    </a>
                </div>
                <div class="col-sm-10">
                    <textarea id='item-content' name="content" class="form-control content-textarea" rows="3"
                              style="width: 100%;"></textarea>
                </div>
            </div>
            <div class="row tags-item-block">
                <label for="contentTextarea" class="col-sm-2 col-form-label">Tags:</label>
                <div class="col-sm-10">
                    <input type="text" id="create-item-tags-input" name="tags" data-role="tagsinput" class="form-control taggable-input"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="status" checked class="form-check-input" id="activeCheckbox">
                        <label class="form-check-label" for="activeCheckbox">Active</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    Created:
                    <input type="text" name="created" class="form-control" id="createdInput" value="{{ date('Y-m-d H:i:s') }}">
                </div>

                <div class="col-sm-3">
                    Views:
                    <input type="number" name="views" class="form-control" id="viewsInput" value="1"
                           placeholder="Enter views">
                </div>

                <div class="col-sm-3">
                    Likes:
                    <input type="number" name="likes" class="form-control" id="likesInput" value="0"
                           placeholder="Enter likes">
                </div>
            </div>
            <div class="col-sm-2 offset-sm-10 mt-3">
                <button class="btn btn-secondary" onclick="$('#create-item-js').slideToggle('slow');">Hide</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
</div>

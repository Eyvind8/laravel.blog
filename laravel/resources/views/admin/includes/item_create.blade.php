<div id="create-item-js" class="row container" style="display: none; margin: 30px 0; background-color: rgba(0,0,0,.05); padding: 20px;">
    <div class="col-sm-12">
        <form action="/admin/items/add" method="post">
            <div class="row" style="padding-left: 15px;">
                <h5>Create item:</h5>
            </div>
            <div class="mb-3 row col-sm-12">
                <label for="contentTextarea" class="col-sm-2 col-form-label" style="padding-left: 0px">Item:</label>
                <div class="col-sm-10">
                    <textarea name="content" class="form-control" id="contentTextarea" rows="3"
                              style="width: 100%;">Навіщо самураю меч, якщо він не в крові</textarea>
                </div>
            </div>
            <div class="row">
                <label for="contentTextarea" class="col-sm-2 col-form-label">Tags:</label>
                <div class="col-sm-10">
                    <input type="text" name="tags" id="tags-input" data-role="tagsinput" class="form-control"/>
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

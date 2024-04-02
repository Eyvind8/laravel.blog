@php use App\Models\ItemsParse; @endphp
<tr role="row" class="items" id="item-js-{{ $item->id }}">
    <td>
        Id: {{ $item->id }}

        @if($item->status === ItemsParse::STATUS_ACTIVE)
            <label style="margin: 0px" class="badge badge-success badge-pill">active</label>
            <input style="margin-left: 10px" class="form-check-input" type="checkbox" name="status" checked>
        @elseif($item->status === ItemsParse::STATUS_USE)
            <label style="margin: 0px" class="badge badge-info badge-pill">use</label>
            <input style="margin-left: 10px" class="form-check-input" type="checkbox" name="status" checked>
        @else
            <label style="margin: 0px" class="badge badge-warning badge-pill">new</label>
            <input style="margin-left: 10px" class="form-check-input" type="checkbox" name="status">
        @endif

        <br>
        <input type="text" style="width: 125px;"
               value="{{ \Carbon\Carbon::parse($item->created)->format('Y-m-d H:i') }}"/><br>

        @if($item->status != ItemsParse::STATUS_USE)
            Publication data:<br>
            <input class="item-create" type="text" style="width: 125px;"
                   value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}"/><br>
        @endif
    </td>
    <td class="row-item" style="position: relative;">
        <textarea rows="{{ substr_count($item['content'], "\n") + 1 }}"
                  style="width: 100%; border: none;">{{ Str::ucfirst($item['content']) }}</textarea>
        <hr>
        <textarea class="content-textarea" rows="{{ substr_count($item['content'], "\n") + 1 }}"
                  style="width: 100%; border: none;">{{ Str::ucfirst($item['content_ua']) }}</textarea>
        <div class="tags-item-block" style="margin-top: 15px;">
            <input id="tags-input-{{ $item->id }}" type="text" value="" name="tags"
                   data-role="tagsinput" class="form-control taggable-input"/>
            <br>
            <span style="position: absolute; bottom: 5px; right: 13px;">
                <a href="#" class="save-item" data-item-id="{{ $item->id }}" title="Activate item"
                   style="color: #797979; margin-left: 10px; cursor: pointer;">
                    <i class="fa fa-save"></i>
                </a>

                <a href="#" class="delete-item" data-item-id="{{ $item->id }}" title="Delete item"
                   style="color: #797979; cursor: pointer;">
                    <i class="fa fa-trash"></i>
                </a>
            </span>
        </div>
    </td>
</tr>

@php use App\Models\Items; @endphp
<tr role="row" class="items" id="item-js-{{ $item->id }}">
    <td>
        Id: {{ $item->id }}

        @if($item->status === Items::STATUS_ACTIVE)
            <label style="margin: 0px" class="badge badge-success badge-pill">active</label>
            <input style="margin-left: 10px" class="form-check-input" type="checkbox" name="status" checked>
        @else
            <label style="margin: 0px" class="badge badge-warning badge-pill">new</label>
            <input style="margin-left: 10px" class="form-check-input" type="checkbox" name="status">
        @endif

        <br>
        <input type="text" style="width: 125px;"
               value="{{ \Carbon\Carbon::parse($item->created)->format('Y-m-d H:i') }}"/><br>
        Views: {{ $item->views }}<br>
        Likes: {{ $item->likes }}
    </td>
    <td class="row-item" style="position: relative;">
        <textarea class="content-textarea" rows="{{ substr_count($item['content'], "\n") + 1 }}"
                  style="width: 100%; border: none;">{{ Str::ucfirst($item['content']) }}</textarea>

        <div class="tags-item-block" style="margin-top: 15px;">
            <?php $tags = collect($item->getTags())->pluck('name')->all(); ?>
            <input id="tags-input-{{ $item->id }}" type="text" value="<?= implode(',', $tags) ?>" name="tags" data-role="tagsinput" class="form-control taggable-input"/>
            <br>
            @foreach ($item->getTags() as $tag)
                <span>
                    <a href="/admin/items?tag={{ $tag->id }}" style="color: #797979; margin-right: 10px">
                        <i class="fa fa-tags"></i>
                        {{ $tag->name }}
                    </a>
                </span>
            @endforeach

            <span style="position: absolute; bottom: 5px; right: 5px;">
                <a href="#" class="delete-item" data-item-id="{{ $item->id }}" title="Delete item" style="color: #797979;">
                    <i class="fa fa-trash"></i>
                </a>
            </span>
        </div>
    </td>
</tr>

@php use App\Models\Items; @endphp
<tr role="row" class="items" id="{{ $item->id }}">
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
        <input type="text" style="width: 125px;" value="{{ \Carbon\Carbon::parse($item->created)->format('Y-m-d H:i') }}" /><br>
        Views: {{ $item->views }}<br>
        Likes: {{ $item->likes }}
    </td>
    <td>
        <textarea rows="{{ substr_count($item['content'], "\n") + 1 }}"
                  style="width: 100%; border: none;">{{ Str::ucfirst($item['content']) }}</textarea>

        <div class="tag" style="margin-top: 15px;">
            @foreach ($item->getTags() as $tag)
                <span>
                    <a href="/admin/items?tag={{ $tag->id }}" style="color: #797979; margin-right: 10px">
                        <i class="fa fa-tags"></i>
                        {{ $tag->name }}
                    </a>
                </span>
            @endforeach
        </div>
    </td>
</tr>

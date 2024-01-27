<tr role="row" class="odd">
    <td class="sorting_1">
        Id: {{ $item->id }}<br>
        {{ \Carbon\Carbon::parse($item->created)->format('Y-m-d H:i') }}<br>
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

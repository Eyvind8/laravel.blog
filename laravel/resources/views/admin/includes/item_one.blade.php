<tr role="row" class="odd">
    <td class="sorting_1">{{ $item->id }}</td>
    <td>
        {{ Str::ucfirst($item['content']) }}
        <br>
        <div class="tag">
            @foreach ($item->getTags() as $tag)
                <span>
                    <a href="/admin/items?tag={{ $tag->id }}" style="color: #797979">
                        <i class="fa fa-tags"></i>
                        {{ $tag->name }}
                    </a>
                </span>
            @endforeach
        </div>
    </td>
    <td>
        {{ \Carbon\Carbon::parse($item->created)->format('Y-m-d H:i') }}<br>
        Views: {{ $item->views }}<br>
        likes: {{ $item->likes }}
    </td>
</tr>

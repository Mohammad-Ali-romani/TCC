<td>
    @forelse($post->urls as $url)
        <a href="{{$url}}" class="btn btn-link">ملف</a><br>
    @empty
        لا يوجد ملفات
    @endforelse
</td>

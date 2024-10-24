@props(['text' => '', 'route' => ''])



<form method="POST" action="{{ $route }}">
    @method('DELETE')
    @csrf

    <a href="#"
            onclick="event.preventDefault();
                        this.closest('form').submit();" class="hover:underline">
      {{ $text }}
</a>
</form>

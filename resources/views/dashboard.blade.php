<div>
    <h1> Dashboard</h1>
    @if($message = session()->get('message')) <div>{{ $message }}</div> @endif

    <a href="{{ route('links.create') }}">Criar um novo link</a>

    <ul>
        @foreach($links as $link)
            <li style="display: flex">

                @unless($loop->last)

                    <form action="{{ route('links.down', $link) }}" method="post" >
                        @csrf
                        @method('PATCH')
                        <button>Baixo</button>

                    </form>
                @endunless

                @unless($loop->first)

                    <form action="{{ route('links.up', $link) }}" method="post" >
                        @csrf
                        @method('PATCH')
                        <button>Cima</button>

                    </form>
                @endunless

                <a href="{{route('links.edit', $link)}}">{{ $link->name }}</a>
                <form action="{{ route('links.destroy', $link) }}" method="post" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')
                    <button>delete</button>

                </form>
            </li>
        @endforeach
    </ul>
</div>

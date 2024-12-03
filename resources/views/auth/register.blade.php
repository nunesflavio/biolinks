<div>
    <h1>Register</h1>

    @if($message = session()->get('message')) <div>{{ $message }}</div> @endif

    <form action="{{ route('register') }}" method="post">
        @csrf

        <div>
            <input name="name" placeholder="Nome" value="{{ old('name') }}"/>
            @error('name')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input name="email" placeholder="Email"/>
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input name="email_confirmation" placeholder="Confirma email"/>

        </div>

        <div>
            <input name="password" type="password" placeholder="Senha"/>
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <button>Registrar</button>



    </form>
</div>

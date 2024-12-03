<div>
    <h1>Login</h1>

    <form action="/login" method="post">
        @csrf

        <div>
            <input name="email" placeholder="Email"/>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input name="password" type="password" placeholder="Senha" value="{{ old('email') }}"/>
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <button>Logar</button>



    </form>
</div>

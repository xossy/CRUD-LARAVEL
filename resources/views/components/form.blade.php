<a href="{{ route('series.index') }}">
    <div class="float-end mb-3">
        <i class=" fs-1 fa-solid fa-reply text-dark"></i>
    </div>
</a>
<form action="{{ $action }}" method="post">
    @csrf
    @if ($update)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome"
            @isset($nome) value="{{ $nome }}" @endisset>
    </div>
    <button type="submit" class="btn btn-primary">{{ $nomeBotao }}</button>
</form>

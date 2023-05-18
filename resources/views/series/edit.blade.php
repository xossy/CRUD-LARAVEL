<x-layout title="Editar Série '{!! $serie->nome !!}' ">
    <a href="{{ route('series.index') }}">
        <div class="float-end mb-3">
            <i class=" fs-1 fa-solid fa-reply text-dark"></i>
        </div>
    </a>
    <form action="{{ route('series.update', $serie->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome"
                value="{{ $serie->nome }}">
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
</x-layout>

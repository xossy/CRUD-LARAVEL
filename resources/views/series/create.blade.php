<x-layout title="Nova Série">

    <a href="{{ route('series.store') }}">
        <div class="float-end mb-3">
            <i class=" fs-1 fa-solid fa-reply text-dark"></i>
        </div>
    </a>

    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" autofocus class="form-control" name="nome" id="nome" value="{{ old('nome') }}">
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">N° Temporadas:</label>
                <input type="Number" class="form-control" name="seasonsQty" id="seasonsQty" value="{{ old('seasonsQty') }}">
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
                <input type="number" class="form-control" name="episodesPerSeason" id="episodesPerSeason" value="{{ old('episodesPerSeason') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

</x-layout>

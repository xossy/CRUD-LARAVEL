<x-layout title="Nova Série">
    <x-form :action="route('series.store')" nomeBotao="Adicionar" :nome="old('nome')" :update="false"/>
</x-layout>

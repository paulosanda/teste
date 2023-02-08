<x-app>
<form method="post" action="{{ route('produto.store') }}">
    @csrf
    <div class="container-sm">
        <div class="mb-3">
            <div class=row>
                Cliente: {{ $cliente->nome}}
            </div>
        </div>
    </div>
</x-app>

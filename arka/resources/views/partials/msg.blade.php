@if (\Session::get("success"))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-10 rounded relative" role="alert">
        <strong class="font-bold">¡Éxito!</strong>
        <span class="block sm:inline">{{ \Session::get("success") }}</span>
    </div>
@endif
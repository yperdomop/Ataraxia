<x-app-layout>
    @if (session('info'))
        @push('scripts')
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire(
                    "Hola",
                    "{{ session('info') }}",
                    'success'
                )
            </script>
        @endpush
    @endif
    <div class="position-relative"> <img src="img/fondo-login.png" class="img-fluid">
        <div class="position-absolute bottom-0 end-0 mb-5">
            Conoce más aquí
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notyf = new Notyf({
            duration: 4000,
            ripple: true,
            position: { x: 'right', y: 'top' }
        });

        @if (session('err'))
            notyf.error(@json(session('err')));
        @endif

        @if (session('succ'))
            notyf.success(@json(session('succ')));
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                notyf.error(@json($error));
            @endforeach
        @endif
    });
</script>

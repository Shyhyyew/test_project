@extends('layout.app')

@section('main')
<div class="flex h-[90vh] w-full justify-center items-center">
    <div class="w-[35vw] shadow-xl p-10 rounded-lg bg-white">
        <div class="mb-10" x-data="alertHandler()" @alert.window="init($event.detail)">
            <div class="flex w-full w-full overflow-hidden bg-white rounded-lg shadow-md"
                 x-show="open">
                <div class="flex items-center justify-center w-12 bg-emerald-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                    </svg>
                </div>

                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <p class="text-sm text-gray-600">Data successfully stored!</p>
                        <p class="text-sm text-gray-600">ID: <span class="font-semibold" x-text="data?.id"></span></p>
                        <p class="text-sm text-gray-600">
                            Execution time: <span class="font-semibold" x-text="data?.execution_time + 'ms'"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-10">
            <label for="username" class="block text-sm text-gray-500">Personal Access Token</label>

            <input id="pat" type="text" class="block mt-2 w-full placeholder-gray-400/70 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" />
        </div>
        <div>
            <label for="username" class="block text-sm text-gray-500">JSON data</label>

            <textarea id="json-data" type="text" class="block mt-2 w-full placeholder-gray-400/70 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"></textarea>
        </div>
        <div class="mt-6">
            <button onclick="submit()" class="px-6 py-2 w-full font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Submit
            </button>
        </div>
    </div>
</div>

<script>
    const submit = () => {
        axios.create({
            headers: {"Authorization": "Bearer " + document.getElementById('pat').value}
        }).post('data/create', {
            "data": document.getElementById('json-data').value,
        }).then((res) => {
            window.dispatchEvent(new CustomEvent('alert', {detail: res.data.data}))
        }).catch((e) => {
            alert(e.response.data.message)
        })
    }

    const alertHandler = () => ({
        data: {},
        open: false,
        init(data) {
            this.data = data
            this.open = true
        }
    })
</script>
@endsection

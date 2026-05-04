<div id="deleteModal"
     class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-gray-900 rounded-xl p-4  w-1/2 border border-gray-800">

        <h2 class="text-lg font-semibold text-white mb-3">
            Confirm Delete
        </h2>

        <p id="deleteMessage" class="text-sm text-gray-400 mb-6">
            Are you sure?
        </p>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-2">

                <button type="button"
                        onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-700 text-white rounded">
                    Cancel
                </button>

                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded">
                    Delete
                </button>

            </div>
        </form>

    </div>
</div>

@push('scripts')
<script>
    function openDeleteModal(actionUrl, name) {
        document.getElementById('deleteForm').action = actionUrl;
        document.getElementById('deleteMessage').innerText =
            `Are you sure you want to delete "${name}"?`;

        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    window.addEventListener('click', function (e) {
        const modal = document.getElementById('deleteModal');
        if (e.target === modal) closeDeleteModal();
    });
</script>
@endpush
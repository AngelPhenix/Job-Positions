<x-layout>
    <x-page-heading>Results</x-page-heading>

    <div id="tag-results-list" class="space-y-6">
        @include('jobs.partials.recent-jobs-items', ['jobs' => $jobs])
    </div>

    @if(isset($tag) && $jobs->hasMorePages())
        <div class="mt-8 flex justify-center">
            <button
                id="show-more-tag-jobs"
                type="button"
                data-next-page="{{ $jobs->currentPage() + 1 }}"
                data-tag-url="{{ url('/tags/' . strtolower($tag->name) . '/jobs') }}"
                class="rounded-xl bg-zinc-800 border border-zinc-700 text-zinc-100 hover:bg-orange-500 hover:text-zinc-950 hover:border-orange-500 px-5 py-3 font-bold transition-colors duration-200"
            >
                Show more
            </button>
        </div>
    @endif

    <script>
        const showMoreTagJobsButton = document.getElementById('show-more-tag-jobs');
        const tagResultsList = document.getElementById('tag-results-list');

        if (showMoreTagJobsButton && tagResultsList) {
            showMoreTagJobsButton.addEventListener('click', async () => {
                const nextPage = showMoreTagJobsButton.dataset.nextPage;
                const baseUrl = showMoreTagJobsButton.dataset.tagUrl;

                showMoreTagJobsButton.disabled = true;
                showMoreTagJobsButton.textContent = 'Loading...';

                try {
                    const response = await fetch(`${baseUrl}?page=${nextPage}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (!response.ok) {
                        throw new Error('Unable to load more jobs.');
                    }

                    const data = await response.json();
                    tagResultsList.insertAdjacentHTML('beforeend', data.html);

                    if (data.hasMorePages) {
                        showMoreTagJobsButton.dataset.nextPage = data.nextPage;
                        showMoreTagJobsButton.disabled = false;
                        showMoreTagJobsButton.textContent = 'Show more';
                    } else {
                        showMoreTagJobsButton.remove();
                    }
                } catch (error) {
                    showMoreTagJobsButton.disabled = false;
                    showMoreTagJobsButton.textContent = 'Show more';
                }
            });
        }
    </script>
</x-layout>
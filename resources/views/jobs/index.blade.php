<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-5">
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>

            <x-forms.form action="/search" class="mt-6" >
                <x-forms.input :label="false" name="query" placeholder="I'm looking for.." />
            </x-forms.form>
        </section>


        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>
            
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($featuredJobs as $job)
                <x-job-card :$job />
                @endforeach
            </div>
        </section>

        <section>
        <x-section-heading>Tags</x-section-heading>
        
            <div class="mt-6 space-x-1">
                @foreach($tags as $tag)
                    <x-tag :$tag />
                @endforeach

            </div>
        </section>

        <section>
        <x-section-heading>Recent Jobs</x-section-heading>

        <div id="recent-jobs-list" class="mt-6 space-y-6">
            @include('jobs.partials.recent-jobs-items', ['jobs' => $jobs])
        </div>

        @if($jobs->hasMorePages())
            <div class="mt-8 flex justify-center">
                <button
                    id="show-more-jobs"
                    type="button"
                    data-next-page="{{ $jobs->currentPage() + 1 }}"
                    class="rounded-xl bg-zinc-800 border border-zinc-700 text-zinc-100 hover:bg-orange-500 hover:text-zinc-950 hover:border-orange-500 px-5 py-3 font-bold transition-colors duration-200"
                >
                    Show more
                </button>
            </div>
        @endif
        </section>
        
    </div>

    <script>
        const showMoreButton = document.getElementById('show-more-jobs');
        const recentJobsList = document.getElementById('recent-jobs-list');

        if (showMoreButton && recentJobsList) {
            showMoreButton.addEventListener('click', async () => {
                const nextPage = showMoreButton.dataset.nextPage;

                showMoreButton.disabled = true;
                showMoreButton.textContent = 'Loading...';

                try {
                    const response = await fetch(`/jobs/recent?page=${nextPage}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (!response.ok) {
                        throw new Error('Unable to load more jobs.');
                    }

                    const data = await response.json();
                    recentJobsList.insertAdjacentHTML('beforeend', data.html);

                    if (data.hasMorePages) {
                        showMoreButton.dataset.nextPage = data.nextPage;
                        showMoreButton.disabled = false;
                        showMoreButton.textContent = 'Show more';
                    } else {
                        showMoreButton.remove();
                    }
                } catch (error) {
                    showMoreButton.disabled = false;
                    showMoreButton.textContent = 'Show more';
                }
            });
        }
    </script>
</x-layout>
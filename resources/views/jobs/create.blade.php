<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="Fullstack" />
        <x-forms.input label="Salary" name="salary" placeholder="50.000€" />
        <x-forms.input label="Location" name="location" placeholder="Paris" />
        <x-forms.input label="Url" name="url" placeholder="https://job_website.com" />
        <x-forms.input label="Tags (Comma separated)" name="tags" placeholder="frontend, backend, fullstack, ..." />

        <x-forms.select label="Schedule" name="schedule">
            <option value="">Part time</option>
            <option value="">Full time</option>
        </x-forms.select>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
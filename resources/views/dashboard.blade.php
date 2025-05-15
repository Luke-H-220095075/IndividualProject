<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <livewire:vehicle.search-vehicle></livewire:vehicle.search-vehicle>
            </div>
            <div class="col-span-2 relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <livewire:vehicle.fetch-vehicle-details></livewire:vehicle.fetch-vehicle-details>
            </div>
        </div>
        <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:vehicle.display-mot-tests></livewire:vehicle.display-mot-tests>
        </div>
    </div>
</x-layouts.app>

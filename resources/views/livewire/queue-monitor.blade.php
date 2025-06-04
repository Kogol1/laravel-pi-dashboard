<x-pulse::card :cols="$cols" :rows="$rows" :class="$class" wire:poll.10s="">
    <x-pulse::card-header :name="$projectName . ' Queues'">
        <x-slot:icon>
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">
        <table class="w-full text-sm text-left">
            <thead class="font-semibold border-b">
            <tr>
                <th class="px-4 py-2">Queue</th>
                <th class="px-4 py-2">Jobs</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $row)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $row->queue }}</td>
                    <td class="px-4 py-2">{{ $row->total }}</td>
                </tr>
            @empty
                <tr><td colspan="2" class="px-4 py-2">No data found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </x-pulse::scroll>
</x-pulse::card>

<div>
    <div>
        <button wire:click="add">Add</button>
    </div>

    <div>
        <table>
        @forelse($items as $key => $item)
            <tr wire:key="item-{{ $loop->index }}-{{ $key }}">
                <td><input wire:model="item.{{ $key }}.price" /></td>
                <td><input wire:model="item.{{ $key }}.quantity" /></td>
                <td><button wire:click="delete({{ $key }})">Delete</button></td>
            </tr>
        @empty
            Nothing found.
        @endforelse
        </table>
    </div>
</div>

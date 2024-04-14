<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-bladewind::button.circle size="tiny" icon="plus" color="primary" tooltip="Add Role"
                onclick="primary" />
            <x-bladewind::table>
                <x-slot name="header">
                    <th>Role</th>
                    <th>Actions</th>
                </x-slot>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <x-bladewind::button.circle size="tiny" icon="pencil" color="primary" tooltip="Edit Role"
                            onclick="primary" />
                        <x-bladewind::button.circle size="tiny" icon="trash" color="primary" tooltip="Delete Role"
                            onclick="primary" />
                    </td>
                </tr>
                @endforeach
            </x-bladewind::table>
        </div>
    </div>
</x-app-layout>
<script setup>
    import { Link } from '@inertiajs/vue3';
    import PermissionsLayout from '@/Layouts/PermissionsLayout.vue';
    const props = defineProps({
        errors: Object,
        roles: Object,
    });
</script>
<template>
    <PermissionsLayout>
        <div class="w-8/12 mx-auto">
            <h1 class="4xl">
                Roles 
                <Link :href="route('roles.create')">
                    <i class="fas fa-plus bg-green-500 text-white p-2 rounded-full cursor-pointer"></i>
                </Link>
            </h1>
            <table class="border w-full">
                <thead>
                    <tr class="bg-white">
                        <th class="border px-4 py-2 text-sm">Nombre</th>
                        <th class="border px-4 py-2 text-sm">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr 
                        class="bg-white hover:bg-slate-50" 
                        v-for="role in roles.data">
                        <td class="border px-4 py-2 text-sm">{{ role.name }}</td>
                        <td class="border px-4 py-2 text-sm">
                            <Link 
                                :href="route('roles.edit', role.id)"
                                class="py-1 px-2 rounded bg-blue-500 text-white cursor-pointer hover:bg-blue-600 mr-4">
                                Editar
                            </Link>
                            <button 
                                @click="() => handleDelete(role)"
                                method="delete"
                                as="button"
                                class="py-1 px-2 rounded bg-red-500 text-white cursor-pointer hover:bg-red-600">
                                Borrar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </PermissionsLayout>
</template>
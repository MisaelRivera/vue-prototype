<script setup>
    import { Link } from '@inertiajs/vue3';
    import { Notivue, Notification, push } from 'notivue';
    import PermissionsLayout from '@/Layouts/PermissionsLayout.vue';
    import useNotifications from '@/composables/useNotifications';
    const { getMessage } = useNotifications();
    defineProps({
        users: {
            type: Object
        } 
    });

    if (getMessage()) {
        push.success(getMessage());
    }
</script>
<template>
    <PermissionsLayout>
        <div class="w-8/12 mx-auto">
            <h1 class="4xl">
                Usuarios 
                <Link :href="route('users.create')">
                    <i class="fas fa-plus bg-green-500 text-white p-2 rounded-full cursor-pointer"></i>
                </Link>
            </h1>
            <table class="border w-full">
                <thead>
                    <tr class="bg-white">
                        <th class="border px-4 py-2 text-sm">Nombre</th>
                        <th class="border px-4 py-2 text-sm">Email</th>
                        <th class="border px-4 py-2 text-sm">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white hover:bg-slate-50" v-for="user in users.data">
                        <td class="border px-4 py-2 text-sm">{{ user.name }}</td>
                        <td class="border px-4 py-2 text-sm">{{ user.email }}</td>
                        <td class="border px-4 py-2 text-sm">
                            <Link 
                                :href="route('users.edit', user.id)"
                                class="py-1 px-2 rounded bg-blue-500 text-white cursor-pointer hover:bg-blue-600">
                                Editar
                            </Link>
                            <Link 
                                method="delete"
                                as="button"
                                class="py-1 px-2 rounded bg-red-500 text-white cursor-pointer hover:bg-blue-600">
                                Borrar
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <Notivue v-slot="item">
            <Notification :item="item"/>
        </Notivue>
    </PermissionsLayout>
</template>
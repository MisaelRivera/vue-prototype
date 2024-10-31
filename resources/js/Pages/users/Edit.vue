<script setup>
    import { ref, onMounted } from 'vue';
    import { useForm, Link } from '@inertiajs/vue3';
    import { Notivue, Notification, push } from 'notivue';
    import PermissionsLayout from '@/Layouts/PermissionsLayout.vue';
    const props = defineProps({
        errors: Object,
        user: Object
    });

    const form$ = ref(null);
    
    onMounted(() => {
        form$.value.update({
            name: props.user.name,
            email: props.user.email,
        });
    });

    let formState = null;
    const handleEdit = () => {
        formState = useForm({...form$.value.data});
        formState.put(`/users/${props.user.id}`);
    };
</script>
<template>
    <PermissionsLayout>
        <div class="w-4/12 mx-auto my-4">
            <h1 class="text-3xl text-slate-700 px-3 py-1">
                <Link :href="route('admin.index')">
                    <i class="fas fa-arrow-left"></i>
                </Link>
                Editar usuario
            </h1>
            <Vueform
                :float-placeholders="false"
                ref="form$"
                :columns="{container: 12, wrapper:12 }"
                @submit="handleEdit"
                :endpoint="false"
                class="bg-black/[.54] px-10 py-10">
                <TextElement
                    name="email"
                    before="Email"
                    input-type="email"
                    :columns="{container: 12, wrapper: 12}"
                    placeholder="Ej. misael@gmail.com"
                    required>
                    <template #description>
                        <p v-if="errors.email" class="text-red-400">{{ errors.email }}</p>
                    </template>
                </TextElement>
                <TextElement
                    name="name"
                    before="Nombre"
                    :columns="{container: 12, wrapper: 12}"
                    placeholder="Ej. Misael">
                    <template #description>
                        <p v-if="errors.name" class="text-red-400">{{ errors.name }}</p>
                    </template>
                </TextElement>
                <button 
                    name="create_user_submit"
                    submits
                    class="px-2 py-1 rounded text-white bg-blue-500 col-span-4">
                    Editar
                </button>
            </Vueform>
        </div>
        <Notivue v-slot="item">
            <Notification :item="item" />
        </Notivue>
    </PermissionsLayout>
</template>
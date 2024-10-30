<script setup>
    import { ref, onMounted } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import { Notivue, Notification, push } from 'notivue';
    import PermissionsLayout from '@/Layouts/PermissionsLayout.vue';
    const props = defineProps({
        errors: Object
    });
    const form$ = ref(null);
    let formState = null;
    const handleCreate = () => {
        formState = useForm({...form$.value.data});
        formState.post(`/users/store`);
    };
</script>
<template>
    <PermissionsLayout>
        <div class="w-4/12 mx-auto my-4">
            <h1 class="text-3xl text-slate-700 px-3 py-1">Crear usuario</h1>
            <Vueform
                :float-placeholders="false"
                ref="form$"
                :columns="{container: 12, wrapper:12 }"
                @submit="handleCreate"
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
                <TextElement
                    name="password"
                    before="Password"
                    input-type="password"
                    :hasFloating="false"
                    :columns="{container: 12, wrapper: 12}"
                    placeholder="* * * * * * * * *"
                    required>
                    <template #description>
                        <p v-if="errors.password" class="text-red-400">{{ errors.password }}</p>
                    </template>
                </TextElement>
                <TextElement
                    name="password_confirmation"
                    before="Confirmar password"
                    input-type="password"
                    :hasFloating="false"
                    :columns="{container: 12, wrapper: 12}"
                    placeholder="* * * * * * * * *"/>
                <ButtonElement 
                    name="create_user_submit"
                    submits>
                    Crear
                </ButtonElement>
            </Vueform>
        </div>
        <Notivue v-slot="item">
            <Notification :item="item" />
        </Notivue>
    </PermissionsLayout>
</template>
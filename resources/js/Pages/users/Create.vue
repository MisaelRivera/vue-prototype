<script setup>
    import { ref } from 'vue';
    import PermissionsLayout from '@/Layouts/PermissionsLayout.vue';
    const form$ = ref(null);
    const handleCreate = () => {
        console.log(form$.value.data);
    };
</script>
<template>
    <PermissionsLayout>
        <div class="w-4/12 mx-auto my-4">
            <Vueform
                :float-placeholders="false"
                ref="form$"
                :columns="{container: 12, wrapper:12 }"
                @submit="handleCreate"
                class="bg-black/[.54] px-10 py-10">
                <TextElement
                    name="email"
                    before="Email"
                    input-type="email"
                    :columns="{container: 12, wrapper: 12}"
                    placeholder="Ej. misael@gmail.com"
                    required/>
                <TextElement
                    name="name"
                    before="Nombre"
                    :columns="{container: 12, wrapper: 12}"
                    placeholder="Ej. Misael"/>
                <TextElement
                    name="password"
                    before="Password"
                    input-type="password"
                    :hasFloating="false"
                    :columns="{container: 12, wrapper: 12}"
                    placeholder="* * * * * * * * *"
                    required/>
                <TextElement
                    name="confirmation_password"
                    before="Confirmar password"
                    input-type="password"
                    :hasFloating="false"
                    :columns="{container: 12, wrapper: 12}"
                    placeholder="* * * * * * * * *"/>
                <ButtonElement name="create_user_submit">
                    Crear
                </ButtonElement>
            </Vueform>
        </div>
    </PermissionsLayout>
</template>